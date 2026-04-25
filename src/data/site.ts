export const site = {
  name: "La Flambée",
  url: "https://laflambee-mirepoix.fr",
  legacyUrl: "https://www.laflambee09.fr",
  phoneDisplay: "05 61 67 12 70",
  phoneHref: "+33561671270",
  address: "24/25 Place Maréchal Leclerc, 09500 Mirepoix",
  city: "Mirepoix",
  postalCode: "09500",
  countryCode: "FR",
  mapsLink: "https://maps.app.goo.gl/rWJrZBGipexgKH6k9",
  googleBusinessProfile: "https://goo.gl/maps/FmzBRecgfLz7wsPQ7",
  geo: {
    latitude: 43.0863073,
    longitude: 1.8719266,
  },
  priceRange: "EUR 10-30",
  openingHoursSpecification: [
    { dayOfWeek: "Monday", opens: "12:00", closes: "14:00" },
    { dayOfWeek: "Monday", opens: "19:00", closes: "22:00" },
    { dayOfWeek: "Tuesday", opens: "12:00", closes: "14:00" },
    { dayOfWeek: "Tuesday", opens: "19:00", closes: "22:00" },
    { dayOfWeek: "Friday", opens: "12:00", closes: "14:00" },
    { dayOfWeek: "Friday", opens: "19:00", closes: "22:00" },
    { dayOfWeek: "Saturday", opens: "12:00", closes: "14:00" },
    { dayOfWeek: "Saturday", opens: "19:00", closes: "22:00" },
    { dayOfWeek: "Sunday", opens: "12:00", closes: "14:00" },
    { dayOfWeek: "Sunday", opens: "19:00", closes: "22:00" },
  ] as const,
  footerHours: "Lun-Mar & Ven-Dim : 12h-14h / 19h-22h",
  mapsEmbed:
    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2886.721323381485!2d1.8719266!3d43.0863073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a87bc1a6b0c2e3%3A0xc3b8a1f8c6b7a0b0!2s24%20Pl.%20Mar%C3%A9chal%20Leclerc%2C%2009500%20Mirepoix!5e0!3m2!1sfr!2sfr",
  socials: {
    facebook: "https://www.facebook.com/profile.php?id=100054650971665",
    instagram: "",
  },
  hours: [
    ["Lundi", "12h–14h / 19h–22h"],
    ["Mardi", "12h–14h / 19h–22h"],
    ["Mercredi", "Fermé"],
    ["Jeudi", "Fermé"],
    ["Vendredi", "12h–14h / 19h–22h"],
    ["Samedi", "12h–14h / 19h–22h"],
    ["Dimanche", "12h–14h / 19h–22h"],
  ] as const,
};

export const mainNav = [
  { href: "/", label: "Accueil" },
  { href: "/la-carte", label: "La Carte" },
  { href: "/equipe", label: "L'Équipe" },
  { href: "/galerie", label: "Galerie" },
  { href: "/contact", label: "Contact" },
];
