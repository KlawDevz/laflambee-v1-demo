/**
 * La Flambee - Main Navigation & UI
 * Mobile menu, scroll header, smooth scroll, reveal animations, carte nav.
 * No dependencies.
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', init);

  function init() {
    setupMobileMenu();
    setupScrollHeader();
    setupSmoothScroll();
    setupRevealAnimations();
    setupCarteNav();
  }

  function prefersReducedMotion() {
    return window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  }

  /* ------------------------------------------------
   * 1. Mobile Menu
   * ---------------------------------------------- */
  function setupMobileMenu() {
    var toggle = document.querySelector('.menu-toggle');
    var nav = document.querySelector('.mobile-nav');
    if (!toggle || !nav) return;

    var focusableSelector = 'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])';
    var lastFocused = null;

    function setToggleLabel(isOpen) {
      var openLabel = toggle.getAttribute('data-label-open') || 'Ouvrir le menu';
      var closeLabel = toggle.getAttribute('data-label-close') || 'Fermer le menu';
      toggle.setAttribute('aria-label', isOpen ? closeLabel : openLabel);
    }

    function getFocusable() {
      return nav.querySelectorAll(focusableSelector);
    }

    function keepFocusInMenu(e) {
      if (e.key !== 'Tab' || !nav.classList.contains('is-open')) return;

      var focusable = getFocusable();
      if (!focusable.length) return;

      var first = focusable[0];
      var last = focusable[focusable.length - 1];

      if (e.shiftKey && document.activeElement === first) {
        e.preventDefault();
        last.focus();
      } else if (!e.shiftKey && document.activeElement === last) {
        e.preventDefault();
        first.focus();
      }
    }

    function openMenu() {
      lastFocused = document.activeElement;
      toggle.classList.add('is-active');
      nav.classList.add('is-open');
      toggle.setAttribute('aria-expanded', 'true');
      nav.setAttribute('aria-hidden', 'false');
      nav.removeAttribute('hidden');
      nav.removeAttribute('inert');
      setToggleLabel(true);
      document.body.style.overflow = 'hidden';

      var focusable = getFocusable();
      if (focusable.length) {
        focusable[0].focus();
      }
    }

    function closeMenu() {
      toggle.classList.remove('is-active');
      nav.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      nav.setAttribute('aria-hidden', 'true');
      nav.setAttribute('hidden', '');
      nav.setAttribute('inert', '');
      setToggleLabel(false);
      document.body.style.overflow = '';

      if (lastFocused && typeof lastFocused.focus === 'function') {
        lastFocused.focus();
      } else {
        toggle.focus();
      }
    }

    setToggleLabel(false);

    toggle.addEventListener('click', function () {
      var isOpen = toggle.classList.contains('is-active');
      isOpen ? closeMenu() : openMenu();
    });

    var links = nav.querySelectorAll('a');
    Array.prototype.forEach.call(links, function (link) {
      link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        closeMenu();
      }

      keepFocusInMenu(e);
    });
  }

  /* ------------------------------------------------
   * 2. Scroll Header
   * ---------------------------------------------- */
  function setupScrollHeader() {
    var header = document.querySelector('.site-header');
    var hero = document.querySelector('.hero');
    if (!header) return;

    var ticking = false;
    var THRESHOLD = 40;
    var heroHeight = hero ? (hero.offsetHeight || 1) : 1;

    function syncHeaderHeight() {
      var headerHeight = header.offsetHeight;
      document.documentElement.style.setProperty('--header-h', headerHeight + 'px');
    }

    function syncLayoutMetrics() {
      syncHeaderHeight();
      heroHeight = hero ? (hero.offsetHeight || 1) : 1;
    }

    function onScroll() {
      var scrollY = window.scrollY;
      var shouldScrollState = scrollY > THRESHOLD || !hero;

      if (shouldScrollState) {
        header.classList.add('is-scrolled');
      } else {
        header.classList.remove('is-scrolled');
      }

      if (hero) {
        var progress = Math.min(scrollY / (heroHeight * 0.65), 1);
        document.documentElement.style.setProperty('--hero-scroll-progress', progress.toFixed(3));
      }
    }

    function requestTick() {
      if (!ticking) {
        requestAnimationFrame(function () {
          onScroll();
          ticking = false;
        });
        ticking = true;
      }
    }

    syncLayoutMetrics();

    window.addEventListener('scroll', requestTick, { passive: true });
    window.addEventListener('resize', syncLayoutMetrics, { passive: true });
    window.addEventListener('orientationchange', syncLayoutMetrics, { passive: true });
  }

  /* ------------------------------------------------
   * 3. Smooth Scroll
   * ---------------------------------------------- */
  function setupSmoothScroll() {
    var anchors = document.querySelectorAll('a[href^="#"]');

    Array.prototype.forEach.call(anchors, function (anchor) {
      anchor.addEventListener('click', function (e) {
        var id = this.getAttribute('href');
        if (id === '#' || id === '') return;

        var target = document.querySelector(id);
        if (!target) return;

        e.preventDefault();

        var headerH = parseInt(
          getComputedStyle(document.documentElement).getPropertyValue('--header-h'), 10
        ) || 0;
        var carteNav = document.querySelector('.carte-nav');
        var isCarteLink = this.classList.contains('carte-nav__link');
        var carteH = (isCarteLink && carteNav) ? carteNav.offsetHeight : 0;
        var dest = target.getBoundingClientRect().top + window.pageYOffset - headerH - carteH - 8;

        window.scrollTo({ top: dest, behavior: prefersReducedMotion() ? 'auto' : 'smooth' });
      });
    });
  }

  /* ------------------------------------------------
   * 4. Reveal Animations
   * ---------------------------------------------- */
  function setupRevealAnimations() {
    var items = document.querySelectorAll('[data-reveal], [data-reveal-stagger]');
    if (!items.length) return;

    if (prefersReducedMotion()) {
      Array.prototype.forEach.call(items, function (el) {
        el.classList.add('is-revealed');
      });
      return;
    }

    if (!('IntersectionObserver' in window)) {
      Array.prototype.forEach.call(items, function (el) {
        el.classList.add('is-revealed');
      });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      Array.prototype.forEach.call(entries, function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-revealed');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px'
    });

    Array.prototype.forEach.call(items, function (el) {
      observer.observe(el);
    });
  }

  /* ------------------------------------------------
   * 5. Carte Nav (sticky category navigation)
   * ---------------------------------------------- */
  function setupCarteNav() {
    var nav = document.querySelector('.carte-nav');
    if (!nav) return;

    var links = nav.querySelectorAll('.carte-nav__link');
    if (!links.length) return;

    var sections = [];
    Array.prototype.forEach.call(links, function (link) {
      var href = link.getAttribute('href');
      if (!href || href.charAt(0) !== '#') return;
      var section = document.querySelector(href);
      if (section) {
        sections.push({ link: link, target: section });
      }
    });

    if (!sections.length) return;

    var ticking = false;
    var activeLink = null;
    var navHeight = nav.offsetHeight;
    var sectionTops = [];
    var manualLockUntil = 0;

    function updateLayoutCache() {
      navHeight = nav.offsetHeight;
      sectionTops = [];
      for (var i = 0; i < sections.length; i++) {
        sectionTops.push(sections[i].target.getBoundingClientRect().top + window.pageYOffset);
      }
    }

    function getOffset() {
      var headerH = parseInt(
        getComputedStyle(document.documentElement).getPropertyValue('--header-h'), 10
      ) || 0;
      return headerH + navHeight + 12;
    }

    function setActive(nextLink, opts) {
      if (!nextLink || nextLink === activeLink) {
        return;
      }

      var smoothNav = !!(opts && opts.smoothNav);

      Array.prototype.forEach.call(links, function (link) {
        link.classList.remove('is-active');
      });
      nextLink.classList.add('is-active');
      activeLink = nextLink;

      if (nextLink.scrollIntoView) {
        nextLink.scrollIntoView({
          inline: 'center',
          block: 'nearest',
          behavior: (smoothNav && !prefersReducedMotion()) ? 'smooth' : 'auto'
        });
      }
    }

    function update() {
      if (Date.now() < manualLockUntil) {
        return;
      }

      var scrollPos = window.pageYOffset;
      var offset = getOffset();
      var probe = scrollPos + offset;
      var atBottom = (window.innerHeight + scrollPos) >= (document.body.scrollHeight - 2);

      if (atBottom) {
        setActive(sections[sections.length - 1].link, { smoothNav: false });
        return;
      }

      if (sections.length > 1 && probe < sectionTops[1]) {
        setActive(sections[0].link, { smoothNav: false });
        return;
      }

      var current = sections[0].link;
      for (var i = 0; i < sections.length; i++) {
        if (sectionTops[i] <= probe) {
          current = sections[i].link;
        }
      }
      setActive(current, { smoothNav: false });
    }

    function requestTick() {
      if (!ticking) {
        requestAnimationFrame(function () {
          update();
          ticking = false;
        });
        ticking = true;
      }
    }

    Array.prototype.forEach.call(sections, function (item) {
      item.link.addEventListener('click', function () {
        updateLayoutCache();
        manualLockUntil = Date.now() + 320;
        setActive(item.link, { smoothNav: true });
      });
    });

    window.addEventListener('scroll', requestTick, { passive: true });
    window.addEventListener('resize', updateLayoutCache, { passive: true });
    window.addEventListener('orientationchange', updateLayoutCache, { passive: true });
    window.addEventListener('load', function () {
      updateLayoutCache();
      update();
    });
    updateLayoutCache();
    update();
  }

})();
