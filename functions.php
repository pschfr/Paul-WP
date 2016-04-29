<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts() {
	wp_deregister_script('jquery');
	wp_deregister_script('wp-embed');
	wp_enqueue_script('particles',  '//cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js', '', '',  true);
	wp_enqueue_script('webfonts',   '//cdnjs.cloudflare.com/ajax/libs/webfont/1.6.22/webfontloader.js', '', '', true);
	wp_register_script('jquery',   ('//cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js'), false, '', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/includes/main.js', array('jquery'), '', true );
	if( is_page(9) ) { // Loads in map and contact form scripts on contact page only
		wp_enqueue_script('google-maps', '//maps.googleapis.com/maps/api/js?callback=initMap', array('jquery', 'main'), '', true);
		wpcf7_enqueue_scripts();
		wpcf7_enqueue_styles();
	}
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11 );
function theme_enqueue_styles() {
	wp_enqueue_style('normalize', '//cdnjs.cloudflare.com/ajax/libs/normalize/4.0.0/normalize.min.css');
	wp_enqueue_style('toast',     '//cdnjs.cloudflare.com/ajax/libs/toast-css/1.1.0/grid.min.css');
	wp_enqueue_style('main', get_template_directory_uri().'/style.css' );
}

// Adds widget area
add_action('widgets_init', 'theme_widgets_init');
function theme_widgets_init() {
	register_sidebar(array(
		'name' => 'Widget Area 1',
		'id'   => 'widget_area_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}

// Adds menu area
add_action('init', 'theme_menus_init');
function theme_menus_init() {
	register_nav_menu('footer_menu', __('Footer Menu'));
}

// Disables loading CF7 files if not on contact page
add_filter('wpcf7_load_css', '__return_false');
add_filter('wpcf7_load_js',  '__return_false');

// Custom ajax loader for CF7, has to be GIF
add_filter('wpcf7_ajax_loader', 'my_wpcf7_ajax_loader');
function my_wpcf7_ajax_loader () {
	return  get_bloginfo('template_directory') . '/includes/bert.gif';
}

// Disables WP-JSON, Windows Live Writer, other shit
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Disable srcset attributes on images, it makes them blurry on large displays in 4.4+
add_filter('wp_get_attachment_image_attributes', function($attr) {
	if (isset($attr['sizes']))
		unset($attr['sizes']);
	if (isset($attr['srcset']))
		unset($attr['srcset']);
	return $attr;
}, PHP_INT_MAX);
add_filter('wp_calculate_image_sizes',  '__return_false', PHP_INT_MAX);
add_filter('wp_calculate_image_srcset', '__return_false', PHP_INT_MAX);
remove_filter('the_content', 'wp_make_content_images_responsive');

// Disable emoji crap
add_action('init', 'disable_wp_emojicons');
function disable_wp_emojicons() {
	remove_action('admin_print_styles',  'print_emoji_styles');
	remove_action('wp_head',             'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles',     'print_emoji_styles');
	remove_filter('wp_mail',             'wp_staticize_emoji_for_email');
	remove_filter('the_content_feed',    'wp_staticize_emoji');
	remove_filter('comment_text_rss',    'wp_staticize_emoji');
	add_filter('tiny_mce_plugins',       'disable_emojicons_tinymce');
}
function disable_emojicons_tinymce($plugins) {
	if (is_array($plugins)) { return array_diff($plugins, array('wpemoji')); }
	else                    { return array(); }
}

// Disable edit this link on pages when logged in
add_filter('edit_post_link', 'wpse_remove_edit_post_link');
function wpse_remove_edit_post_link($link) { return ''; }

// Removes 'text/css' from enqued stylesheets
add_filter('style_loader_tag', 'html5_style_remove');
function html5_style_remove($tag) { return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag); }

// Logs DB Queries, Time Spent, and Memory Consumption
add_action( 'wp_footer', 'performance', 20 );
function performance($visible = false) {
    $stat = sprintf('%d queries in %.3f seconds, using %.2fMB memory',
        get_num_queries(),
        timer_stop(0, 3),
        memory_get_peak_usage() / 1024 / 1024
    );
    echo $visible ? $stat : "<!--{$stat}\r\nSee something broken or have an idea? https://github.com/pschfr/paul-wp/ -->\r\n";
}

// Custom WordPress Admin Footer
add_filter('admin_footer_text', 'remove_footer_admin');
function remove_footer_admin () { echo 'Don\'t forget to purge the cache, dumbass.'; }
