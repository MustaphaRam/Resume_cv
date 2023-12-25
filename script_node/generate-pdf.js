const puppeteer = require('puppeteer');
const blade = require('laravel-blade-compiler');

(async () => {
  try {
    // get path blade and compile
    const html = blade({path: 'C:/xampp/htdocs/laravel/Resume_cv/resources/views/template/t1.blade.php'});

    // Create a new Puppeteer browser instance
    const browser = await puppeteer.launch({ headless: false });

    // Create a new Puppeteer page instance
    const page = await browser.newPage();

    // Set the HTML content of the page
    await page.setContent(html);

    // Generate a PDF from the page
    const fpdf = await page.pdf({ format: 'A4', printBackground: true});

    // Close the browser instance
    await browser.close();
    // Save the PDF buffer to a file
    const fs = require('fs');
    fs.writeFileSync('../Document/'+id+'.pdf', fpdf);
    console.log('good');
  } catch(e) {
    return console.log(e);
  }
})();

const id = process.argv[2];
const url = process.argv[3];
