<?php get_header(); ?>

<body>
	<div class="container animate">

		<div class="content">

			<div class="post-container">
				<h1>Pages and posts that contain "<?php the_search_query(); ?>":</h1>
			</div>

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
				<p class="previous paged animate"><?php next_posts_link( 'Previous &raquo;', $the_query->max_num_pages );?></p>
				<p class="next paged animate"><?php previous_posts_link( '&laquo; Next' ); ?></p>
			</div>
		</div>

		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>
	</div>
</body>

<?php get_footer(); ?>