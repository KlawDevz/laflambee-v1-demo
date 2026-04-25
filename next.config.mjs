/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  poweredByHeader: false,
  images: {
    formats: ["image/avif", "image/webp"],
    minimumCacheTTL: 60 * 60 * 24 * 30,
  },
  async redirects() {
    return [
      {
        source: "/contact-acces",
        destination: "/contact",
        permanent: true,
      },
      {
        source: "/contact-acces/",
        destination: "/contact",
        permanent: true,
      },
      {
        source: "/notre-histoire",
        destination: "/equipe",
        permanent: true,
      },
      {
        source: "/notre-histoire/",
        destination: "/equipe",
        permanent: true,
      },
      {
        source: "/l-equipe",
        destination: "/equipe",
        permanent: true,
      },
      {
        source: "/l-equipe/",
        destination: "/equipe",
        permanent: true,
      },
      {
        source: "/la-carte/",
        destination: "/la-carte",
        permanent: true,
      },
      {
        source: "/equipe/",
        destination: "/equipe",
        permanent: true,
      },
      {
        source: "/contact/",
        destination: "/contact",
        permanent: true,
      },
      {
        source: "/mentions-legales/",
        destination: "/mentions-legales",
        permanent: true,
      },
      {
        source: "/politique-de-confidentialite",
        destination: "/politique-confidentialite",
        permanent: true,
      },
      {
        source: "/politique-de-confidentialite/",
        destination: "/politique-confidentialite",
        permanent: true,
      },
      {
        source: "/menu-et-carte",
        destination: "/la-carte#menus",
        permanent: true,
      },
      {
        source: "/menu-et-carte/",
        destination: "/la-carte#menus",
        permanent: true,
      },
      {
        source: "/nos-pizzas",
        destination: "/la-carte#pizzas",
        permanent: true,
      },
      {
        source: "/nos-pizzas/",
        destination: "/la-carte#pizzas",
        permanent: true,
      },
      {
        source: "/nos-viandes",
        destination: "/la-carte#plats",
        permanent: true,
      },
      {
        source: "/nos-viandes/",
        destination: "/la-carte#plats",
        permanent: true,
      },
      {
        source: "/galerie-photos",
        destination: "/galerie",
        permanent: true,
      },
      {
        source: "/galerie-photos/",
        destination: "/galerie",
        permanent: true,
      },
      {
        source: "/avis",
        destination: "/contact",
        permanent: true,
      },
      {
        source: "/avis/",
        destination: "/contact",
        permanent: true,
      },
    ];
  },
};

export default nextConfig;
