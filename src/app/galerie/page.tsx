import type { Metadata } from "next";
import { GalleryLightbox } from "@/components/GalleryLightbox";
import { Picture } from "@/components/Picture";
import { equipeGallery } from "@/data/equipe";

export const metadata: Metadata = {
  title: "Galerie Photos à Mirepoix",
  description: "Galerie photos du restaurant La Flambée à Mirepoix : salle, terrasse, cuisine et plats maison.",
};

export default function GaleriePage() {
  return (
    <>
      <section className="galerie-hero">
        <div className="galerie-hero__media">
          <Picture
            src="/images/salle-restaurant-verriere.jpg"
            alt="Vue de la salle du restaurant sous la verrière"
            width={1600}
            height={1067}
            sizes="(max-width: 1200px) 100vw, 1200px"
            priority
          />
        </div>
        <div className="galerie-hero__content container" data-reveal>
          <span className="section-label text-fancy galerie-hero__label">En images</span>
          <h1>La Galerie</h1>
          <p className="galerie-hero__lead text-fancy">
            Un aperçu de notre restaurant, de nos plats et de notre ambiance chaleureuse.
          </p>
        </div>
      </section>

      <section className="galerie page-shell" data-reveal>
        <div className="container">
          <GalleryLightbox items={equipeGallery} />
        </div>
      </section>
    </>
  );
}
