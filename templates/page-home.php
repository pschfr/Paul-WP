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
<a class='arrow bounce' href='#about'>
<svg class="icon icon-arrow-down"><use xlink:href="<?php echo get_template_directory_uri(); ?>/includes/symbol-defs.svg#icon-arrow-down"></use></svg>
</a>
</header>
<section class="entry-content grid container">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
</section>
<section class="client-work grid container">
<?php
    $clientWork = new WP_Query(array(
        'post_type'      => 'client',
        'posts_per_page' => -1
    ));
	if($clientWork->have_posts())
		echo '<h1 class="work grid__col grid__col--12-of-12">Featured work</h1>';

    while($clientWork->have_posts()) : $clientWork->the_post(); ?>
		<div class="work grid__col grid__col--5-of-8">
            <h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
        </div>
		<div class="work grid__col grid__col--3-of-8">
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
			<?php endif; ?>
		</div>
    <?php endwhile;

    wp_reset_postdata();
?>
</section>
<section class="experiments grid container">
<?php
    $clientWork = new WP_Query(array(
        'post_type'      => 'experiment',
        'posts_per_page' => -1
    ));
	if($clientWork->have_posts())
		echo '<h1 class="experiment grid__col grid__col--12-of-12">My Experiments</h1>';

    while($clientWork->have_posts()) : $clientWork->the_post(); ?>
		<div class="experiment grid__col grid__col--5-of-8">
            <h2><?php the_title(); ?></h2>
			<p><?php the_content(); ?></p>
        </div>
		<div class="experiment grid__col grid__col--3-of-8">
			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')"></div>
			<?php endif; ?>
		</div>
    <?php endwhile;

    wp_reset_postdata();
?>
</section>
</article>
<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
