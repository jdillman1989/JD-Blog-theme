<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 */
?>

<div class="header">

	<div class="logo">
		<a href="<?php bloginfo('url'); ?>"></a>
	</div>

	<div class="name">
		<h1><?php bloginfo( 'name' ); ?></h1>
	</div>

	<div class="mobile-nav" id="mobilenav"></div>
</div>

<div class="sidebar animate">

	<div id="mobile-collapse"></div>

	<div class="social">
		<?php
			wp_nav_menu( 
				array( 'theme_location' => 'social' ) 
			); 
		?>
	</div>

	<div class="search">
		<?php
			get_search_form(); 
		?>
	</div>

	<div class="nav">
		<?php
			wp_nav_menu( 
				array( 'theme_location' => 'primary' ) 
			); 
		?>
	</div>

	<div class="controls">

		<div id="nightmode"></div>

		<div id="daymode"></div>
	</div>
</div>

<?php

if (!is_page(163)) {
	echo '<a href="/i-am-currently-accepting-freelance/" class="freelance"><span></span>Currently Accepting Clients</a>';
}
?>

