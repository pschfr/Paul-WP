<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-194x194.png" sizes="194x194">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons/manifest.json">
<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/favicons/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon.ico">
<meta name="msapplication-TileColor" content="#000000">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicons/mstile-144x144.png">
<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/favicons/browserconfig.xml">
<meta name='theme-color' content='#111'>
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="description" content="Paul Schaefer is a digital artist and web developer living in Pittsburgh, PA.">
<meta property="og:url" content="<?php echo site_url(); ?>/">
<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">
<meta property="og:title" content="<?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>">
<meta property="og:description" content="Paul Schaefer is a digital artist and web developer living in Pittsburgh, PA.">
<meta name="twitter:card" content="photo">
<meta name="twitter:site" content="@pschfr">
<meta name="twitter:creator" content="@pschfr">
<meta name="twitter:title" content="<?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>">
<meta name="twitter:description" content="Paul Schaefer is a digital artist and web developer living in Pittsburgh, PA.">
<meta name="twitter:image:src" content="<?php echo get_template_directory_uri(); ?>/screenshot.png">
<meta name="twitter:domain" content="<?php echo site_url(); ?>/">
<title><?php bloginfo('name'); ?>, <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="icon-home" viewBox="0 0 128 128">
<title>home</title>
<path class="path1" d="M128 73.805l-64-49.678-64 49.678v-20.255l64-49.678 64 49.678zM112 72v48h-32v-32h-32v32h-32v-48l48-36z"></path>
</symbol>
<symbol id="icon-arrow-up" viewBox="0 0 128 128">
<title>arrow-up</title>
<path class="path1" d="M109.657 50.343l-40-40c-3.124-3.124-8.189-3.124-11.313 0l-40 40c-3.124 3.124-3.124 8.19 0 11.314s8.19 3.124 11.314 0l26.343-26.343v76.686c0 4.418 3.582 8 8 8s8-3.582 8-8v-76.686l26.343 26.343c1.562 1.562 3.609 2.343 5.657 2.343s4.095-0.781 5.657-2.343c3.124-3.124 3.124-8.189 0-11.313z"></path>
</symbol>
<symbol id="icon-arrow-right" viewBox="0 0 128 128">
<title>arrow-right</title>
<path class="path1" d="M77.657 109.657l40-40c3.124-3.124 3.124-8.19 0-11.314l-40-40c-3.124-3.124-8.189-3.124-11.314 0s-3.124 8.19 0 11.314l26.343 26.343h-76.686c-4.418 0-8 3.582-8 8s3.582 8 8 8h76.686l-26.343 26.343c-1.562 1.562-2.343 3.609-2.343 5.657s0.781 4.095 2.343 5.657c3.124 3.124 8.189 3.124 11.314 0z"></path>
</symbol>
<symbol id="icon-arrow-down" viewBox="0 0 128 128">
<title>arrow-down</title>
<path class="path1" d="M109.657 77.657l-40 40c-3.124 3.124-8.189 3.124-11.313 0l-40-40c-3.124-3.124-3.124-8.189 0-11.314s8.19-3.124 11.314 0l26.343 26.343v-76.686c0-4.418 3.582-8 8-8s8 3.582 8 8v76.686l26.343-26.343c1.562-1.562 3.609-2.343 5.657-2.343s4.095 0.781 5.657 2.343c3.124 3.124 3.124 8.189 0 11.314z"></path>
</symbol>
<symbol id="icon-arrow-left" viewBox="0 0 128 128">
<title>arrow-left</title>
<path class="path1" d="M50.343 109.657l-40-40c-3.124-3.124-3.124-8.19 0-11.314l40-40c3.124-3.124 8.19-3.124 11.314 0s3.124 8.19 0 11.314l-26.343 26.343h76.686c4.418 0 8 3.582 8 8s-3.582 8-8 8h-76.686l26.343 26.343c1.562 1.562 2.343 3.609 2.343 5.657s-0.781 4.095-2.343 5.657c-3.124 3.124-8.19 3.124-11.314 0z"></path>
</symbol>
<symbol id="icon-mail" viewBox="0 0 128 128">
<title>mail</title>
<path class="path1" d="M106.664 0h-85.328c-11.735 0-21.336 9.598-21.336 21.332v85.332c0 11.734 9.601 21.336 21.336 21.336h85.328c11.742 0 21.336-9.601 21.336-21.336v-85.332c0-11.734-9.594-21.332-21.336-21.332zM32 32h64c1.142 0 2.251 0.245 3.268 0.708l-35.268 41.146-35.268-41.146c1.017-0.462 2.126-0.707 3.268-0.707zM24 88v-48c0-0.167 0.007-0.334 0.017-0.5l23.458 27.368-23.2 23.2c-0.18-0.667-0.276-1.361-0.276-2.067zM96 96h-64c-0.707 0-1.4-0.095-2.067-0.276l22.765-22.765 11.303 13.187 11.303-13.187 22.764 22.765c-0.668 0.18-1.361 0.275-2.067 0.275zM104 88c0 0.707-0.095 1.4-0.276 2.067l-23.2-23.2 23.458-27.368c0.010 0.166 0.017 0.333 0.017 0.5v48z"></path>
</symbol>
<symbol id="icon-facebook" viewBox="0 0 128 128">
<title>facebook</title>
<path class="path1" d="M116 0h-104c-6.6 0-12 5.4-12 12v104c0 6.6 5.4 12 12 12h52v-56h-16v-16h16v-8c0-13.225 10.775-24 24-24h16v16h-16c-4.4 0-8 3.6-8 8v8h24l-4 16h-20v56h36c6.6 0 12-5.4 12-12v-104c0-6.6-5.4-12-12-12z"></path>
</symbol>
<symbol id="icon-twitter" viewBox="0 0 128 128">
<title>twitter</title>
<path class="path1" d="M128 28.3c-4.7 2.1-9.775 3.5-15.075 4.125 5.425-3.25 9.575-8.4 11.55-14.525-5.075 3-10.7 5.2-16.675 6.375-4.8-5.1-11.625-8.275-19.175-8.275-14.5 0-26.25 11.75-26.25 26.25 0 2.050 0.225 4.050 0.675 5.975-21.825-1.1-41.175-11.55-54.125-27.45-2.25 3.875-3.55 8.4-3.55 13.2 0 9.1 4.625 17.15 11.675 21.85-4.3-0.125-8.35-1.325-11.9-3.275 0 0.1 0 0.225 0 0.325 0 12.725 9.050 23.35 21.075 25.75-2.2 0.6-4.525 0.925-6.925 0.925-1.7 0-3.325-0.175-4.95-0.475 3.35 10.425 13.050 18.025 24.525 18.25-9 7.050-20.3 11.25-32.625 11.25-2.125 0-4.2-0.125-6.275-0.375 11.65 7.475 25.45 11.8 40.275 11.8 48.3 0 74.725-40.025 74.725-74.725 0-1.15-0.025-2.275-0.075-3.4 5.125-3.675 9.575-8.3 13.1-13.575z"></path>
</symbol>
</defs>
</svg>
