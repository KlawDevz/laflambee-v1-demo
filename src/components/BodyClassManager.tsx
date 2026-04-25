"use client";

import { usePathname } from "next/navigation";
import { useLayoutEffect } from "react";
import { getBodyClasses } from "@/lib/bodyClasses";

const MANAGED_CLASSES = [
  "home",
  "is-front-page",
  "page-carte",
  "page-template-page-carte-php",
  "page-template-page-carte",
  "page-contact",
  "page-equipe",
  "page-galerie",
  "is-legal-page",
  "page-template-page-equipe-php",
  "page-template-page-equipe",
  "page-template-page-contact-php",
  "page-template-page-contact",
] as const;

export function BodyClassManager() {
  const pathname = usePathname();

  useLayoutEffect(() => {
    const body = document.body;
    if (!body) return;

    body.classList.remove(...MANAGED_CLASSES);

    const classes = getBodyClasses(pathname);
    if (classes.length) {
      body.classList.add(...classes);
    }
  }, [pathname]);

  return null;
}
