//menu btn
let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let searchBtn = document.querySelector(".bx-search");
btn.onclick = function(){
    sidebar.classList.toggle("active")
}
searchBtn.onclick = function(){
sidebar.classList.toggle("active")
}
// //dash board btn
// let btn_dashboard = document.querySelector("#btn_dashboard");
// let dash = document.querySelector(".dashboard");
// btn_dashboard.onclick = function(){
//     dash.classList.toggle("active")
// }
// //user
// let btn_user = document.querySelector("#btn_user");
// let user = document.querySelector(".user");
// btn_user.onclick = function(){
//     user.classList.toggle("active")
// }
// //issue
// let btn_issue = document.querySelector("#btn_issue");
// let issue = document.querySelector(".issue");
// btn_issue.onclick = function(){
//     issue.classList.toggle("active")
// }
// //book
// let btn_book = document.querySelector("#btn_book");
// let book = document.querySelector(".book");
// btn_book.onclick = function(){
//     book.classList.toggle("active")
// }
// //author
// let btn_author = document.querySelector("#btn_author");
// let author = document.querySelector(".author");
// btn_author.onclick = function(){
//     author.classList.toggle("active")
// }
// //author
// let btn_category = document.querySelector("#btn_category");
// let category = document.querySelector(".category");
// btn_category.onclick = function(){
//     category.classList.toggle("active")
// }
window.onload = () => {
    const tab_switchers = document.querySelectorAll('[data-switcher]');

    for (let i = 0; i < tab_switchers.length; i++) {
        const tab_switcher = tab_switchers[i];
        const page_id = tab_switcher.dataset.tab;

        tab_switcher.addEventListener('click', () => {
            document.querySelector('.tabs .tab.is-active').classList.remove('is-active');
            tab_switcher.parentNode.classList.add('is-active');

            SwitchPage(page_id);
        });
    }
}

function SwitchPage (page_id) {
    console.log(page_id);

    const current_page = document.querySelector('.pages .page.is-active');
    current_page.classList.remove('is-active');

    const next_page = document.querySelector(`.pages .page[data-page="${page_id}"]`);
    next_page.classList.add('is-active');
}