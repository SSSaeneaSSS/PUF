<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ПУФ - мебель ручной работы</title>

	<?php wp_head(); ?>
</head>

<body class="main-page">

	<header class="header" id="main">
		<div class="container">
      <div class="header-flex">
        <div class="logo header__logo">
          <span class="logo__text">Пуф<br>СПБ</span>
        </div>

        <a class="header__phone-number" href="tel:<?php the_field('phone_number_2', 2) ?>"><?php the_field('phone_number', 2) ?></a>

        <nav class="header__navigation">
          <ul class="navigation">
            <li class="navigation__item"><a href="#about" class="navigation__link">
					<?php the_field('item_1', 2) ?>
				</a></li>

            <li class="navigation__item"><a href="#models" class="navigation__link">
					<?php the_field('item_2', 2) ?>
				</a></li>

				<li class="navigation__item"><a href="#reviews" class="navigation__link">
					<?php the_field('item_3', 2) ?>
				</a></li>
				
				<li class="navigation__item"><a href="#payment" class="navigation__link">
					<?php the_field('item_4', 2) ?>
				</a></li>

            <li class="navigation__item"><a href="#delivery" class="navigation__link">
					<?php the_field('item_5', 2) ?>
				</a></li>

            <li class="navigation__item"><a href="#contacts" class="navigation__link">
					<?php the_field('item_6', 2) ?>
				</a></li>

          </ul>
        </nav>
		
		  </div>
		  
		</div>
		<div class="js-navigation-toggle">
			  <div class="navigation-toggle"></div>
		</div>
	</header>

	<main class="main-content">
		<div class="container">
			<ul class="main-slider">
				<?php

						$myposts = get_posts([ 
							'category_name'    => 'main_slider',
							'nopaging' => 1
						]);

						if( $myposts ){
							foreach( $myposts as $post ){
								setup_postdata( $post );
								?>
								<li class="main-slider__item">
									<img class='main-slider__image' src="<?php the_field('slider_image') ?>" alt="Элемент слайдера">
								</li>
								<?php 
							}
						} else {
							// Постов не найдено
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
			</ul>

			

			<section class="advantages" id="about">
				<h2 class="visually-hidden">
					Преимущества
				</h2>
				<ul class="advantages__list">
					<li class="advantages__item advantage">
						<h3 class='advantage__title'>
							<?php the_field('first_name', 2); ?>
						</h3>

						<p class='advantage__text'>
							<?php the_field('first_text', 2); ?>
						</p>
					</li>

					<li class="advantages__item advantage">
						<h3 class='advantage__title'>
							<?php the_field('second_name', 2); ?>
						</h3>

						<p class='advantage__text'>
							<?php the_field('second_text', 2); ?>
						</p>
					</li>

					<li class="advantages__item advantage">
						<h3 class='advantage__title'>
							<?php the_field('third_name', 2); ?>
						</h3>

						<p class='advantage__text'>
							<?php the_field('third_text', 2); ?>
						</p>
					</li>
				</ul>
			</section>

			<section class="goods" id="models">
				<div class="title-wrapper">
					<h2 class="goods__title">
						<?php the_field('goods_title', 2) ?>
					</h2>
				</div>

				

				<ul class="catalog">
					
					<?php
						$myposts = get_posts([ 
							'nopaging' => 1,
							'category_name'    => 'good_item'
						]);

						if( $myposts ){
							foreach( $myposts as $post ){
								setup_postdata( $post );
								?>
								<li class="catalog__item product">
									<img src="<?php the_field('good_image')?>" alt="фото товара" class="product__image">

									<h3 class="product__name">
										<?php the_title() ?>
									</h3>

									<button class="product__button"><?php the_field('goods_item_btn', 2) ?></button>

									<div class="product__overlay"></div>
								</li>
								<?php 
							}
						} else {
							// Постов не найдено
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
				</ul>
			</section>
		</div>

			<section class="feedback" id="reviews">
				<div class="container">
					<div class="title-wrapper">
						<h2 class="feedback__title">
							<?php the_field('feedback_title', 2) ?>
						</h2>
					</div>

					<ul class="reviews">
						<?php

						$myposts = get_posts([ 
							'category_name'    => 'feedback',
							'nopaging' => 1
						]);

						if( $myposts ){
							foreach( $myposts as $post ){
								setup_postdata( $post );
								?>
								<li class='reviews__item'>
									<img class='reviews__image' src="<?php the_field('feedback_image') ?>" alt="отзыв">
								</li>
								<?php 
							}
						} else {
							// Постов не найдено
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
					</ul>
				</div>
			</section>

		<div class="container">
			<section class="information">
				<h2 class="visually-hidden">
					Оплата и доставка
				</h2>

				<div class="payment" id="payment">
					<h3 class="payment__title">
						<?php the_field('payment_title', 2); ?>
					</h3>
					<ul class="payment__list">
						<?php

						$myposts = get_posts([ 
							'category_name'    => 'payment_items',
							'nopaging' => 1
						]);

						if( $myposts ){
							foreach( $myposts as $post ){
								setup_postdata( $post );
								?>
								<li class="payment__item"><?php the_field('payment_item'); ?></li>
								<?php 
							}
						} else {
							// Постов не найдено
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
						
					</ul>
				</div>

				<div class="delivery" id="delivery">
					<h3 class="delivery__title">
						<?php the_field('delivery_title', 2); ?>
					</h3>
					<ul class="delivery__list">
						<?php

						$myposts = get_posts([ 
							'category_name'    => 'delivery_items',
							'nopaging' => 1
						]);

						if( $myposts ){
							foreach( $myposts as $post ){
								setup_postdata( $post );
								?>
								<li class="delivery__item"><?php the_field('delivery_item'); ?></li>
								<?php 
							}
						} else {
							// Постов не найдено
						}

						wp_reset_postdata(); // Сбрасываем $post
						?>
						
					</ul>
				</div>
			</section>
		</div>
		</div>
	</main>

	<footer class="footer">
		<div class="container">
			<div class="footer-flex-wrapper">
				<div class="logo footer__logo">
					<a class="logo__text" href='#main'>Пуф<br>СПБ</a>
				</div>

				<div class="footer__contacts contacts">
					<a class="contacts__phone-number" id="contacts" href="tel:<?php the_field('phone_number_2', 2) ?>"><?php the_field('phone_number', 2) ?></a>

					<ul class="contacts__socials socials">
						<li class="socials__item">
							<a href="<?php the_field('instagram', 2) ?>" class="socials__link" aria-label="Переход в instagram" target="_blank">
								<picture><source srcset="<?php echo get_template_directory_uri();?>/img/instagram.svg" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/instagram.svg" alt="Instagram"></picture>
							</a>
						</li>

						<li class="socials__item">
							<a href="<?php the_field('whatsapp', 2) ?>" class="socials__link" aria-label="Переход в whatsapp" target="_blank">
								<picture><source srcset="<?php echo get_template_directory_uri();?>/img/whatsapp.svg" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/whatsapp.svg" alt="whatsapp"></picture>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

	<?php
		$myposts = get_posts([ 
			'category_name'    => 'good',
			'nopaging' => 1
		]);

		if( $myposts ){
			foreach( $myposts as $post ){
				setup_postdata( $post );
				?>
				<div class="good display-none">
					<ul class="good__gallery">
						<li><img src="<?php the_field('photo1') ?>" alt="Фото товара"></li>
						<li><img src="<?php the_field('photo2') ?>" alt="Фото товара"></li>
						<li><img src="<?php the_field('photo3') ?>" alt="Фото товара"></li>
					</ul>

	<div class="flex-wrapper">
		<h3 class="good__name"><?php the_title() ?></h3>

		<p class="good__text"><?php the_field('good_description') ?></p>

		<h4 class="good__specs"><? the_field('good_specs_title') ?></h4>

		<ul class="good__specs-list">
			<li class="good__specs-item">
				<?php the_field('good_spec1') ?>
			</li>
			<li class="good__specs-item">
				<?php the_field('good_spec2') ?>
			</li>
			<li class="good__specs-item">
				<?php the_field('good_spec3') ?>
			</li>
			<li class="good__specs-item">
				<?php the_field('good_spec4') ?>
			</li>
			<li class="good__specs-item">
				<?php the_field('good_spec5') ?>
			</li>
		</ul>
	
		<div class="flex-wrap">
			<span class="good__price"><span class="good__price-value"><?php the_field('good_price')?></span> <?php the_field('good_price_currency') ?></span>
			<button class="good__btn button"><?php the_field('good_button', 2) ?></button>	
		</div>

		<button class="good__close-btn close-btn" aria-label="Кнопка закрытия"></button>
	</div>
</div>
	<?php 
		}
	} else {
		// Постов не найдено
	}

	wp_reset_postdata(); // Сбрасываем $post
	?>

	
	<div class="overlay"></div>

	<div class="popup-form form display-none">
		<h2 class="form__name">Заказ</h2>

		<p class="form__text">
			Вы выбрали <span class="form__text-name"></span> стоимостью <span class="form__text-price"></span> рублей. Пожалуйста, оставьте свои данные, чтобы мы могли связаться с вами и подобрать для вас подходящие материалы и оттенок.
		</p>

		<div class="form__form" action="#" method="POST">

		<?php echo do_shortcode('[contact-form-7 id="228" title="main-form"]') ?>
			<!-- <span class="form__user-label">Ваше имя:</span>

			<input class="form__user-name js-req" type="text" required="required">

			<span class="form__user-label">Номер вашего телефона:</span>

			<input class="form__user-phone js-req" type="tel" required="required">

			<textarea class="form__user-text" placeholder="Если у вас есть какие-либо вопросы или комментарии, напишите их здесь."></textarea>

			<input type="submit" class="form__button button" value="<?php the_field('form_btn', 2) ?>"> -->
		</div>

		<button class="form__close-btn close-btn"></button>
	</div>

	

	<!-- <div class="thanks-popup display-none">
		<h2 class="thanks-popup__name">
			Спасибо за ваш заказ, <span class="thanks-popup__user-name"></span>
		</h2>

		<p class="thanks-popup__text">
			В ближайшее время мы с вами свяжемся.
		</br>
		</br>
			Пока вы ждете, посетите наш инстаграм:
		</p>

		<div class="thanks-popup__inst socials__item">
			<a href="<?php the_field('instagram', 2) ?>" class="socials__link" aria-label="Переход в instagram" target="_blank">
				<picture><source srcset="<?php echo get_template_directory_uri();?>/img/instagram.svg" type="image/webp"><img src="<?php echo get_template_directory_uri();?>/img/instagram.svg" alt="Instagram"></picture>
			</a>
		</div>

		<button class="thanks-popup__close-btn close-btn"></button>
	</div> -->

	<div class="call-popup">
		<h2 class="call-popup__name">
			Никак не определитесь с выбором?
		</h2>

		<p class="call-popup__text">
			Закажите бесплатный обратный звонок и мы позвоним вам и вместе с вами подберем подходящую к вашему интерьеру модель.
		</p>

		<div class="call-popup__form">

		<?php echo do_shortcode('[contact-form-7 id="223" title="call-form"]') ?>
<!-- 
			<span class="call-popup__user-label">Ваше имя:</span>

			<input class="call-popup__user-name" type="text" name="user-name" required="required">
			
			<span class="call-popup__user-label">Номер вашего телефона:</span>

			<input class="call-popup__user-phone" type="tel" name="user-phone" required="required">

			<input type="submit" class="call-popup__button button" value="<?php the_field('call_popup_btn', 2) ?>"> -->
		</div>

		<button class="call-popup__close-btn close-btn"></button>


	</div>

	<?php wp_footer(); ?>
	
</body>

</html>