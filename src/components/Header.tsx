"use client";

import Link from "next/link";
import Image from "next/image";
import { usePathname } from "next/navigation";
import { mainNav, site } from "@/data/site";

export function Header() {
  const pathname = usePathname();

  return (
    <>
      <header className="site-header">
        <div className="container">
          <div className="header__inner">
            <Link href="/" className="site-logo" rel="home">
              <Image src="/images/logo_la_flambee.png" alt={site.name} width={220} height={70} priority />
              <span className="site-logo__text">{site.name}</span>
            </Link>

            <nav className="nav" aria-label="Navigation principale">
              {mainNav.map((item) => {
                const active = pathname === item.href;
                return (
                  <Link key={item.href} href={item.href} className="nav__link" aria-current={active ? "page" : undefined}>
                    {item.label}
                  </Link>
                );
              })}
              <a href={`tel:${site.phoneHref}`} className="btn btn--primary btn--phone-icon">
                Réserver
              </a>
            </nav>

            <button
              className="menu-toggle"
              type="button"
              aria-label="Ouvrir le menu"
              data-label-open="Ouvrir le menu"
              data-label-close="Fermer le menu"
              aria-controls="mobile-nav"
              aria-expanded="false"
            >
              <span />
              <span />
              <span />
            </button>
          </div>
        </div>
      </header>

      <nav id="mobile-nav" className="mobile-nav" aria-label="Navigation mobile" aria-hidden="true" hidden>
        {mainNav.map((item) => (
          <Link key={item.href} href={item.href} className="mobile-nav__link">
            {item.label}
          </Link>
        ))}
        <a href={`tel:${site.phoneHref}`} className="mobile-nav__phone phone-fancy">
          {site.phoneDisplay}
        </a>
      </nav>
    </>
  );
}
