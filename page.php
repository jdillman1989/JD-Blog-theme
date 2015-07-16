<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>

<body>
	<div style="overflow:hidden;">
		<div class="container animate">

			<div class="content">

				<?php while ( have_posts() ) : the_post(); ?>
					<div class="post-container">
						<h2><?php the_title(); ?></h2> 
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			</div>

			<div class="aside animate">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</body>

<?php get_footer(); ?>
