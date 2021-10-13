var bool = 0;
let drk = document.querySelector(".card_name");

drk.addEventListener("click", function () {
    let f_head = document.querySelector("header");
    let f_body = document.querySelector("body");
    let f_foot = document.querySelector("footer");
    let descript = document.querySelector(".blk");
    let descript_w = document.querySelector(".wht");
    let comps = f_body.querySelectorAll(".card_dual");
    let my_titles = document.querySelectorAll(".titre");

    if (bool === 0) {
        descript.style.display = "none";
        descript_w.style.display = "block";
        f_head.style.background = "grey";
        f_body.style.color = "white";
        f_body.style.background = "black";
        f_foot.style.background = "grey";
        for (let cnt = 0; comps[cnt]; cnt += 1) {
            comps[cnt].style.background = "white"
            comps[cnt].style.color = "black";
            comps[cnt].style.borderRadius = "12px";
        }
        for (let cnt = 0; my_titles[cnt]; cnt += 1) {
            my_titles[cnt].style.textDecoration = "underline white";
        }
        bool = 1;
    } else if (bool === 1) {
        descript.style.display = "block";
        descript_w.style.display = "none";
        f_head.style.background = "grey";
        f_body.style.color = "black";
        f_body.style.background = "white";
        f_foot.style.background = "black";
        for (let cnt = 0; comps[cnt]; cnt += 1) {
            comps[cnt].style.background = "none";
        }
        for (let cnt = 0; my_titles[cnt]; cnt += 1) {
            my_titles[cnt].style.textDecoration = "underline black";
        }
        bool = 0;
    }
});