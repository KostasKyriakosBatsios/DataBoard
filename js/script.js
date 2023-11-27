const sidebarMenu = document.querySelector("aside");
const menuButton = document.querySelector("#menu-btn");
const closeButton = document.querySelector("#close-btn");

menuButton.addEventListener('click', () => {
    sidebarMenu.style.display = 'block';
});

closeButton.addEventListener('click', () => {
    sidebarMenu.style.display = 'none';
});