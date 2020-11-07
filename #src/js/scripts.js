window.onload = function() {

// слайдер (без кнопок, переключается сам)

let slides = document.querySelectorAll('.main-slider__item');
let currentSlide = 0;

setInterval(showingSlide, 7000);

function showingSlide() {
  slides[currentSlide].classList.remove('slide-show');
  currentSlide++;
  if (slides[currentSlide] === slides.lenth) {
    currentSlide = 0;
  }
  slides[currentSlide].classList.add('slide-show');
}

// меню для мобильной версии

const navToggle = document.querySelector('.js-navigation-toggle');
const navMenu = document.querySelector('.header__navigation');

navToggle.addEventListener('click', function() {
	navMenu.classList.toggle('nav-toggle-close');
	
	if (navMenu.classList.contains('nav-toggle-close')) {
		navMenu.style.display = 'flex';
		navToggle.style.opacity = '0';
	} else {
		navMenu.style.display = 'none';
		navToggle.style.opacity = '1';
	}
	
});















}