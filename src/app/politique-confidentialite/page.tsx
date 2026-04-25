import type { Metadata } from "next";
import { site } from "@/data/site";

export const metadata: Metadata = {
  title: "Politique de confidentialité",
  description: "Politique de confidentialité du site La Flambée.",
};

export default function PolitiqueConfidentialitePage() {
  return (
    <section className="page-shell">
      <div className="container">
        <article>
          <header className="page-shell__header">
            <h1>Politique de confidentialité</h1>
          </header>
          <div className="page-shell__content">
            <p>
              Cette politique décrit le traitement des données à caractère personnel effectué via le site {site.name}.
            </p>
            <p>
              Données traitées: données techniques de navigation (journaux serveur), et données que vous communiquez
              volontairement lors d&apos;une prise de contact (par téléphone ou services tiers externes).
            </p>
            <p>
              Finalités: sécurité du site, maintien du service, traitement des demandes de contact et gestion de la
              relation client.
            </p>
            <p>
              Base légale: intérêt légitime de l&apos;éditeur pour la sécurité et le fonctionnement du service, ainsi que
              votre consentement lorsque celui-ci est requis pour certains traceurs.
            </p>
            <p>
              Durée de conservation: les données sont conservées pendant une durée proportionnée aux finalités, puis
              supprimées ou anonymisées.
            </p>
            <p>
              Vos droits: vous disposez d&apos;un droit d&apos;accès, de rectification, d&apos;effacement, de limitation et
              d&apos;opposition. Pour toute demande, contactez-nous au <a href={`tel:${site.phoneHref}`}>{site.phoneDisplay}</a>.
            </p>
          </div>
        </article>
      </div>
    </section>
  );
}
