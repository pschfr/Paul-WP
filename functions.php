<?php
add_action('wp_enqueue_scripts', 'my_scripts');
function my_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"), false, '', true);
	wp_enqueue_script('particles', '//cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js', '', '', true);
	wp_enqueue_script('gitQuery', get_template_directory_uri() . '/js/gitQuery.js', array('jquery'), '', true);
	wp_enqueue_script('jribbble', get_template_directory_uri() . '/js/jribbble.min.js', array('jquery'), '', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script('google-maps', '//maps.googleapis.com/maps/api/js?callback=initMap', array('jquery', 'main'), '', true);
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11 );
function theme_enqueue_styles() {
	wp_enqueue_style('normalize', '//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css');
	wp_enqueue_style('toast',     '//cdnjs.cloudflare.com/ajax/libs/toast-css/1.1.0/grid.min.css');
	wp_enqueue_style('ionicons',  '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
	wp_enqueue_style('animations', get_template_directory_uri().'/css/animations.css' );
	wp_enqueue_style('main', get_template_directory_uri().'/style.css' );
}

add_action('widgets_init', 'my_widgets_init');
function my_widgets_init() {
	register_sidebar(array(
		'name' => 'Widget Area 1',
		'id' => 'widget_area_1',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	));
}

// Added to disable srcset attributes on images, it makes them blurry on large displays in 4.4+
add_filter('wp_get_attachment_image_attributes', function($attr) {
	if (isset($attr['sizes']))
		unset($attr['sizes']);
	if (isset($attr['srcset']))
		unset($attr['srcset']);
	return $attr;
}, PHP_INT_MAX);
add_filter('wp_calculate_image_sizes', '__return_false', PHP_INT_MAX);
add_filter('wp_calculate_image_srcset', '__return_false', PHP_INT_MAX);
remove_filter('the_content', 'wp_make_content_images_responsive');

// Disable emoji crap
function disable_wp_emojicons() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
function disable_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

// Disable edit this link on pages when logged in
add_filter('edit_post_link', 'wpse_remove_edit_post_link');
function wpse_remove_edit_post_link($link) { return ''; }
