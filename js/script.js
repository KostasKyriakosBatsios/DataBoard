const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-button");
const closeBtn = document.querySelector("#close-button");

menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
});