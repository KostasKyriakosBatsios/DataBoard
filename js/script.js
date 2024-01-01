const wrapper = document.querySelector('.wrapper');
const loginBtn = document.querySelector('.login-btn');
const closeIcon = document.querySelector('.icon-close')

loginBtn.addEventListener('click', () => {
    wrapper.classList.add('active');
});

closeIcon.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

function openDataBoard(button) {
    window.location.href = "databoard.php";
}