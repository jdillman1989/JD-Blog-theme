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

<body>
	<div class="container animate">

		<div class="content">

			<div class="post-container">
				<h1>Posts for category: <?php single_cat_title(); ?></h1>
			</div>

			<?php
			// set the "paged" parameter (use 'page' if the query is on a static front page)
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			// the query
			query_posts('posts_per_page='.get_option('posts_per_page').'&paged=' . $paged);
			?>

			<?php while ( have_posts() ) : the_post(); ?>
			<div class="post-container">
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

				<div class="meta">

					<p class="date"><em><?php the_date(); ?></em> | </p>
					
					<?php the_category(); ?>
				</div>

				<?php the_excerpt(); ?>
			</div>
			<?php endwhile; ?>

			<div class="post-container">
				<p class="previous paged animate"><?php next_posts_link( 'Previous &raquo;', $wp_query->max_num_pages );?></p>
				<p class="next paged animate"><?php previous_posts_link( '&laquo; Next' ); ?></p>
			</div>
		</div>

		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>
	</div>
</body>

<?php get_footer(); ?>