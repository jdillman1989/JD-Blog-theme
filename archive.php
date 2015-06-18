<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
			<?php
			// set the "paged" parameter (use 'page' if the query is on a static front page)
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			// the query
			$the_query = new WP_Query( '&paged=' . $paged ); 
			?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="post-container">
					<h1><?php the_title(); ?></h1> 
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			<p style="float:right;"><?php next_posts_link( 'Previous &raquo;', $the_query->max_num_pages );?></p>
			<p style="float:left;"><?php previous_posts_link( '&laquo; Next' ); ?></p>

		</div>
		<?php get_sidebar(); ?>
	</div>

	<?php get_footer(); ?>

