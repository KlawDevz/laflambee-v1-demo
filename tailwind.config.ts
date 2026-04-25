import type { Config } from "tailwindcss";

const config: Config = {
  content: [
    "./src/pages/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/components/**/*.{js,ts,jsx,tsx,mdx}",
    "./src/app/**/*.{js,ts,jsx,tsx,mdx}",
  ],
  theme: {
    extend: {
      colors: {
        background: "oklch(var(--background) / <alpha-value>)",
        foreground: "oklch(var(--foreground) / <alpha-value>)",
        brand: {
          orange: "oklch(65% 0.18 45)", // Orange brûlé chaleureux
          brick: "oklch(45% 0.16 28)",  // Rouge brique terreux
          cream: "oklch(97% 0.01 70)",  // Crème sablé doux
          dark: "oklch(20% 0.02 30)",   // Noir profond teinté
        },
      },
      fontFamily: {
        serif: ["var(--font-baskervville)", "serif"],
        sans: ["var(--font-onest)", "sans-serif"],
      },
    },
  },
  plugins: [],
};
export default config;
