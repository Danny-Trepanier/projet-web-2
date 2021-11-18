
const puppeteer = require('puppeteer');


// https://www.youtube.com/watch?v=TzZ3YOUhCxo  Youtube video sur comment utiliser Puppeteer
async function scrapeProduct(url) {

	const browser = await puppeteer.launch();
	const page  = await browser.newPage();
	await page.goto(url);
	for(let i=1; i<=24; i++) {
		const [el] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+i +']/div/div[3]/div[1]/div[1]/strong[1]/a');
		const src = await el.getProperty('textContent');
		const srcText = await src.jsonValue();

		console.log({srcText});
	}

}

scrapeProduct('https://www.saq.com/fr/produits/vin?p=2');