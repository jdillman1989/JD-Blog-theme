<?php
/**
 * The template for displaying all single posts and attachments
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
					<h2><?php the_title(); ?></h2> 

					<p class="date"><em><?php the_date(); ?></em></p>
					
					<div class="categories">
						<?php the_category(); ?>
					</div>

					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		</div>

		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>
	</div>
</body>

<?php get_footer(); ?>
