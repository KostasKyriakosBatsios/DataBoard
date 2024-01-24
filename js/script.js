// Operations for opening and closing the login form:
const wrapper = document.querySelector('.wrapper');
const loginBtn = document.querySelector('.login-btn');
const closeIcon = document.querySelector('.icon-close')

loginBtn.addEventListener('click', () => {
    wrapper.classList.add('active');
});

closeIcon.addEventListener('click', () => {
    wrapper.classList.remove('active');
});

// Animations:
// Using 'ScrollReveal' by https://github.com/jlmakes/scrollreveal):
// Creating ScrollReveal:
const sr = ScrollReveal({
  distance: '65px',
  duration: 2600,
  delay: 450,
  reset: true
});
// Calling Reveal Methods:
sr.reveal('#top-bar', { delay: 500, origin: 'top' });
sr.reveal('.about-app', { delay: 1500, origin: 'left' });
sr.reveal('.main-logo', { delay: 2500, origin: 'left' });
sr.reveal('#info', { delay: 1500, origin: 'bottom' });