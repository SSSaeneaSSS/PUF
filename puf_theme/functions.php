<?php

wp_enqueue_style( 'styles', get_template_directory_uri() . '/css/styles.css');

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
}

wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', 'jquery', null, true);
wp_enqueue_script( 'inputmask', get_template_directory_uri() . '/js/inputmask.min.js', null, null, true);
wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', null, null, true);

?>