const themeToggler = document.querySelector('.theme-toggler');

// refresh the page
function refreshWelcomePage() {
    window.location.href = 'index.html';
}

// change theme
themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
});

// pressing the button sign in and go to the sign in form
function signIn() {
    window.location.href = "signin.html";
}

// go to the 1st chapter
document.getElementById("first").addEventListener("click", function(event) {
    event.preventDefault(); // Prevents the default behavior of the link
    document.getElementById("chapter1").scrollIntoView({
        behavior: "smooth"
    });
});

// go to the 2nd chapter
document.getElementById("second").addEventListener("click", function(event) {
    event.preventDefault(); // Prevents the default behavior of the link
    document.getElementById("chapter2").scrollIntoView({
        behavior: "smooth"
    });
});

// go to the 3rd chapter
document.getElementById("third").addEventListener("click", function(event) {
    event.preventDefault(); // Prevents the default behavior of the link
    document.getElementById("chapter3").scrollIntoView({
        behavior: "smooth"
    });
});

// go to the 4th chapter
document.getElementById("fourth").addEventListener("click", function(event) {
    event.preventDefault(); // Prevents the default behavior of the link
    document.getElementById("chapter4").scrollIntoView({
        behavior: "smooth"
    });
});