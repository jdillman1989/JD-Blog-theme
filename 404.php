<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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
				<h1><?php the_title(); ?></h1> 
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>

	<?php get_footer(); ?>
