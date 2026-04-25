import type { Metadata } from "next";
import { Anybody, Libre_Caslon_Display, Reenie_Beanie, Source_Sans_3 } from "next/font/google";
import { Header } from "@/components/Header";
import { Footer } from "@/components/Footer";
import { SiteScript } from "@/components/SiteScript";
import { BodyClassManager } from "@/components/BodyClassManager";
import { site } from "@/data/site";
import "./globals.css";

const displayFont = Libre_Caslon_Display({
  subsets: ["latin"],
  weight: ["400"],
  variable: "--font-display",
  display: "swap",
});

const bodyFont = Source_Sans_3({
  subsets: ["latin"],
  weight: ["400", "600"],
  variable: "--font-body",
  display: "swap",
});

const accentFont = Anybody({
  subsets: ["latin"],
  weight: ["500", "600"],
  variable: "--font-accent",
  display: "swap",
});

const scriptFont = Reenie_Beanie({
  subsets: ["latin"],
  weight: ["400"],
  variable: "--font-script",
  display: "swap",
});

export const metadata: Metadata = {
  metadataBase: new URL(site.url),
  title: {
    default: `${site.name} | Restaurant à Mirepoix`,
    template: `%s | ${site.name}`,
  },
  description:
    "Restaurant à Mirepoix : cuisine artisanale, pizzas au feu de bois, viandes, desserts maison et ambiance chaleureuse.",
  alternates: {
    canonical: site.url,
  },
  keywords: [
    "restaurant mirepoix",
    "restaurant la flambee mirepoix",
    "pizzeria mirepoix",
    "restaurant ariege",
    "cuisine sud-ouest",
    "pizza feu de bois",
    "la flambee mirepoix",
  ],
  robots: {
    index: true,
    follow: true,
  },
  openGraph: {
    type: "website",
    locale: "fr_FR",
    url: site.url,
    siteName: site.name,
    title: `${site.name} | Restaurant à Mirepoix`,
    description:
      "Restaurant à Mirepoix : cuisine artisanale, pizzas au feu de bois, viandes, desserts maison et ambiance chaleureuse.",
    images: [
      {
        url: "/images/salle-restaurant-verriere.jpg",
        width: 2000,
        height: 1335,
        alt: "Salle verriere du restaurant La Flambee",
      },
    ],
  },
  twitter: {
    card: "summary_large_image",
    title: `${site.name} | Restaurant à Mirepoix`,
    description:
      "Restaurant à Mirepoix : cuisine artisanale, pizzas au feu de bois, viandes, desserts maison et ambiance chaleureuse.",
    images: ["/images/salle-restaurant-verriere.jpg"],
  },
  icons: {
    icon: "/images/logo_la_flambee.png",
    shortcut: "/images/logo_la_flambee.png",
  },
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  const bodyClassBootScript = `(function(){
    var p = window.location.pathname;
    if (p.length > 1 && p.endsWith('/')) p = p.slice(0, -1);
    var c = [];
    if (p === '/') c = ['home'];
    else if (p === '/la-carte') c = ['page-carte'];
    else if (p === '/contact') c = ['page-contact'];
    else if (p === '/equipe' || p === '/notre-histoire') c = ['page-equipe'];
    else if (p === '/galerie') c = ['page-galerie'];
    else if (p === '/mentions-legales' || p === '/politique-confidentialite') c = ['is-legal-page'];
    if (c.length) document.body.classList.add.apply(document.body.classList, c);
  })();`;

  const restaurantJsonLd = {
    "@context": "https://schema.org",
    "@type": "Restaurant",
    name: site.name,
    url: site.url,
    mainEntityOfPage: site.url,
    image: [`${site.url}/images/salle-restaurant-verriere.jpg`, `${site.url}/images/bar-restaurant.jpg`],
    priceRange: site.priceRange,
    telephone: site.phoneHref,
    servesCuisine: ["Cuisine du Sud-Ouest", "Cuisine traditionnelle", "Pizza au feu de bois"],
    sameAs: [site.googleBusinessProfile, site.socials.facebook].filter(Boolean),
    menu: `${site.url}/la-carte`,
    hasMap: site.mapsLink,
    openingHoursSpecification: site.openingHoursSpecification.map((slot) => ({
      "@type": "OpeningHoursSpecification",
      dayOfWeek: slot.dayOfWeek,
      opens: slot.opens,
      closes: slot.closes,
    })),
    address: {
      "@type": "PostalAddress",
      streetAddress: site.address,
      addressLocality: site.city,
      postalCode: site.postalCode,
      addressCountry: site.countryCode,
    },
    geo: {
      "@type": "GeoCoordinates",
      latitude: site.geo.latitude,
      longitude: site.geo.longitude,
    },
  };

  return (
    <html lang="fr">
      <body className={`${displayFont.variable} ${bodyFont.variable} ${accentFont.variable} ${scriptFont.variable}`}>
        <script dangerouslySetInnerHTML={{ __html: bodyClassBootScript }} />
        <BodyClassManager />
        <a href="#main-content" className="sr-only">
          Aller au contenu principal
        </a>
        <Header />
        <main id="main-content" className="site-main">
          {children}
        </main>
        <Footer />
        <SiteScript />
        <script type="application/ld+json" dangerouslySetInnerHTML={{ __html: JSON.stringify(restaurantJsonLd) }} />
      </body>
    </html>
  );
}
