import type { Metadata } from "next";
import { site } from "@/data/site";

export const metadata: Metadata = {
  title: "Mentions légales",
  description: "Mentions légales du site La Flambée.",
};

export default function MentionsLegalesPage() {
  return (
    <section className="page-shell">
      <div className="container">
        <article>
          <header className="page-shell__header">
            <h1>Mentions légales</h1>
          </header>
          <div className="page-shell__content">
            <p>
              Le présent site est édité pour le restaurant {site.name}, situé au {site.address}.
            </p>
            <p>
              Directeur de publication: {site.name}. Pour toute question, vous pouvez nous contacter au{" "}
              <a href={`tel:${site.phoneHref}`}>{site.phoneDisplay}</a>.
            </p>
            <p>
              Hébergement: ce site est hébergé sur une infrastructure technique sécurisée. Les informations exactes de
              l&apos;hébergeur peuvent être communiquées sur demande légitime.
            </p>
            <p>
              Propriété intellectuelle: l&apos;ensemble des contenus de ce site (textes, photographies, visuels, logo,
              éléments graphiques) est protégé. Toute reproduction, adaptation, représentation ou diffusion, même
              partielle, sans autorisation préalable écrite est interdite.
            </p>
            <p>
              Responsabilité: malgré le soin apporté à la mise à jour des informations, des erreurs ou omissions peuvent
              subsister. Les informations publiées sont fournies à titre indicatif et peuvent être modifiées à tout
              moment.
            </p>
          </div>
        </article>
      </div>
    </section>
  );
}
