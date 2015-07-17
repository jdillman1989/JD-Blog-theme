<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>

<body>
	<div class="container animate">

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
					<h2><?php the_title(); ?></h2> 

					<div class="meta">

						<p class="date"><em><?php the_date(); ?></em>  |  </p>
						
						<?php the_category(); ?>
					</div>

					<?php the_content(); ?>
				</div>

			<?php endwhile; ?>
			<p style="float:right;"><?php next_posts_link( 'Previous &raquo;', $the_query->max_num_pages );?></p>
			<p style="float:left;"><?php previous_posts_link( '&laquo; Next' ); ?></p>
		</div>

		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>
	</div>
</body>

<?php get_footer(); ?>