export const homeData = {
  hero: {
    title: "Restaurant La Flambée",
    subtitle: "Cuisine artisanale du Sud-Ouest, midi et soir à Mirepoix.",
    image: {
      src: "/images/salle-restaurant-verriere.jpg",
      alt: "Salle verrière La Flambée",
      width: 2000,
      height: 1335,
    },
  },
  intro: {
    label: "Bienvenue",
    title: "Cuisine du terroir à Mirepoix : braise, produits locaux et convivialité",
    description:
      "Une cuisine artisanale, des produits du Sud-Ouest et un accueil simple, chaleureux et généreux.",
    facts: ["Place Maréchal Leclerc, Mirepoix", "Service midi et soir selon les jours"],
    image: {
      src: "/images/entree_salade_foie_gras_magret.jpg",
      alt: "Entrée salade foie gras",
      width: 1200,
      height: 800,
    },
  },
  features: [
    {
      title: "Fait maison",
      text: "Entrées, plats et desserts préparés sur place.",
    },
    {
      title: "Produits locaux",
      text: "Sélection de producteurs de l'Ariège et du Sud-Ouest.",
    },
    {
      title: "Cuisson au feu de bois",
      text: "Pizzas croustillantes et goût fumé signature.",
    },
  ],
};

export const signatureDishes = [
  {
    name: "Salade gourmande au foie gras",
    desc: "Magret fumé, foie gras et assaisonnement maison.",
    price: "18 €",
    image: "/images/entree_salade_foie_gras_magret.jpg",
  },
  {
    name: "Entrecôte grillée",
    desc: "Frites maison et sauce du Sud-Ouest.",
    price: "19,50 €",
    image: "/images/plat_entrecote_frites_sauce.jpg",
  },
  {
    name: "Mousse au chocolat maison",
    desc: "Chocolat noir, texture légère, gourmandise pure.",
    price: "6 €",
    image: "/images/dessert_mousse_au_chocolat_maison.jpg",
  },
];

export const ambianceImages = [
  ["/images/terrasse-exterieure-mirepoix.jpg", "Terrasse extérieure Mirepoix"],
  ["/images/bar-restaurant.jpg", "Bar du restaurant"],
  ["/images/table_plats_viande_et_pates.jpg", "Table de plats du terroir"],
  ["/images/vin_blanc_glace_degustation.jpg", "Vin blanc en dégustation"],
  ["/images/salle-interieure-poutres.jpg", "Salle intérieure avec poutres"],
  ["/images/cuisine_cuisiniers_preparation.jpg", "Cuisine en action"],
  ["/images/plat_entrecote_frites_sauce.jpg", "Entrecôte frites maison"],
  ["/images/plat_gambas_grillees_riz.jpg", "Gambas grillées et riz"],
] as const;

export const menuTeasers = [
  {
    title: "Entrées",
    href: "/la-carte#entrees",
    image: "/images/entrees_table_salade_au_fromage.jpg",
    alt: "Entrées",
  },
  {
    title: "Plats",
    href: "/la-carte#plats",
    image: "/images/plat_pave_saumon_riz_legumes.jpg",
    alt: "Plats",
  },
  {
    title: "Desserts",
    href: "/la-carte#desserts",
    image: "/images/desserts_patisseries_fruits.jpg",
    alt: "Desserts",
  },
];
