
const { result } = require('lodash');
const puppeteer = require('puppeteer');


// https://www.youtube.com/watch?v=TzZ3YOUhCxo  Youtube video sur comment utiliser Puppeteer
async function scrapeProduct(numberPage, product_list_limit) {

    data = [];

    for(let i=1; i<=numberPage; i++) {
        url = 'https://www.saq.com/fr/produits/vin?p='+ i +'&product_list_limit='+product_list_limit;

        const browser = await puppeteer.launch();
        const page  = await browser.newPage();
        await page.goto(url);
        for(let j=1; j<=product_list_limit; j++) {
            try {
                const [name] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+ j +']/div/div[3]/div[1]/div[1]/strong[1]/a');
                const [image_link] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+ j +']/div/a/span[2]/span/img');
                const [code] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+ j +']/div/div[3]/div[1]/div[1]/div[2]/span[2]');
                const [price] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+ j +']/div/div[3]/div[1]/div[1]/div[4]/span/span/span');
                const [color] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+ j +']/div/div[3]/div[1]/div[1]/strong[2]/span/text()[1]');
                const [ml_quantity] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+ j +']/div/div[3]/div[1]/div[1]/strong[2]/span/text()[2]');
                const [country] = await page.$x('/html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li['+ j +']/div/div[3]/div[1]/div[1]/strong[2]/span/text()[3]');


                const srcName = await name.getProperty('textContent');
                const srcImageLink = await image_link.getProperty('src');
                const srcCode = await code.getProperty('textContent');
                const srcPrice = await price.getProperty('textContent');
                const srcColor = await color.getProperty('textContent');
                const srcMlQuantity = await ml_quantity.getProperty('textContent');
                const srcCountry = await country.getProperty('textContent');

                const srcNameText = await srcName.jsonValue();
                const srcImageLinkText = await srcImageLink.jsonValue();
                const srcCodeText = await srcCode.jsonValue();
                const srcPriceText = await srcPrice.jsonValue();
                const srcColorText = await srcColor.jsonValue();
                const srcMlQuantityText = await srcMlQuantity.jsonValue();
                const srcCountryText = await srcCountry.jsonValue();


                // console.log('Page: ' + i + ' id=' + j + ' => ' + srcNameText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "));
                // console.log('Page: ' + i + ' id=' + j + ' => ' + srcImageLinkText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "));
                // console.log('Page: ' + i + ' id=' + j + ' => ' + srcCodeText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "));
                // console.log('Page: ' + i + ' id=' + j + ' => ' + srcPriceText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "));
                // console.log('Page: ' + i + ' id=' + j + ' => ' + srcColorText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "));
                // console.log('Page: ' + i + ' id=' + j + ' => ' + srcMlQuantityText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "));
                // console.log('Page: ' + i + ' id=' + j + ' => ' + srcCountryText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "));

                data = {
                    "page": i,
                    "id": j,
                    "name": srcNameText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "),
                    "color": srcColorText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " ").substring(4),
                    "ml_quantity": srcMlQuantityText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " ").slice(0, -3),
                    "country": srcCountryText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "),
                    "code": srcCodeText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "),
                    "price": srcPriceText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " ").slice(0, -2).replace(',', '.'),
                    "image_link": srcImageLinkText.replace(/^\s+|\s+$/g, "").replace(/\s+/g, " "),
                };
                console.log(data);
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

scrapeProduct(1,24);
