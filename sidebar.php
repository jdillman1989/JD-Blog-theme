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

	<div class="mobile-nav" id="mobilenav">
		<?xml version="1.0" encoding="utf-8"?>
		<!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
		<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
		<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 105.5 109" enable-background="new 0 0 105.5 109" xml:space="preserve">
		<rect x="3.5" y="4" fill="#F6F3EA" width="99.8" height="15.8"/>
		<rect x="3.5" y="45.8" fill="#F6F3EA" width="99.8" height="15.8"/>
		<rect x="3.5" y="88" fill="#F6F3EA" width="99.8" height="15.8"/>
		</svg>
	</div>
</div>

<div class="sidebar">

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

		<div id="collapse"></div>

		<div id="expand"></div>

		<div id="nightmode"></div>

		<div id="daymode"></div>
	</div>
</div>

