const nav_toggler = document.getElementById('nav-toggler');
const nav_items = document.getElementById('nav-items');

let prevScrollPos = window.scrollY;
const navbar = document.querySelector('.navbar');

window.onscroll = function () {
  const currentScrollPos = window.scrollY;

  if (prevScrollPos < currentScrollPos && currentScrollPos>100) {
    navbar.classList.remove('slide-up');
    navbar.classList.add('slide-down');
  } else {
    navbar.classList.remove('slide-down');
    navbar.classList.add('slide-up');

  }

  prevScrollPos = currentScrollPos;
};
nav_toggler.addEventListener('click', () => {
  if (!nav_items.classList.contains('active')) {
    nav_items.classList.add('active');
    console.log('active');
    nav_items.style.right = '0%';
  }
  else {
    nav_items.classList.remove('active');
    console.log('not active');
    nav_items.style.right = '-100%';
  }
})
const social_links = document.querySelectorAll('.social-link');
const social_color = ['white', 'purple', 'green', '#0a66c2', 'red'];
social_links.forEach((social_link, index) => {
  social_link.addEventListener('mouseenter', function () {
    social_link.style.color = social_color[index];
  });
  social_link.addEventListener('mouseleave', function () {
    social_link.style.color = 'darkgray';
  });
})