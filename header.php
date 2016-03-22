<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name='theme-color' content='#212121' />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="description" content="Paul Schaefer is a web designer and developer living in Pittsburgh, PA." />
<meta property="og:url" content="<?php echo site_url(); ?>/" />
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
<meta property="og:title" content="<?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>" />
<meta property="og:description" content="Paul Schaefer is a web designer and developer living in Pittsburgh, PA." />
<title><?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
