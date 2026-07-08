const sharp = require('sharp');
const fs = require('fs');
const path = require('path');

const publicDir = process.argv[2];
const svgPath = path.join(publicDir, 'favicon.svg');
const svgBuffer = fs.readFileSync(svgPath);

function buildIco(pngBuffers) {
  const count = pngBuffers.length;
  const headerSize = 6;
  const dirEntrySize = 16;
  let offset = headerSize + dirEntrySize * count;

  const header = Buffer.alloc(headerSize);
  header.writeUInt16LE(0, 0); // reserved
  header.writeUInt16LE(1, 2); // type: icon
  header.writeUInt16LE(count, 4); // number of images

  const dirEntries = [];
  for (const { size, buffer } of pngBuffers) {
    const entry = Buffer.alloc(dirEntrySize);
    entry.writeUInt8(size >= 256 ? 0 : size, 0); // width
    entry.writeUInt8(size >= 256 ? 0 : size, 1); // height
    entry.writeUInt8(0, 2); // color palette
    entry.writeUInt8(0, 3); // reserved
    entry.writeUInt16LE(1, 4); // color planes
    entry.writeUInt16LE(32, 6); // bits per pixel
    entry.writeUInt32LE(buffer.length, 8); // size of image data
    entry.writeUInt32LE(offset, 12); // offset
    offset += buffer.length;
    dirEntries.push(entry);
  }

  return Buffer.concat([header, ...dirEntries, ...pngBuffers.map(p => p.buffer)]);
}

async function main() {
  const sizes = [16, 32, 48];
  const pngBuffers = [];
  for (const size of sizes) {
    const buffer = await sharp(svgBuffer, { density: 384 }).resize(size, size).png().toBuffer();
    pngBuffers.push({ size, buffer });
  }

  const ico = buildIco(pngBuffers);
  fs.writeFileSync(path.join(publicDir, 'favicon.ico'), ico);

  const appleTouch = await sharp(svgBuffer, { density: 384 }).resize(180, 180).png().toBuffer();
  fs.writeFileSync(path.join(publicDir, 'apple-touch-icon.png'), appleTouch);

  console.log('favicon.ico and apple-touch-icon.png generated');
}

main().catch((err) => { console.error(err); process.exit(1); });
