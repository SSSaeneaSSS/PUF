// слайдер (без кнопок, переключается сам) (jQuery)

$(document).ready(function () {
  // верхний слайдер
  $('.main-slider').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 7000,
    speed: 200,
    draggable: false,
    touchThreshold: 100,
  });

  // слайдер с отзывами
  $('.reviews').slick({
    slidesToShow: 3,
    initialSlide: 3,
    waitForAnimate: false,
    touchThreshold: 100,
    responsive: [
      {
        breakpoint: 1060,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 720,
        settings: {
          slidesToShow: 1,
        },
      },
    ],
  });
});

window.onload = function () {
  // меню для мобильной версии

  const navToggle = document.querySelector('.js-navigation-toggle');
  const navMenu = document.querySelector('.header__navigation');

  navToggle.addEventListener('click', function () {
    navMenu.classList.toggle('nav-toggle-close');

    if (navMenu.classList.contains('nav-toggle-close')) {
      navMenu.style.display = 'flex';
      navToggle.style.opacity = '0';
    } else {
      navMenu.style.display = 'none';
      navToggle.style.opacity = '1';
    }
  });
};
