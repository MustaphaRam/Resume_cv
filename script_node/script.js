const puppeteer = require('puppeteer');
const fs = require('fs');

(async () => {
  try {
    // inputs
    const id = process.argv[2];
    const pathfile = process.argv[3];

    // Read HTML content from the file
    const html = fs.readFileSync(pathfile, 'utf-8');

    const browser = await puppeteer.launch({ headless: true });
    const page = await browser.newPage();

    // Set HTML content and wait for rendering
    await page.setContent(html);

    // Generate PDF
    const PDF = await page.pdf({ format: 'A4', printBackground: true});

    await browser.close();

    const fs1 = require('fs');
    fs1.writeFileSync(`../Document/${id}.pdf`, PDF);
    console.log('PDF file generated successfully.');
  } catch (error) {
    console.error('Error generating PDF:', error);
  }
})();
