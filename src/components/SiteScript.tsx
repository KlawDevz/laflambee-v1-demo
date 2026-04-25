"use client";

import { useEffect } from "react";
import { usePathname } from "next/navigation";

export function SiteScript() {
  const pathname = usePathname();

  useEffect(() => {
    document.body.classList.add("js-enabled");

    const prefersReducedMotion = () =>
      typeof window !== "undefined" &&
      window.matchMedia &&
      window.matchMedia("(prefers-reduced-motion: reduce)").matches;

    const setupMobileMenu = () => {
      const toggle = document.querySelector<HTMLButtonElement>(".menu-toggle");
      const nav = document.querySelector<HTMLElement>(".mobile-nav");
      if (!toggle || !nav) return () => {};

      const focusableSelector = 'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])';
      let lastFocused: Element | null = null;

      const setLabel = (open: boolean) => {
        const openLabel = toggle.getAttribute("data-label-open") || "Ouvrir le menu";
        const closeLabel = toggle.getAttribute("data-label-close") || "Fermer le menu";
        toggle.setAttribute("aria-label", open ? closeLabel : openLabel);
      };

      const getFocusable = () => nav.querySelectorAll<HTMLElement>(focusableSelector);

      const openMenu = () => {
        lastFocused = document.activeElement;
        toggle.classList.add("is-active");
        nav.classList.add("is-open");
        toggle.setAttribute("aria-expanded", "true");
        nav.setAttribute("aria-hidden", "false");
        nav.removeAttribute("hidden");
        nav.removeAttribute("inert");
        document.body.style.overflow = "hidden";
        setLabel(true);
        const focusable = getFocusable();
        focusable[0]?.focus();
      };

      const closeMenu = () => {
        toggle.classList.remove("is-active");
        nav.classList.remove("is-open");
        toggle.setAttribute("aria-expanded", "false");
        nav.setAttribute("aria-hidden", "true");
        nav.setAttribute("hidden", "");
        nav.setAttribute("inert", "");
        document.body.style.overflow = "";
        setLabel(false);

        if (lastFocused instanceof HTMLElement) {
          lastFocused.focus();
        } else {
          toggle.focus();
        }
      };

      const handleKeydown = (event: KeyboardEvent) => {
        if (event.key === "Escape" && nav.classList.contains("is-open")) {
          closeMenu();
        }
        if (event.key !== "Tab" || !nav.classList.contains("is-open")) return;
        const focusable = getFocusable();
        if (!focusable.length) return;
        const first = focusable[0];
        const last = focusable[focusable.length - 1];
        if (event.shiftKey && document.activeElement === first) {
          event.preventDefault();
          last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
          event.preventDefault();
          first.focus();
        }
      };

      const handleToggle = () => {
        const isOpen = toggle.classList.contains("is-active");
        if (isOpen) {
          closeMenu();
        } else {
          openMenu();
        }
      };

      setLabel(false);
      toggle.addEventListener("click", handleToggle);
      document.addEventListener("keydown", handleKeydown);
      nav.querySelectorAll("a").forEach((link) => link.addEventListener("click", closeMenu));

      return () => {
        toggle.removeEventListener("click", handleToggle);
        document.removeEventListener("keydown", handleKeydown);
        nav.querySelectorAll("a").forEach((link) => link.removeEventListener("click", closeMenu));
      };
    };

    const setupScrollHeader = () => {
      const header = document.querySelector<HTMLElement>(".site-header");
      const hero = document.querySelector<HTMLElement>(".hero");
      if (!header) return () => {};

      let ticking = false;
      let heroHeight = hero?.offsetHeight || 1;

      const syncMetrics = () => {
        document.documentElement.style.setProperty("--header-h", `${header.offsetHeight}px`);
        heroHeight = hero?.offsetHeight || 1;
      };

      const onScroll = () => {
        const scrollY = window.scrollY;
        const isScrolled = scrollY > 40 || !hero;
        header.classList.toggle("is-scrolled", isScrolled);
        if (hero) {
          const progress = Math.min(scrollY / (heroHeight * 0.65), 1);
          document.documentElement.style.setProperty("--hero-scroll-progress", progress.toFixed(3));
        }
      };

      const requestTick = () => {
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(() => {
          onScroll();
          ticking = false;
        });
      };

      syncMetrics();
      onScroll();
      window.addEventListener("scroll", requestTick, { passive: true });
      window.addEventListener("resize", syncMetrics, { passive: true });
      window.addEventListener("orientationchange", syncMetrics, { passive: true });

      return () => {
        window.removeEventListener("scroll", requestTick);
        window.removeEventListener("resize", syncMetrics);
        window.removeEventListener("orientationchange", syncMetrics);
      };
    };

    const setupReveal = () => {
      const items = document.querySelectorAll<HTMLElement>("[data-reveal], [data-reveal-stagger]");
      if (!items.length) return () => {};

      if (prefersReducedMotion() || !("IntersectionObserver" in window)) {
        items.forEach((el) => el.classList.add("is-revealed"));
        return () => {};
      }

      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("is-revealed");
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
      );

      items.forEach((item) => observer.observe(item));
      return () => observer.disconnect();
    };

    const setupCarteNav = () => {
      const nav = document.querySelector<HTMLElement>(".carte-nav");
      if (!nav) return () => {};
      const links = Array.from(nav.querySelectorAll<HTMLAnchorElement>(".carte-nav__link"));
      if (!links.length) return () => {};

      const sections = links
        .map((link) => {
          const href = link.getAttribute("href");
          if (!href || !href.startsWith("#")) return null;
          const target = document.querySelector<HTMLElement>(href);
          return target ? { link, target } : null;
        })
        .filter(Boolean) as Array<{ link: HTMLAnchorElement; target: HTMLElement }>;

      if (!sections.length) return () => {};

      let active: HTMLAnchorElement | null = null;
      let ticking = false;
      let navHeight = nav.offsetHeight;
      let sectionTops: number[] = [];
      let manualLockUntil = 0;

      const updateLayout = () => {
        navHeight = nav.offsetHeight;
        sectionTops = sections.map((section) => section.target.getBoundingClientRect().top + window.pageYOffset);
      };

      const getOffset = () => {
        const headerHeight =
          Number.parseInt(getComputedStyle(document.documentElement).getPropertyValue("--header-h"), 10) || 0;
        return headerHeight + navHeight + 12;
      };

      const setActive = (next: HTMLAnchorElement | null, smoothNav: boolean) => {
        if (!next || next === active) return;
        links.forEach((link) => link.classList.remove("is-active"));
        next.classList.add("is-active");
        active = next;
        next.scrollIntoView({
          inline: "center",
          block: "nearest",
          behavior: smoothNav && !prefersReducedMotion() ? "smooth" : "auto",
        });
      };

      const update = () => {
        if (Date.now() < manualLockUntil) return;
        const scrollPos = window.pageYOffset;
        const probe = scrollPos + getOffset();
        const atBottom = window.innerHeight + scrollPos >= document.body.scrollHeight - 2;
        if (atBottom) {
          setActive(sections[sections.length - 1].link, false);
          return;
        }
        if (sections.length > 1 && probe < sectionTops[1]) {
          setActive(sections[0].link, false);
          return;
        }

        let current = sections[0].link;
        for (let index = 0; index < sections.length; index += 1) {
          if (sectionTops[index] <= probe) current = sections[index].link;
        }
        setActive(current, false);
      };

      const requestTick = () => {
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(() => {
          update();
          ticking = false;
        });
      };

      const clickHandlers = sections.map((section) => {
        const onClick = () => {
          updateLayout();
          manualLockUntil = Date.now() + 320;
          setActive(section.link, true);
        };
        section.link.addEventListener("click", onClick);
        return { link: section.link, onClick };
      });

      updateLayout();
      update();

      window.addEventListener("scroll", requestTick, { passive: true });
      window.addEventListener("resize", updateLayout, { passive: true });
      window.addEventListener("orientationchange", updateLayout, { passive: true });

      return () => {
        window.removeEventListener("scroll", requestTick);
        window.removeEventListener("resize", updateLayout);
        window.removeEventListener("orientationchange", updateLayout);
        clickHandlers.forEach(({ link, onClick }) => link.removeEventListener("click", onClick));
      };
    };

    const setupSmoothScroll = () => {
      if (pathname !== "/la-carte") return () => {};

      const anchors = Array.from(document.querySelectorAll<HTMLAnchorElement>('a[href^="#"]'));
      const handlers = anchors.map((anchor) => {
        const onClick = (event: MouseEvent) => {
          const id = anchor.getAttribute("href");
          if (!id || id === "#") return;
          const target = document.querySelector<HTMLElement>(id);
          if (!target) return;

          event.preventDefault();
          const headerHeight =
            Number.parseInt(getComputedStyle(document.documentElement).getPropertyValue("--header-h"), 10) || 0;
          const carteNav = document.querySelector<HTMLElement>(".carte-nav");
          const isCarte = anchor.classList.contains("carte-nav__link");
          const carteHeight = isCarte && carteNav ? carteNav.offsetHeight : 0;
          const destination = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - carteHeight - 8;

          window.scrollTo({
            top: destination,
            behavior: prefersReducedMotion() ? "auto" : "smooth",
          });
        };
        anchor.addEventListener("click", onClick);
        return { anchor, onClick };
      });

      return () => {
        handlers.forEach(({ anchor, onClick }) => anchor.removeEventListener("click", onClick));
      };
    };

    const cleanups = [setupMobileMenu(), setupScrollHeader(), setupReveal(), setupSmoothScroll(), setupCarteNav()];
    return () => cleanups.forEach((cleanup) => cleanup());
  }, [pathname]);

  return null;
}
