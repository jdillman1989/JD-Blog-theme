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

		<div id="collapse">
			
			<?xml version="1.0" encoding="utf-8"?>
			<!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
			<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 105.5 107.2" enable-background="new 0 0 105.5 107.2" xml:space="preserve">
			<polygon fill="#F6F3EA" points="95.9,53.6 14.4,1.6 14.4,105.6 "/>
			</svg>
		</div>

		<div id="expand">
			
			<?xml version="1.0" encoding="utf-8"?>
			<!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
			<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 105.5 107.2" enable-background="new 0 0 105.5 107.2" xml:space="preserve">
			<polygon fill="#F6F3EA" points="14.4,53.6 95.9,105.6 95.9,1.6 "/>
			</svg>
		</div>

		<div id="nightmode">
			
			<?xml version="1.0" encoding="utf-8"?>
			<!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
			<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 105.5 105.5" enable-background="new 0 0 105.5 105.5" xml:space="preserve">
			<path fill="#F6F3EA" d="M65.5,81.3c-22.6,0-41-18.3-41-41C24.5,21.7,36.8,6.1,53.8,1c-0.3,0-0.7,0-1,0C24.2,1,1,24.2,1,52.8
				c0,28.6,23.2,51.8,51.8,51.8c28.6,0,51.7-23.1,51.7-51.7C99.2,69.3,83.7,81.3,65.5,81.3z"/>
			</svg>
		</div>

		<div id="daymode">
			
			<?xml version="1.0" encoding="utf-8"?>
			<!-- Generator: Adobe Illustrator 18.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
			<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 105.5 107.2" enable-background="new 0 0 105.5 107.2" xml:space="preserve">
			<circle fill="#F6F3EA" cx="52.5" cy="53.8" r="36"/>
			<circle fill="#F6F3EA" cx="52.5" cy="6.8" r="5.5"/>
			<circle fill="#F6F3EA" cx="99.4" cy="53.6" r="5.5"/>
			<circle fill="#F6F3EA" cx="5.6" cy="53.6" r="5.5"/>
			<circle fill="#F6F3EA" cx="52.5" cy="100.7" r="5.5"/>
			<circle fill="#F6F3EA" cx="19.3" cy="20.6" r="5.5"/>
			<circle fill="#F6F3EA" cx="85.6" cy="20.5" r="5.5"/>
			<circle fill="#F6F3EA" cx="19.2" cy="86.8" r="5.5"/>
			<circle fill="#F6F3EA" cx="85.7" cy="86.9" r="5.5"/>
			</svg>
		</div>
	</div>
</div>

