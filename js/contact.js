let txtMail = document.querySelector("#contact_mail");
let btn = document.querySelector(".my_info");
let bot = document.querySelector("#botcatcher");

btn.addEventListener("click", function() {
    if (bot.textContent || !txtMail.textContent) {
        break;
    }
});
