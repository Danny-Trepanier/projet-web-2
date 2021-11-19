
const { result } = require('lodash');
const puppeteer = require('puppeteer');


// https://www.youtube.com/watch?v=TzZ3YOUhCxo  Youtube video sur comment utiliser Puppeteer
async function scrapeProduct(numberPage, product_list_limit) {

    for(let i=1; i<=numberPage; i++) {
        url = 'https://www.saq.com/fr/produits/vin?p='+ i +'&product_list_limit='+ product_list_limit +'';

        const browser = await puppeteer.launch();
        const page  = await browser.newPage();
        await page.goto(url);
        for(let j=1; j<=product_list_limit; j++) {
            try {
                const [el] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+ j +']/div/div[3]/div[1]/div[1]/strong[1]/a');
                const src = await el.getProperty('textContent');
                const srcText = await src.jsonValue();
                console.log('Page: ' + i + ' id=' + j + ' => ' + srcText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "));
            }
            catch (error) {
                console.log("Impossible de prendre la bouteille " +j);
            }
        }
    }
}

// On fait la boucle pour appeler le nombre de page et le nombre de produit limite par page demandé par l'admin
// function sendRequest(numberPage, product_list_limit) {

//     for(let i=1; i<=numberPage; i++) {
//         scrapeProduct('https://www.saq.com/fr/produits/vin?p='+ i +'&product_list_limit='+ product_list_limit +'', i, product_list_limit);
//     }
// }

scrapeProduct(93,96);
