const fs = require('fs');
const path = require('path');
const sharp = require('sharp');

const inputDir = path.join(__dirname, '..', 'Assets');
const outputDir = path.join(__dirname, '..', 'assets', 'images');

const sizes = [480, 768, 1200, 1600];

if (!fs.existsSync(inputDir)) {
  console.error('Input directory missing:', inputDir);
  process.exit(1);
}

if (!fs.existsSync(outputDir)) {
  fs.mkdirSync(outputDir, { recursive: true });
}

const files = fs.readdirSync(inputDir).filter((f) => /\.(jpe?g|png)$/i.test(f));

async function processFile(file) {
  const srcPath = path.join(inputDir, file);
  const base = path.basename(file, path.extname(file));

  const image = sharp(srcPath);
  const meta = await image.metadata();

  const maxWidth = meta.width || 1600;
  const targetSizes = sizes
    .filter((s) => s <= maxWidth)
    .concat([maxWidth])
    .filter((v, i, a) => a.indexOf(v) === i);

  // Copy original to output if not exists
  const originalDest = path.join(outputDir, file);
  if (!fs.existsSync(originalDest)) {
    fs.copyFileSync(srcPath, originalDest);
  }

  for (const w of targetSizes) {
    const resized = image.clone().resize({ width: w });

    const jpgPath = path.join(outputDir, `${base}-${w}.jpg`);
    if (!fs.existsSync(jpgPath)) {
      await resized.jpeg({ quality: 78, mozjpeg: true }).toFile(jpgPath);
    }

    const webpPath = path.join(outputDir, `${base}-${w}.webp`);
    if (!fs.existsSync(webpPath)) {
      await resized.webp({ quality: 72 }).toFile(webpPath);
    }

    const avifPath = path.join(outputDir, `${base}-${w}.avif`);
    if (!fs.existsSync(avifPath)) {
      await resized.avif({ quality: 50 }).toFile(avifPath);
    }
  }

  return { file, width: meta.width, height: meta.height };
}

(async () => {
  const results = [];
  for (const f of files) {
    try {
      const r = await processFile(f);
      results.push(r);
      console.log('Processed', f, r.width, 'x', r.height);
    } catch (e) {
      console.error('Failed', f, e.message);
    }
  }

  const manifest = {};
  for (const r of results) {
    const base = path.basename(r.file, path.extname(r.file));
    manifest[base] = {
      original: r.file,
      width: r.width,
      height: r.height,
    };
  }

  fs.writeFileSync(path.join(outputDir, 'manifest.json'), JSON.stringify(manifest, null, 2));
  console.log('Manifest written');
})();
