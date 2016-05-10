<?php get_header(); ?>
<section id="content" role="main">
<?php if ( have_posts() ) : ?>
<header class="header">
<div id="particle-cont"></div>
<div class="wrap">
<h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'o2dca' ), get_search_query() ); ?></h1>
</div>
</header>
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; ?>
<?php get_template_part( 'nav', 'below' ); ?>
<?php else : ?>
<article id="post-0" class="post no-results not-found">
<header class="header">
<h2 class="entry-title"><?php _e( 'Nothing Found', 'o2dca' ); ?></h2>
</header>
<section class="entry-content">
<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'o2dca' ); ?></p>
<?php get_search_form(); ?>
</section>
</article>
<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
