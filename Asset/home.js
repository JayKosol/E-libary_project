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
//