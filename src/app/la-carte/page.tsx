import type { Metadata } from "next";
import Link from "next/link";
import { Picture } from "@/components/Picture";
import {
  boissons,
  desserts,
  entrees,
  featuredSpecialties,
  formules,
  menuNav,
  pizzas,
  plats,
  snacking,
} from "@/data/menu";
import { site } from "@/data/site";

export const metadata: Metadata = {
  title: "Carte & Menu à Mirepoix",
  description: "Carte du restaurant La Flambée à Mirepoix : pizzas, viandes, entrées, desserts, menus et boissons.",
  keywords: [
    "carte restaurant mirepoix",
    "menu la flambée mirepoix",
    "pizza feu de bois mirepoix",
    "plats restaurant mirepoix",
  ],
  alternates: {
    canonical: "/la-carte",
  },
};

type MenuItem = readonly [string, string, string, string?];

function MenuList({ items }: { items: readonly MenuItem[] }) {
  return (
    <div className="carte-list" data-reveal>
      {items.map(([name, description, price, badge]) => (
        <div className="menu-item" key={`${name}-${price}`}>
          <div className="menu-item__row">
            <span className="menu-item__name">{name}</span>
            {price ? (
              <>
                <span className="menu-item__dots" />
                <span className="menu-item__price">{price}</span>
              </>
            ) : null}
          </div>
          {description ? <p className="menu-item__desc">{description}</p> : null}
          {badge ? <span className="carte-label carte-label--inline">{badge}</span> : null}
        </div>
      ))}
    </div>
  );
}

export default function CartePage() {
  return (
    <>
      <section className="carte-hero">
        <div className="carte-hero__media">
          <Picture src="/images/carte-des-vins.jpg" alt="Carte des vins" width={2000} height={1335} sizes="(max-width: 1200px) 100vw, 1200px" priority />
        </div>
        <div className="container">
          <div className="carte-hero__inner" data-reveal>
            <h1 className="display-title">La carte</h1>
            <p className="carte-hero__lead text-fancy">Saison Automne-Hiver 2025</p>
          </div>
        </div>
      </section>

      <nav className="carte-nav" aria-label="Navigation carte">
        <div className="carte-nav__inner">
          {menuNav.map(([href, label], index) => (
            <a key={href} href={href} className={`carte-nav__link ${index === menuNav.length - 1 ? "carte-nav__link--accent" : ""}`}>
              {label}
            </a>
          ))}
        </div>
      </nav>

      <section id="specialites" className="carte-section carte-section--highlight">
        <div className="container">
          <div className="section-header section-header--center" data-reveal>
            <h2 className="display-title">Spécialités maison</h2>
            <p className="carte-section__sub text-fancy">Les plats préférés de nos clients.</p>
          </div>

          <div className="carte-grid carte-grid--featured" data-reveal-stagger>
            {featuredSpecialties.map(([badge, name, desc, price]) => (
              <div key={name} className="carte-card carte-card--featured">
                <span className="carte-label">{badge}</span>
                <h3 className="carte-card__name">{name}</h3>
                <p className="carte-card__desc">{desc}</p>
                <span className="carte-card__price">{price}</span>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section id="pizzas" className="carte-section carte-section--alt">
        <div className="container">
          <div className="section-header" data-reveal>
            <h2 className="display-title">Pizzas</h2>
            <p className="carte-section__fire-note text-fancy">Toutes nos pizzas sont cuites au feu de bois</p>
          </div>
          <MenuList items={pizzas} />
          <div className="carte-section__cta" data-reveal>
            <Link href="#plats" className="btn btn--outline">
              Voir les plats
            </Link>
          </div>
        </div>
      </section>

      <section id="plats" className="carte-section carte-section--alt">
        <div className="container">
          <div className="section-header" data-reveal>
            <h2 className="display-title">Viandes & Plats</h2>
          </div>
          <MenuList items={plats} />
        </div>
      </section>

      <section id="entrees" className="carte-section">
        <div className="container">
          <div className="section-header" data-reveal>
            <h2 className="display-title">Entrées & Salades</h2>
          </div>
          <MenuList items={entrees} />
        </div>
      </section>

      <section id="snacking" className="carte-section carte-section--alt">
        <div className="container">
          <div className="section-header" data-reveal>
            <h2 className="display-title">Snacking</h2>
          </div>
          <MenuList items={snacking} />
        </div>
      </section>

      <section id="desserts" className="carte-section">
        <div className="container">
          <div className="section-header" data-reveal>
            <h2 className="display-title">Desserts & Crêpes</h2>
          </div>
          <MenuList items={desserts} />
        </div>
      </section>

      <section id="vins" className="carte-section carte-section--alt">
        <div className="container">
          <div className="section-header" data-reveal>
            <h2 className="display-title">Vins & Boissons</h2>
          </div>
          <MenuList items={boissons} />
        </div>
      </section>

      <section id="menus" className="carte-section">
        <div className="container">
          <div className="section-header" data-reveal>
            <h2 className="display-title">Nos menus</h2>
            <p className="carte-section__sub text-fancy">Idéales pour un repas complet à petit prix.</p>
          </div>
          <MenuList items={formules} />
        </div>
      </section>

      <section className="page-cta" data-reveal>
        <div className="container">
          <div className="page-cta__card">
            <div>
              <p className="page-cta__kicker text-fancy">Une envie particulière ?</p>
              <h2 className="page-cta__title">Réservez votre table en 1 appel</h2>
              <p className="page-cta__meta">{site.footerHours}</p>
            </div>
            <div className="page-cta__actions">
              <a href={`tel:${site.phoneHref}`} className="btn btn--primary btn--lg">
                Appeler {site.phoneDisplay}
              </a>
              <Link href="/contact" className="btn btn--outline">
                Infos & accès
              </Link>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
