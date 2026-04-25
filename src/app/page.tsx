import type { Metadata } from "next";
import Link from "next/link";
import { Picture } from "@/components/Picture";
import { ambianceImages, homeData, menuTeasers, signatureDishes } from "@/data/home";
import { site } from "@/data/site";

const faqItems = [
  {
    q: "Faut-il réserver à La Flambée ?",
    a: "Oui, la réservation est conseillée, surtout le week-end et les soirs de forte affluence.",
  },
  {
    q: "Où se situe le restaurant ?",
    a: "Nous sommes au cœur de Mirepoix, au 24/25 Place Maréchal Leclerc.",
  },
  {
    q: "Quels sont les horaires d'ouverture ?",
    a: "Lun-Mar & Ven-Dim : 12h-14h / 19h-22h. Fermé mercredi et jeudi.",
  },
] as const;

export const metadata: Metadata = {
  title: "Restaurant à Mirepoix",
  description:
    "La Flambée à Mirepoix : cuisine du terroir, pizzas au feu de bois, produits locaux et réservation rapide par téléphone.",
  keywords: [
    "restaurant mirepoix",
    "réservation restaurant mirepoix",
    "pizza feu de bois mirepoix",
    "restaurant place maréchal leclerc mirepoix",
    "la flambée mirepoix",
  ],
  alternates: {
    canonical: "/",
  },
};

