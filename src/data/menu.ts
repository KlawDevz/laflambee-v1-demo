export const menuNav = [
  ["#specialites", "Spécialités"],
  ["#pizzas", "Pizzas"],
  ["#plats", "Viandes & Plats"],
  ["#entrees", "Entrées & Salades"],
  ["#snacking", "Snacking"],
  ["#desserts", "Desserts & Crêpes"],
  ["#menus", "Menus"],
  ["#vins", "Vins & Boissons"],
] as const;

export const featuredSpecialties = [
  ["Le plus demandé", "Cassoulet au confit", "Haricots lingots, saucisse de Toulouse et confit de canard", "24 €"],
  ["Spécialité maison", "Pizza Reine", "Tomate, mozzarella, jambon, champignons", "12 €"],
  ["Suggestion du chef", "Entrecôte grillée (300g)", "Viande de bœuf grillée, servie avec frites", "19,50 €"],
  ["Le plus demandé", "Crêpe gourmande", "Chocolat maison, chantilly et éclats de noisettes", "7 €"],
] as const;

export const pizzas = [
  ["Marguerite", "Tomate, mozzarella, olives", "10 €", ""],
  ["Reine", "Tomate, mozzarella, jambon, champignons", "12 €", "Le plus demandé"],
  ["Napolitaine", "Tomate, mozzarella, anchois, câpres, olives", "12,50 €", ""],
  ["4 Fromages", "Tomate, mozzarella, chèvre, emmental, bleu", "13,50 €", "Spécialité maison"],
  ["Orientale", "Tomate, mozzarella, merguez, poivrons, œuf", "13 €", ""],
  ["Calzone (chausson)", "Tomate, mozzarella, jambon, œuf", "13 €", ""],
  ["Végétarienne", "Tomate, mozzarella, légumes frais, olives", "12,50 €", ""],
  ["Hawaïenne", "Tomate, mozzarella, jambon, ananas", "12,50 €", ""],
  ["Paysanne", "Crème, mozzarella, lardons, oignons, pommes de terre", "13,50 €", ""],
  ["Nordique", "Crème, mozzarella, saumon fumé, citron", "14,50 €", "Suggestion du chef"],
  ["Burger (pizza)", "Tomate, mozzarella, bœuf haché, sauce burger", "14 €", ""],
] as const;

export const plats = [
  ["Entrecôte (300g)", "Grillée, servie avec frites", "19,50 €", "Spécialité maison"],
  ["Steak haché à cheval", "Bœuf grillé, œuf au plat, servi avec frites", "13 €", ""],
  ["Escalope de poulet à la crème", "Poulet tendre, sauce crémeuse maison", "14,50 €", ""],
  ["Pâtes Carbonara", "Crème, lardons, parmesan", "12 €", ""],
  ["Pâtes Bolognaise", "Sauce tomate mijotée, viande de bœuf", "11,50 €", ""],
] as const;

export const entrees = [
  ["Salade mixte", "Salade fraîche, crudités", "8,50 €", ""],
  ["Salade César", "Poulet, parmesan, croûtons, sauce César", "13,50 €", "Le plus demandé"],
  ["Salade italienne", "Tomates, mozzarella, jambon", "13 €", ""],
  ["Assiette de jambon cru", "Charcuterie fine", "11 €", ""],
  ["Camembert rôti", "Fromage chaud, fondant", "12,50 €", "Spécialité maison"],
] as const;

export const snacking = [
  ["Burger classique", "Bœuf, fromage, salade, sauce", "10,50 €"],
  ["Burger flamand", "Recette maison", "13 €"],
  ["Frites", "", "4 €"],
  ["Nuggets (x6)", "", "6 €"],
] as const;

export const desserts = [
  ["Crêpe sucre", "", "4 €", ""],
  ["Crêpe Nutella", "", "5,50 €", "Le plus demandé"],
  ["Crêpe caramel beurre salé", "", "5,50 €", ""],
  ["Café gourmand", "Assortiment de desserts", "7,50 €", "Spécialité maison"],
  ["Mousse au chocolat", "", "5 €", ""],
  ["Tiramisu", "", "6 €", "Suggestion du chef"],
  ["La crêpe flambée", "Notre clin d'œil à La Flambée : caramel, beurre salé et flambage minute.", "", "Signature"],
] as const;

export const boissons = [
  ["Soda (33cl)", "", "3,50 €"],
  ["Eau minérale (50cl)", "", "3 €"],
  ["Bière pression (25cl)", "", "3,50 €"],
  ["Bière pression (50cl)", "", "6,50 €"],
  ["Mojito", "", "8,50 €"],
  ["Spritz", "", "7,50 €"],
  ["Café", "", "1,80 €"],
  ["Verre de vin", "", "à partir de 4 €"],
] as const;

export const formules = [
  ["Menu enfant", "Plat + dessert + boisson", "9,50 €", ""],
  ["Menu du midi", "Entrée + plat ou plat + dessert", "16 €", "Le plus demandé"],
] as const;
