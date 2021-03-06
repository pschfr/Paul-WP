<?php get_header(); ?>
<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header" id="header">
<div id='particles-cont'></div>
<div class="wrap">
<h1 class="entry-title"><?php the_title(); ?></h1>
</div>
<a href="<?php echo site_url(); ?>" class="home"><svg class="icon icon-home"><use xlink:href="<?php echo get_template_directory_uri(); ?>/includes/symbol-defs.svg#icon-home"></use></svg> Home</a>
</header>
<section class="entry-content grid container">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
