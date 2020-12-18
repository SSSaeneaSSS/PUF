$(document).ready(function () {
  // верхний слайдер
  $('.main-slider').slick({
    arrows: false,
    //  dots: true,
    autoplay: true,
    autoplaySpeed: 7000,
    speed: 1000,
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

  // слайдер - галерея в карточке товара

  $('.good__gallery').slick({
    draggable: false,
    fade: true,
    speed: 1500,
    waitForAnimate: false,
    autoplay: true,
    autoplaySpeed: 5000,
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

  // скрытие оверлея на карточке товара для мобил

  if (
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(
      navigator.userAgent
    )
  ) {
    const overlay = document.querySelectorAll('.product__overlay');
    const btn = document.querySelectorAll('.product__button');
    overlay.forEach((item) => (item.style.opacity = '0.2'));
    btn.forEach((item) => (item.style.opacity = '1'));
  }

  // POPUPS

  let goodPopups = document.querySelectorAll('.good'),
    goodBtn = document.querySelectorAll('.product__button'),
    goodClose = document.querySelectorAll('.good__close-btn'),
    orderBtn = document.querySelectorAll('.good__btn'),
    requiredInputs = document.querySelectorAll('.js-req'),
    inputTel = document.querySelectorAll('input[type="tel"]');

  let im = new Inputmask('+7 (999) 999-99-99');
  im.mask(inputTel);

  const body = document.querySelector('body'),
    overlay = document.querySelector('.overlay'),
    formPopup = document.querySelector('.popup-form'),
    formGoodName = document.querySelector('.form__text-name'),
    formGoodCost = document.querySelector('.form__text-price'),
    formCloseBtn = document.querySelector('.form__close-btn'),
    orderButton = document.querySelector('.form__button'),
    callPopup = document.querySelector('.call-popup');
  callPopupCloseBtn = document.querySelector('.call-popup__close-btn');

  let animateCallPopup = setTimeout(() => {
    callPopup.classList.add('call-popup-animation');
  }, 45000);

  callPopupCloseBtn.addEventListener('click', function () {
    callPopup.classList.remove('call-popup-animation');
  });

  for (let i = 0; i < goodBtn.length; i++) {
    goodBtn[i].addEventListener('click', function () {
      overlay.style.display = 'block';
      goodPopups[i].classList.remove('display-none');
      body.style.overflow = 'hidden';
    });
  }

  for (let i = 0; i < goodClose.length; i++) {
    goodClose[i].addEventListener('click', function () {
      goodPopups[i].classList.add('display-none');
      overlay.style.display = 'none';
      body.style.overflow = 'auto';
    });
  }

  overlay.addEventListener('click', function () {
    goodPopups.forEach((item) => item.classList.add('display-none'));
    closeFormPopup();
    overlay.style.display = 'none';
    body.style.overflow = 'auto';
  });

  for (let i = 0; i < orderBtn.length; i++) {
    orderBtn[i].addEventListener('click', function () {
      clearTimeout(animateCallPopup);
      let goodName = goodPopups[i]
        .querySelector('.good__name')
        .textContent.toLowerCase();
      let goodCost = goodPopups[i].querySelector('.good__price-value')
        .textContent;

      goodPopups[i].classList.add('display-none');
      formGoodName.textContent = goodName;
      formGoodCost.textContent = goodCost;
      formPopup.classList.remove('display-none');
    });
  }

  formCloseBtn.addEventListener('click', function () {
    closeFormPopup();
    overlay.style.display = 'none';
    body.style.overflow = 'auto';
  });

  //   formPopup.addEventListener('submit', function (e) {
  //     e.preventDefault();
  //     for (let i = 0; i < requiredInputs.length; i++) {
  //       let input = requiredInputs[i];

  //       if ((input.getAttribute('type') === 'tel') & testPhoneNumber(input)) {
  //       }
  //     }
  //     openThanksPopup();
  //   });

  function closeFormPopup() {
    formPopup.classList.add('display-none');
    formGoodCost.textContent = '';
    formGoodName.textContent = '';
    requiredInputs.forEach((item) => (item.value = ''));
  }
};
