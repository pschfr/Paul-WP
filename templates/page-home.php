<?php
/*
	Template Name: Home Page
	Author: Paul Schaefer
*/
?>
<?php get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="header" id='header'>
                <div id='particles-cont'></div>
                <div class='wrap'>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <h3>digital artist <span class='amp'>&amp;</span> web developer</h3>
                </div>
                <a class='arrow ion-chevron-down' href='#about'></a>
            </header>
            <section class="entry-content grid container">
                <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                <?php the_content(); ?>
            </section>
        </article>
    <?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<div id='map-container'>
	<div id="contact-map"></div>
	<?php echo do_shortcode("[contact-form to='yo@pschfr.net']
		[contact-field label='Name' type='name' required='1'/]
		[contact-field label='Email' type='email' required='1'/]
		[contact-field label='Comment' type='textarea' required='1'/]
	[/contact-form]"); ?>
</div>
<?php get_footer(); ?>
