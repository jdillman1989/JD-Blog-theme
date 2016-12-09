<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 */
?>
<?php get_header(); ?>

<body>
	<div class="container animate">

		<div class="content">

			<div class="post-container">

				<h2>That page doesn't exist!</h2> 
				<p>Try doing a search:</p>

				<div class="search-404">

					<?php
						get_search_form(); 
					?>
				</div>
			</div>
		</div>
		
		<div class="aside animate">
			<?php get_sidebar(); ?>
		</div>
	</div>
</body>

<?php get_footer(); ?>
