<?php get_header(); ?>

<body>
	<div class="container animate">

		<div class="content">
			
			<div class="post-container">

				<p>Page in development (last updated 9-4-2015)</p>

				<h2>Web</h2>

				<?php query_posts('cat=15'); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php $featuredimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

					<div class="work-thumbnail" id="<?php echo $post->post_name; ?>-thumbnail" style="background-image: url(<?php echo $featuredimage; ?>); background-size:cover;">

						<h2 id="work-title" class="animate"><?php the_title(); ?></h2> 
					</div>

					<div class="work-description" id="<?php echo $post->post_name;?>-description" style="display:none;">
						
						<div class="exit"></div>
						
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>


			<div class="post-container">

				<h2>Illustration</h2>

				<?php query_posts('cat=17'); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php $featuredimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

					<div class="work-thumbnail" id="<?php echo $post->post_name; ?>-thumbnail" style="background-image: url(<?php echo $featuredimage; ?>); background-size:cover;">

						<h2 id="work-title" class="animate"><?php the_title(); ?></h2> 
					</div>

					<div class="work-description" id="<?php echo $post->post_name;?>-description" style="display:none;">
						
						<div class="exit"></div>
						
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>


			<div class="post-container">

				<h2>Design</h2>

				<?php query_posts('cat=16'); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php $featuredimage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

					<div class="work-thumbnail" id="<?php echo $post->post_name; ?>-thumbnail" style="background-image: url(<?php echo $featuredimage; ?>); background-size:cover;">

						<h2 id="work-title" class="animate"><?php the_title(); ?></h2> 
					</div>

					<div class="work-description" id="<?php echo $post->post_name;?>-description" style="display:none;">
						
						<div class="exit animate"></div>
						
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>

			<img class="full-size-work" src="/wp-content/uploads/2015/09/ptf-holland.jpg">
		</div>

		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>

		<div class="description-container animate"></div>
	</div>
</body>

<?php get_footer(); ?>