import type { Metadata } from "next";
import { Picture } from "@/components/Picture";
import { contactData } from "@/data/contact";
import { site } from "@/data/site";

export const metadata: Metadata = {
  title: "Contact & Accès à Mirepoix",
  description: "Contact, horaires et accès du restaurant La Flambée à Mirepoix. Réservation par téléphone.",
};

export default function ContactPage() {
  return (
    <>
      <section className="contact-hero">
        <div className="contact-hero__media">
          <Picture
            src={contactData.hero.image}
            alt={contactData.hero.alt}
            width={contactData.hero.width}
            height={contactData.hero.height}
            sizes="(max-width: 1200px) 100vw, 1200px"
            priority
          />
        </div>
        <div className="contact-hero__content container" data-reveal>
          <h1>{contactData.hero.title}</h1>
        </div>
      </section>

      <section className="contact">
        <div className="container">
          <div className="contact__grid" data-reveal>
            <div className="contact-card">
              <div className="contact-card__header">
                <h2 className="contact-card__title">Nous contacter</h2>
                <p className="contact-card__sub text-fancy">{contactData.subtitle}</p>
              </div>

              <div className="contact-card__cta">
                <a href={`tel:${site.phoneHref}`} className="btn btn--primary btn--lg contact-card__btn phone-fancy">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" aria-hidden="true">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                  </svg>
                  {site.phoneDisplay}
                </a>
              </div>

              <div className="contact-card__separator" />

              <div className="contact-card__rows">
                <div className="contact-card__row">
                  <div className="contact-card__icon" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                      <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                      <circle cx="12" cy="10" r="3" />
                    </svg>
                  </div>
                  <div>
                    <p className="contact-card__label">Adresse</p>
                    <p className="contact-card__value">{site.address}</p>
                    <a href={site.mapsLink} target="_blank" rel="noopener noreferrer" className="contact-card__link">
                      Voir l&apos;itinéraire →
                    </a>
                  </div>
                </div>

                <div className="contact-card__row">
                  <div className="contact-card__icon" aria-hidden="true">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                      <circle cx="12" cy="12" r="10" />
                      <polyline points="12 6 12 12 16 14" />
                    </svg>
                  </div>
                  <div>
                    <p className="contact-card__label">Horaires</p>
                    <table className="hours-table hours-table--compact">
                      <caption className="sr-only">Horaires d&apos;ouverture</caption>
                      <tbody>
                        {site.hours.map(([day, value]) => (
                          <tr key={day} className={value.toLowerCase().includes("fermé") ? "is-closed" : undefined}>
                            <th scope="row">{day}</th>
                            <td>{value}</td>
                          </tr>
                        ))}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div className="contact-card contact-card--map">
              <div className="contact-card__quick-actions" aria-label="Actions rapides">
                <a href={`tel:${site.phoneHref}`} className="contact-card__quick-action contact-card__quick-action--primary">
                  Réserver maintenant
                </a>
                <a href={site.mapsLink} target="_blank" rel="noopener noreferrer" className="contact-card__quick-action">
                  Ouvrir l&apos;itinéraire
                </a>
              </div>
              <div className="contact__map">
                <iframe
                  src={site.mapsEmbed}
                  allowFullScreen
                  loading="lazy"
                  referrerPolicy="no-referrer-when-downgrade"
                  title="Localisation de La Flambée sur Google Maps"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  );
}
