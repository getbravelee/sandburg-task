const puppeteer = require("puppeteer");
const cheerio = require("cheerio");
const fs = require("fs");

(async () => {
    const browser = await puppeteer.launch({
        headless: false,
    });

    const page = await browser.newPage();
    await page.setViewport({
        width: 1366,
        height: 768,
    });
    await page.goto("https://pages.coupang.com/p/103208?channel=plp_C2");
    const content = await page.content();
    const $ = cheerio.load(content);
    const lists = $("div.product-list-contents > div");

    let crawledData = [];

    lists.each((index, list) => {
        const name = $(list).find("div.product-unit-info > span").text();
        const link = $(list).find("div.weblog > a").attr("href");

        if (name.trim() !== "") {
            crawledData.push({ index, name, link }); // 링크 추가
            console.log({
                index,
                name,
                link, // 콘솔에 출력하여 확인
            });
        }
    });

    // 크롤링한 데이터를 coupangBestData.json 파일로 저장
    fs.writeFileSync("./coupangBestData.json", JSON.stringify(crawledData));

    browser.close();
})();
