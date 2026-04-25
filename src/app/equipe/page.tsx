import type { Metadata } from "next";
import { Picture } from "@/components/Picture";
import { equipeData, equipeGallery, producers } from "@/data/equipe";
import { site } from "@/data/site";

export const metadata: Metadata = {
  title: "L'Équipe",
  description: "L'histoire de La Flambée à Mirepoix, son équipe et ses producteurs locaux du terroir.",
};

export default function EquipePage() {
  return (
    <>
      <section className="equipe-hero">
        <div className="equipe-hero__media">
          <Picture
            src={equipeData.hero.image}
            alt={equipeData.hero.alt}
            width={equipeData.hero.width}
            height={equipeData.hero.height}
            sizes="(max-width: 768px) 100vw, 1200px"
            priority
          />
        </div>
        <div className="equipe-hero__content container" data-reveal>
          <h1>{equipeData.hero.title}</h1>
          <p className="equipe-hero__phone phone-fancy">{site.phoneDisplay}</p>
        </div>
      </section>

      <section className="equipe" data-reveal>
        <div className="container">
          <div className="equipe__text">
            <span className="section-label text-fancy">{equipeData.intro.label}</span>
            <h2>{equipeData.intro.title}</h2>
            {equipeData.intro.paragraphs.map((paragraph) => (
              <p key={paragraph}>{paragraph}</p>
            ))}
            <p className="equipe__storyline accent-script">{equipeData.intro.quote}</p>
          </div>
        </div>
      </section>

      <section className="equipe-split" data-reveal>
        <div className="container">
          <div className="equipe-split__grid">
            <div className="equipe-split__media">
              <Picture src={equipeData.splitKitchen.image} alt={equipeData.splitKitchen.alt} width={1200} height={800} sizes="(max-width: 768px) 100vw, 520px" />
            </div>
            <div className="equipe-split__content">
              <span className="section-label text-fancy">{equipeData.splitKitchen.label}</span>
              <h3>{equipeData.splitKitchen.title}</h3>
              <p className="equipe-side__text">{equipeData.splitKitchen.text}</p>
              <p className="accent-script">{equipeData.splitKitchen.note}</p>
            </div>
          </div>
        </div>
      </section>

      <section className="equipe-producers" data-reveal>
        <div className="container">
          <div className="section-header section-header--center">
            <span className="section-label text-fancy">Le terroir</span>
            <h2>Nos producteurs</h2>
            <p className="section-desc text-fancy">Des artisans et producteurs proches de nous, choisis pour leur exigence.</p>
          </div>
          <div className="producers__grid" data-reveal-stagger>
            {producers.map(([title, text]) => (
              <div className="producer-card" key={title}>
                <h4>{title}</h4>
                <p>{text}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="equipe-salle" data-reveal>
        <div className="container">
          <div className="equipe-salle__grid">
            <div className="equipe-salle__media">
              <Picture src={equipeData.splitRoom.image} alt={equipeData.splitRoom.alt} width={2000} height={1335} sizes="(max-width: 768px) 100vw, 520px" />
            </div>
            <div className="equipe-salle__content">
              <span className="section-label text-fancy">{equipeData.splitRoom.label}</span>
              <h3>{equipeData.splitRoom.title}</h3>
              <p className="equipe-side__text">{equipeData.splitRoom.text}</p>
              <p className="accent-script">{equipeData.splitRoom.note}</p>
            </div>
          </div>
        </div>
      </section>

      <section className="galerie" data-reveal>
        <div className="container">
          <div className="galerie__header">
            <span className="section-label text-fancy">En images</span>
            <h2>Un aperçu de notre univers</h2>
          </div>

          <div className="galerie__grid" data-reveal-stagger>
            {equipeGallery.map(([src, alt]) => (
              <div className="galerie__item" key={`${src}-${alt}`}>
                <Picture
                  src={src}
                  alt={alt}
                  width={1200}
                  height={800}
                  sizes="(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw"
                />
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="page-cta" data-reveal>
        <div className="container">
          <div className="page-cta__card">
            <div>
              <p className="page-cta__kicker text-fancy">Envie de découvrir l&apos;ambiance ?</p>
              <h2 className="page-cta__title">On vous accueille midi et soir</h2>
              <p className="page-cta__meta">{site.footerHours}</p>
            </div>
            <div className="page-cta__actions">
              <a href={`tel:${site.phoneHref}`} className="btn btn--primary btn--lg">
                Réserver maintenant
              </a>
              <a href={site.mapsLink} target="_blank" rel="noopener noreferrer" className="btn btn--outline">
                Itinéraire
              </a>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
