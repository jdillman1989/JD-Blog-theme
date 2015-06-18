<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>

<body>
	<div class="container">

		<div class="aside">
			<?php get_sidebar(); ?>
		</div>

		<div class="content">

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="post-container">
					<h2><?php the_title(); ?></h2> 
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</body>

<?php get_footer(); ?>
