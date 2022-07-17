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
//dash board btn
let btn_dashboard = document.querySelector("#btn_dashboard");
let dash = document.querySelector(".dashboard");
btn_dashboard.onclick = function(){
    dash.classList.toggle("active")
}
//user
let btn_user = document.querySelector("#btn_user");
let user = document.querySelector(".user");
btn_user.onclick = function(){
    user.classList.toggle("active")
}
//issue
let btn_issue = document.querySelector("#btn_issue");
let issue = document.querySelector(".issue");
btn_issue.onclick = function(){
    issue.classList.toggle("active")
}
//book
let btn_book = document.querySelector("#btn_book");
let book = document.querySelector(".book");
btn_book.onclick = function(){
    book.classList.toggle("active")
}
//author
let btn_author = document.querySelector("#btn_author");
let author = document.querySelector(".author");
btn_author.onclick = function(){
    author.classList.toggle("active")
}
//author
let btn_category = document.querySelector("#btn_category");
let category = document.querySelector(".category");
btn_category.onclick = function(){
    category.classList.toggle("active")
}