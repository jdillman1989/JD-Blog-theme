jQuery(document).ready(function() {

	// sticky header
	var nav = jQuery(".nav");
	navScroll = "nav-scrolled";
	headerHeight = jQuery('.header').height();

	jQuery(window).scroll(function() {
		if( jQuery(this).scrollTop() > headerHeight + 20 ) {
			nav.addClass(navScroll);
		} 
		else {
			nav.removeClass(navScroll);
		}
	});

	// sticky sidebar

	var sidebar = jQuery(".sidebar");
	var content = jQuery(".content");
	var sidebarScroll = "sidebar-scrolled";
	var sidebarEndScroll = "sidebar-end-scrolled";
	var navHeight = jQuery('.nav').height();
	var sliderHeight = jQuery('.slider').height();
	var prevHeight = headerHeight + navHeight + sliderHeight;

	var containerHeight = jQuery('.content-container').height();
	var documentHeight = jQuery(document).height();
	var footerHeight = jQuery('.footer').outerHeight();
	var windowHeight = jQuery(window).height();
	var sidebarHeight = jQuery('.sidebar').height();

	function currentSidebarPos(){

		// 105 includes 40px sidebar padding and 65px sidebar top
		return jQuery(window).scrollTop() + sidebarHeight + 105;
	}

	function footerStartPos(){

		// includes 20px container margin
		return jQuery(document).height() - footerHeight - 20;
	}

	function fixedSidebar(){

		sidebar.css({ 
			'position': 'fixed',
			'top': 65,
			'left': sidebar.offset().left,
			'margin-top': 0
		});
	}

	function staticSidebar(){

		sidebar.css({ 
			'position': 'static',
			'top': 'auto',
			'left': 'auto',
			'margin-top': 0
		});
	}

	var lastScrollTop = 0, delta = 5;

	jQuery(window).scroll(function() {

		// Only run on desktop
		if (jQuery(window).width() > 676 && sidebar.height() < content.height() + 50) {

			// Check if scrolled to sidebar top
			if( jQuery(this).scrollTop() > prevHeight + 20 ) {

				var st = jQuery(window).scrollTop();

				if(Math.abs(lastScrollTop - st) <= delta)
				  return;

				if (st > lastScrollTop){
					// downscroll code
					console.log('scroll down');
				} 

				else {
					// upscroll code
					console.log('scroll up');
				}

				lastScrollTop = st;

				fixedSidebar();

				// Check if window is smaller than sidebar
				if( jQuery(window).height() < sidebar.height() ) {
					console.log(" small screen ");
				}

				// Check if scrolled to footer
				if( currentSidebarPos() > footerStartPos()) {

					sidebar.css({ 
						'margin-top': footerStartPos() - currentSidebarPos()
					});
				};
			} 
			else {

				staticSidebar();
			}
		};
	});

	jQuery(window).resize(function() {

		// Only run on desktop
		if (jQuery(window).width() > 676 && sidebar.height() < content.height() + 50) {

			// Check if scrolled to sidebar top
			if( jQuery(this).scrollTop() > prevHeight + 20 ) {

				sidebar.css({ 
					'position': 'static',
					'margin-top': jQuery(window).scrollTop() - sidebar.outerHeight()
				});

				// Check if scrolled to footer
				if( currentSidebarPos() > footerStartPos()) {

					sidebar.css({ 
						'position': 'static',
						'margin-top': (footerStartPos() - currentSidebarPos()) + (jQuery(window).scrollTop() - sidebar.outerHeight())
					});
				};
			} 
			else {

				staticSidebar();
			}
		}
		else{

			staticSidebar();
		}
	});

	// mobile menu (can't have any other inline style attrs on #menu-primary)
	jQuery(function() {
		var pull        = jQuery('#menuToggle');
			menu        = jQuery('#menu-primary-1');
			menuHeight  = menu.height();
	 
		jQuery(pull).on('click', function(e) {
			e.preventDefault();
			menu.slideToggle();
		});

		jQuery(window).resize(function(){

			var w = jQuery(window).width();
			
			if(w > 676 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	});

	// crop slider image edges (requires a document max-width of 1200px)
	var sliderImage = jQuery( ".rslides img" );

	function updateCrop() {

		jQuery(sliderImage).each(function () {
			jQuery(this).css({
				'margin-left': (jQuery( window ).width()-1200) / 2
			});
		});
	}

	if ( jQuery( window ).width() < 1200 ) {
		updateCrop();
	};

	jQuery(window).resize(function(){

		if ( jQuery( window ).width() < 1200 ) {
			updateCrop();
		}
		else{

			jQuery(sliderImage).each(function () {
				jQuery(this).css({
					'margin-left': 0
				});
			});
		};
	});
});