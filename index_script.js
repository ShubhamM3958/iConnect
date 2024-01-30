const scroll_indicator = document.getElementById("scroll-indicator");
const nav_toggler = document.getElementById('nav-toggler');
const nav_items = document.getElementById('nav-items');
const head_bg = document.getElementById('head-bg');
const about_buttons = document.querySelectorAll('.about-button');
const about_info = document.querySelectorAll('.about-info');
document.getElementById('about-iconnect_button');
document.getElementById('about-pduiic_button');
document.getElementById('about-gju_button');
const workshop_cards = document.querySelectorAll('.workshop-card');
// let links = [
//   "https://unstop.com/competitions/visionathon-konark-the-chariot-of-innovation-guru-jambheshwar-university-of-science-and-technology-hisar-ha-868270",
//   "https://unstop.com/quiz/vizwiz-2024-data-visualization-challenge-konark-the-chariot-of-innovation-guru-jambheshwar-university-of-science-an-879535",
//   "https://unstop.com/hackathons/crown-for-code-konark-the-chariot-of-innovation-guru-jambheshwar-university-of-science-and-technology-hisar-h-879621"
// ];


// workshop_cards.forEach((workshop_card, index) => {
//   workshop_card.addEventListener('click', () => {
//     window.open("register.php?eventid="+index, target = '_blank');
//   })
// })

about_buttons.forEach((button, index) => {
  button.addEventListener('click', () => {
    for (let i = 0; i < 3; i++) {
      if (i == index) {
        about_buttons[i].classList.add('active');
        about_info[i].classList.add('active');
      }
      else {
        about_buttons[i].classList.remove('active');
        about_info[i].classList.remove('active');
      }
    }

  })
})


const top_button = document.getElementById('float-btn');
function updateProgressBar() {
  let totalHeight = document.body.scrollHeight - window.innerHeight;
  let progress = (window.scrollY / totalHeight) * 120;
  scroll_indicator.style.height = progress + 'px';
}
window.addEventListener('scroll', function () {
  updateProgressBar();
});
updateProgressBar();

top_button.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
})
nav_toggler.addEventListener('click', () => {
  if (!nav_items.classList.contains('active')) {
    nav_items.classList.add('active');
    nav_items.style.right = '0%';
  }
  else {
    nav_items.classList.remove('active');
    nav_items.style.right = '-100%';
  }
})
let prevScrollPos = window.scrollY;
const navbar = document.querySelector('.navbar');
const toTop = document.querySelector('#float-btn');

window.onscroll = function () {
  const currentScrollPos = window.scrollY;
  nav_items.classList.remove('active');
  nav_items.style.right = '-100%';

  if (prevScrollPos < currentScrollPos && currentScrollPos>500) {
    navbar.classList.remove('slide-up');
    navbar.classList.add('slide-down');

  } else {
    navbar.classList.remove('slide-down');
    navbar.classList.add('slide-up');

  }
  if (currentScrollPos >= 400) {
    toTop.classList.remove('slide-up');
    toTop.classList.add('slide-down');
  }
  else {
    toTop.classList.remove('slide-down');
    toTop.classList.add('slide-up');
  }

  prevScrollPos = currentScrollPos;
};

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

function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 50;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);
reveal();