export default function HomePage() {
  const faqJsonLd = {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    mainEntity: faqItems.map((item) => ({
      "@type": "Question",
      name: item.q,
      acceptedAnswer: {
        "@type": "Answer",
        text: item.a,
      },
    })),
  };
  return (
    <>
      <section className="hero">
        <div className="hero__bg">
          <Picture
            src={homeData.hero.image.src}
            alt={homeData.hero.image.alt}
            width={homeData.hero.image.width}
            height={homeData.hero.image.height}
            sizes="(max-width: 1200px) 100vw, 1200px"
            className="hero__img"
            priority
          />
        </div>
        <div className="hero__content">
          <div className="hero__inner">
            <h1 className="hero__image-title">{homeData.hero.title}</h1>
            <p className="hero__image-subtitle text-fancy">{homeData.hero.subtitle}</p>
            <div className="hero__cta-group">
              <a href={`tel:${site.phoneHref}`} className="btn btn--primary hero__cta-call">
                Réserver maintenant
              </a>
              <Link href="/la-carte" className="btn btn--outline-light">
                Voir la carte
              </Link>
            </div>
          </div>
        </div>
      </section>

      <section className="home-conversion" data-reveal>
        <div className="container">
          <div className="home-conversion__card">
            <div className="home-conversion__infos">
              <p className="home-conversion__title">Réservation conseillée</p>
              <p className="home-conversion__meta">{site.footerHours}</p>
              <p className="home-conversion__meta">{site.address}</p>
            </div>
            <div className="home-conversion__actions">
              <a href={`tel:${site.phoneHref}`} className="btn btn--primary home-conversion__btn">
                Appeler {site.phoneDisplay}
              </a>
              <a href={site.mapsLink} target="_blank" rel="noopener noreferrer" className="btn btn--outline home-conversion__btn">
                Itinéraire
              </a>
            </div>
          </div>
        </div>
      </section>

      <section className="intro" data-reveal>
        <div className="container">
          <div className="intro__split">
            <div className="intro__text">
              <span className="section-label text-fancy">{homeData.intro.label}</span>
              <h2>{homeData.intro.title}</h2>
              <p>{homeData.intro.description}</p>
              <div className="intro__quickfacts" aria-label="Informations pratiques">
                {homeData.intro.facts.map((fact) => (
                  <span key={fact} className="intro__fact text-fancy">
                    {fact}
                  </span>
                ))}
              </div>
            </div>

            <div className="intro__image">
              <Picture
                src={homeData.intro.image.src}
                alt={homeData.intro.image.alt}
                width={homeData.intro.image.width}
                height={homeData.intro.image.height}
                sizes="(max-width: 768px) 100vw, 600px"
              />
            </div>
          </div>

          <div className="features" data-reveal-stagger>
            {homeData.features.map((feature) => (
              <div key={feature.title} className="feature">
                <svg
                  className="feature__icon"
                  viewBox="0 0 48 48"
                  fill="none"
                  stroke="currentColor"
                  strokeWidth="2"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                >
                  <path d="M24 4C24 4 8 16 8 28a16 16 0 0032 0C40 16 24 4 24 4z" />
                  <path d="M24 44V28" />
                  <path d="M16 36c0-4.4 3.6-8 8-8s8 3.6 8 8" />
                </svg>
                <h3 className="feature__title">{feature.title}</h3>
                <p className="feature__text text-fancy">{feature.text}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="home-trust" data-reveal>
        <div className="container">
          <div className="home-trust__card">
            <p className="home-trust__kicker text-fancy">Pourquoi réserver ici ?</p>
            <div className="home-trust__grid" data-reveal-stagger>
              <div className="home-trust__item">
                <strong>4,7/5</strong>
                <span>Avis clients Google</span>
              </div>
              <div className="home-trust__item">
                <strong>Produits locaux</strong>
                <span>Sélection de producteurs d&apos;Ariège</span>
              </div>
              <div className="home-trust__item">
                <strong>Service rapide</strong>
                <span>Midi et soir, réservation conseillée</span>
              </div>
            </div>
            <div className="home-trust__cta">
              <a href={`tel:${site.phoneHref}`} className="btn btn--primary btn--lg">
                Appeler pour réserver
              </a>
            </div>
          </div>
        </div>
      </section>

      <section className="dishes" id="carte" data-reveal>
        <div className="container">
          <div className="section-header section-header--center">
            <span className="section-label text-fancy">Nos signatures</span>
            <h2>Les incontournables</h2>
            <p className="section-desc text-fancy">Trois assiettes qui racontent notre cuisine.</p>
          </div>

          <div className="dishes__grid" data-reveal-stagger>
            {signatureDishes.map((dish) => (
              <article key={dish.name} className="dish">
                <div className="dish__img">
                  <Picture src={dish.image} alt={dish.name} width={1200} height={800} sizes="(max-width: 768px) 100vw, 400px" />
                </div>
                <div className="dish__body">
                  <h3 className="dish__name">{dish.name}</h3>
                  <p className="dish__desc text-fancy">{dish.desc}</p>
                  <span className="dish__price">{dish.price}</span>
                </div>
              </article>
            ))}
          </div>

          <div className="dishes__cta">
            <Link href="/la-carte" className="btn btn--primary btn--lg">
              Découvrir toutes nos spécialités
            </Link>
          </div>
        </div>
      </section>

      <section className="wine" data-reveal>
        <div className="container">
          <div className="wine__grid">
            <div className="wine__media">
              <Picture src="/images/carte-des-vins.jpg" alt="Carte des vins" width={1200} height={800} sizes="(max-width: 768px) 100vw, 520px" />
            </div>
            <div className="wine__content">
              <span className="section-label text-fancy">Les vins</span>
              <h2>L&apos;art de la table et des accords</h2>
              <p>Vins du Sud-Ouest, pépites de petits domaines et conseils maison pour accompagner nos plats.</p>
              <div className="wine__note accent-script">&ldquo;Une sélection pensée comme un voyage.&rdquo;</div>
            </div>
          </div>
        </div>
      </section>

      <section className="ambiance" data-reveal>
        <div className="container">
          <div className="section-header">
            <span className="section-label text-fancy">L&apos;ambiance</span>
            <h2>Mirepoix en images</h2>
            <p className="ambiance__lead text-fancy">Découvrez l&apos;ambiance du restaurant en images.</p>
          </div>

          <div className="ambiance__grid">
            {ambianceImages.map(([src, alt]) => (
              <div className="ambiance__item" key={`${src}-${alt}`}>
                <Picture src={src} alt={alt} width={1200} height={800} sizes="(max-width: 768px) 100vw, 400px" />
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="home-faq" data-reveal>
        <div className="container">
          <div className="section-header section-header--center">
            <span className="section-label text-fancy">Infos pratiques</span>
            <h2>Questions fréquentes</h2>
            <p className="section-desc text-fancy">L&apos;essentiel pour réserver rapidement.</p>
          </div>
          <div className="home-faq__grid" data-reveal-stagger>
            {faqItems.map((item) => (
              <article className="home-faq__item" key={item.q}>
                <h3>{item.q}</h3>
                <p>{item.a}</p>
              </article>
            ))}
          </div>
          <div className="home-faq__cta">
            <a href={`tel:${site.phoneHref}`} className="btn btn--primary btn--lg">
              Réserver maintenant
            </a>
          </div>
        </div>
      </section>

      <section className="menu-teaser" data-reveal>
        <div className="container">
          <div className="section-header section-header--center">
            <span className="section-label text-fancy">La carte</span>
            <h2>De l&apos;entrée au dessert</h2>
            <p className="section-desc text-fancy">Trois univers pour composer un repas généreux.</p>
          </div>
          <div className="menu-teaser__grid" data-reveal-stagger>
            {menuTeasers.map((item) => (
              <Link className="menu-teaser__card" href={item.href} key={item.href}>
                <Picture src={item.image} alt={item.alt} width={1200} height={800} sizes="(max-width: 768px) 100vw, 360px" />
                <span>{item.title}</span>
              </Link>
            ))}
          </div>
          <div className="menu-teaser__cta">
              <Link href="/la-carte" className="btn btn--outline">
              Voir la carte complète
              </Link>
          </div>
        </div>
      </section>

      <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(faqJsonLd) }} />
    </>
  );
}
