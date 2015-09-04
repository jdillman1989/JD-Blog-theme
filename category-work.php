<?php get_header(); ?>

<body>
	<div class="container animate">

		<div class="content">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="post-container">
					<h2><?php the_title(); ?></h2> 

					<div class="meta">

						<p class="date"><em><?php the_date(); ?></em> | </p>
						
						<?php the_category(); ?>
					</div>

					<?php the_content(); ?>
				</div>

			<?php endwhile; ?>
			
			<div class="full-size-work"></div>
		</div>

		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>

		<div class="description"></div>
	</div>
</body>

<?php get_footer(); ?>