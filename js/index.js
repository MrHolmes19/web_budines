/* ---- Gestiona el menu hamburguesa de la pagina principal ----*/

const hamburger = document.querySelector(".header .nav-bar .nav-list .hamburger");
const movileMenu = document.querySelector(".header .nav-bar .nav-list ul");
const menuItem = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector(".header.container");
const nombre = document.querySelector(".brand h1");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    movileMenu.classList.toggle("active");
});

document.addEventListener("scroll", () => {
    var scroll_position = window.scrollY;
    if (scroll_position > 450) {
        header.style.backgroundColor = "#29323c";
        nombre.style.display = "inline-block";
    } else {
        header.style.backgroundColor = 'transparent';
        nombre.style.display = "none";

    }
});

menuItem.forEach((item) => {
    item.addEventListener("click", () => {
        hamburger.classList.toggle("active");
        movileMenu.classList.toggle("active");
    });
});