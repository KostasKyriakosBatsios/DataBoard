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

// showing the sections of main content when scrolling
document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll("section");
    sections.forEach((section) => {
        section.classList.add("visible");
    });
});