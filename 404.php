<?php get_header(); ?>
<section id="content" role="main">
<article id="post-0" class="post not-found">
<header class="header">
<div id='particles-cont'></div>
<div class="wrap">
<h1 class="entry-title"><?php _e( 'Not Found', 'o2dca' ); ?></h1>
</div>
</header>
<section class="entry-content grid container">
<p class="grid__col grid__col--12-of-12"><?php _e( 'Nothing found for the requested page. Try a search instead?', 'o2dca' ); ?></p>
<div class="grid__col grid__col--12-of-12"><?php get_search_form(); ?></div>
</section>
</article>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
