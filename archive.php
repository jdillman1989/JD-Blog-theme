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

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="post-container">

					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2> 
						<p class="date"><em><?php the_date(); ?></em> | </p>
					</a>

					<?php the_category(); ?>

					<p><?php the_excerpt(); ?></p>
				</div>
			<?php endwhile; ?>
		</div>

		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>
	</div>
</body>

<?php get_footer(); ?>