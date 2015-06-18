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

	<div class="slider">
		<?php if ( function_exists( 'show_simpleresponsiveslider' ) ) show_simpleresponsiveslider(); ?>
	</div>

	<div class="content-container">
		<div class="content">
			<!--Start the Loop.-->
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>

	<?php get_footer(); ?>
