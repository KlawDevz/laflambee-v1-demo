export function getBodyClasses(pathname: string): string[] {
  const path = pathname.length > 1 && pathname.endsWith("/") ? pathname.slice(0, -1) : pathname;

  if (path === "/") {
    return ["home", "is-front-page"];
  }

  if (path === "/la-carte") {
    return ["page-carte", "page-template-page-carte-php", "page-template-page-carte"];
  }

  if (path === "/contact") {
    return ["page-contact", "page-template-page-contact-php", "page-template-page-contact"];
  }

  if (path === "/equipe" || path === "/notre-histoire") {
    return ["page-equipe", "page-template-page-equipe-php", "page-template-page-equipe"];
  }

  if (path === "/galerie") {
    return ["page-galerie"];
  }

  if (path === "/mentions-legales" || path === "/politique-confidentialite") {
    return ["is-legal-page"];
  }

  return [];
}
