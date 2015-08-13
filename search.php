<?php get_header(); ?>

<body>
	<div class="container animate">

		<div class="content">

			<div class="post-container">
				<h1>Pages and posts that contain "<?php the_search_query(); ?>":</h1>
			</div>

			<?php
			// set the "paged" parameter (use 'page' if the query is on a static front page)
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			// the query
			$the_query = new WP_Query( '&paged=' . $paged ); 
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

			<p style="float:right;"><?php next_posts_link( 'Next &raquo;', $the_query->max_num_pages );?></p>
			<p style="float:left;"><?php previous_posts_link( '&laquo; Previous' ); ?></p>
		</div>

		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>
	</div>
</body>

<?php get_footer(); ?>