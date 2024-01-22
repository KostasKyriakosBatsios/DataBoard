// operations for opening and closing the login form

const wrapper = document.querySelector('.wrapper');
const loginBtn = document.querySelector('.login-btn');
const closeIcon = document.querySelector('.icon-close')

loginBtn.addEventListener('click', () => {
    wrapper.classList.add('active');
});

closeIcon.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

document.addEventListener("DOMContentLoaded", function() {
    var main = document.getElementById("main");

    setTimeout(function() {
        main.style.top = "0";
    }, 2000)
});