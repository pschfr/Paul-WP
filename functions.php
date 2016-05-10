<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts() {
	wp_deregister_script('jquery');   // Allows me to use more recent version
	wp_deregister_script('wp-embed'); // Not necessary here either
	wp_enqueue_script('particleground', get_template_directory_uri() . '/includes/particleground.min.retina.js', '', '', true);
	wp_enqueue_script('webfonts',   '//cdnjs.cloudflare.com/ajax/libs/webfont/1.6.22/webfontloader.js', '', '', true);
	wp_register_script('jquery',   ('//cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js'), false, '', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/includes/main.js', array('jquery'), '', true );
	if(is_page(9)) { // Loads in map and contact form scripts on contact page only
		wp_enqueue_script('contact', get_template_directory_uri() . '/includes/contact-scripts.js', '', '', true);
		wp_enqueue_script('google-maps', '//maps.googleapis.com/maps/api/js?callback=initMap', array('jquery', 'contact'), '', true);
		wpcf7_enqueue_scripts();
		wpcf7_enqueue_styles();
		wp_enqueue_style('contact',  get_template_directory_uri() . '/includes/contact-styles.css');
	}
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 11);
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
		'before_title'  => '<h2 style="display:none;">',
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

// Register Custom Post Type for my client work
function clients_post_type() {
	$labels = array(
		'name'                  => 'Client Work',
		'singular_name'         => 'Client Work',
		'menu_name'             => 'Client Work',
		'name_admin_bar'        => 'Client Work',
		'archives'              => 'Client Work Archives',
		'parent_item_colon'     => 'Parent Client Works:',
		'all_items'             => 'All Client Work',
		'add_new_item'          => 'Add New Client Work',
		'add_new'               => 'Add New',
		'new_item'              => 'New Client Work',
		'edit_item'             => 'Edit Client Work',
		'update_item'           => 'Update Client Work',
		'view_item'             => 'View Client Work',
		'search_items'          => 'Search Client Work',
		'not_found'             => 'No client work found',
		'not_found_in_trash'    => 'No client work found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Client Work',
		'uploaded_to_this_item' => 'Uploaded to this Client Work',
		'items_list'            => 'Client Work list',
		'items_list_navigation' => 'Client Work list navigation',
		'filter_items_list'     => 'Filter Client Work list',
	);
	$args = array(
		'label'                 => 'client',
		'description'           => 'Featured client work to be displayed on home page',
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats'),
		'taxonomies'            => array('category'),
		'public'                => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-businessman',
		'capability_type'       => 'page',
	);
	register_post_type('client', $args);
}
add_action('init', 'clients_post_type', 0);

// Register Custom Post Type for my experiments
function experiments_post_type() {
	$labels = array(
		'name'                  => 'Experiments',
		'singular_name'         => 'Experiment',
		'menu_name'             => 'Experiments',
		'name_admin_bar'        => 'Experiment',
		'archives'              => 'Experiment Archives',
		'parent_item_colon'     => 'Parent Experiment:',
		'all_items'             => 'All Experiments',
		'add_new_item'          => 'Add New Experiment',
		'add_new'               => 'Add New',
		'new_item'              => 'New Experiment',
		'edit_item'             => 'Edit Experiment',
		'update_item'           => 'Update Experiment',
		'view_item'             => 'View Experiment',
		'search_items'          => 'Search Experiments',
		'not_found'             => 'No experiments found',
		'not_found_in_trash'    => 'No experiments found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Experiment',
		'uploaded_to_this_item' => 'Uploaded to this Experiment',
		'items_list'            => 'Experiment list',
		'items_list_navigation' => 'Experiment list navigation',
		'filter_items_list'     => 'Filter Experiment list',
	);
	$args = array(
		'label'                 => 'experiment',
		'description'           => 'Featured experiments to be displayed on home page',
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats'),
		'taxonomies'            => array('category'),
		'public'                => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-chart-line',
		'capability_type'       => 'page',
	);
	register_post_type('experiment', $args);
}
add_action('init', 'experiments_post_type', 0);

// It is pretty dumb that I have to add this manually
add_theme_support('post-thumbnails');

// Adds custom post types to Right Now widget in admin
function vm_right_now_content_table_end() {
    $args = array(
        'public' => true ,
        '_builtin' => false
    );
    $output = 'object';
    $operator = 'and';
    $post_types = get_post_types( $args , $output , $operator );
    foreach( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->name, $post_type->labels->name , intval( $num_posts->publish ) );
        if ( current_user_can( 'edit_posts' ) ) {
            $cpt_name = $post_type->name;
        }
        echo '<li class="post-count"><tr><a href="edit.php?post_type='.$cpt_name.'"><td class="first b b-' . $post_type->name . '"></td>' . $num . '&nbsp;<td class="t ' . $post_type->name . '">' . $text . '</td></a></tr></li>';
    }
    $taxonomies = get_taxonomies( $args , $output , $operator );
    foreach( $taxonomies as $taxonomy ) {
        $num_terms  = wp_count_terms( $taxonomy->name );
        $num = number_format_i18n( $num_terms );
        $text = _n( $taxonomy->labels->name, $taxonomy->labels->name , intval( $num_terms ));
        if ( current_user_can( 'manage_categories' ) ) {
            $cpt_tax = $taxonomy->name;
        }
        echo '<li class="post-count"><tr><a href="edit-tags.php?taxonomy='.$cpt_tax.'"><td class="first b b-' . $taxonomy->name . '"></td>' . $num . '&nbsp;<td class="t ' . $taxonomy->name . '">' . $text . '</td></a></tr></li>';
    }
}
add_action( 'dashboard_glance_items' , 'vm_right_now_content_table_end' );

// Custom WordPress Admin Footer
add_filter('admin_footer_text', 'remove_footer_admin');
function remove_footer_admin () { echo 'Don\'t forget to purge the cache, dumbass.'; }

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
