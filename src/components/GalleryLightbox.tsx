"use client";

import Image from "next/image";
import { useEffect, useMemo, useState } from "react";
import { Picture } from "@/components/Picture";

type GalleryItem = readonly [src: string, alt: string];

type GalleryLightboxProps = {
  items: readonly GalleryItem[];
};

export function GalleryLightbox({ items }: GalleryLightboxProps) {
  const [activeIndex, setActiveIndex] = useState<number | null>(null);

  const openAt = (index: number) => setActiveIndex(index);

  const close = () => setActiveIndex(null);

  const goNext = () => {
    setActiveIndex((prev) => {
      if (prev === null) return 0;
      return (prev + 1) % items.length;
    });
  };

  const goPrev = () => {
    setActiveIndex((prev) => {
      if (prev === null) return 0;
      return (prev - 1 + items.length) % items.length;
    });
  };

  const activeItem = useMemo(() => {
    if (activeIndex === null) return null;
    return items[activeIndex] ?? null;
  }, [activeIndex, items]);

  useEffect(() => {
    if (activeIndex === null) return;

    const onKeyDown = (event: KeyboardEvent) => {
      if (event.key === "Escape") {
        setActiveIndex(null);
      }

      if (event.key === "ArrowRight") {
        setActiveIndex((prev) => {
          if (prev === null) return 0;
          return (prev + 1) % items.length;
        });
      }

      if (event.key === "ArrowLeft") {
        setActiveIndex((prev) => {
          if (prev === null) return 0;
          return (prev - 1 + items.length) % items.length;
        });
      }
    };

    const originalOverflow = document.body.style.overflow;
    document.body.style.overflow = "hidden";
    window.addEventListener("keydown", onKeyDown);

    return () => {
      document.body.style.overflow = originalOverflow;
      window.removeEventListener("keydown", onKeyDown);
    };
  }, [activeIndex, items.length]);

  return (
    <>
      <div className="galerie__grid" data-reveal-stagger>
        {items.map(([src, alt], index) => (
          <figure className="galerie__item" key={`${src}-${index}`}>
            <button className="galerie__item-button" type="button" onClick={() => openAt(index)} aria-label={`Agrandir l'image : ${alt}`}>
              <Picture src={src} alt={alt} width={1200} height={800} sizes="(max-width: 768px) 100vw, 400px" />
            </button>
          </figure>
        ))}
      </div>

      {activeItem && (
        <div className="lightbox" role="dialog" aria-modal="true" aria-label="Galerie photos" onClick={close}>
          <button className="lightbox__close" type="button" aria-label="Fermer" onClick={close}>
            ×
          </button>

          <button className="lightbox__nav lightbox__nav--prev" type="button" aria-label="Image précédente" onClick={(event) => {
            event.stopPropagation();
            goPrev();
          }}>
            ‹
          </button>

          <figure className="lightbox__content" onClick={(event) => event.stopPropagation()}>
            <Image
              src={activeItem[0]}
              alt={activeItem[1]}
              width={1600}
              height={1067}
              sizes="(max-width: 768px) 92vw, 1200px"
              priority
            />
            <figcaption className="lightbox__caption">{activeItem[1]}</figcaption>
          </figure>

          <button className="lightbox__nav lightbox__nav--next" type="button" aria-label="Image suivante" onClick={(event) => {
            event.stopPropagation();
            goNext();
          }}>
            ›
          </button>
        </div>
      )}
    </>
  );
}
