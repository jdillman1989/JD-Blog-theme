jQuery(document).ready(function() {

	// sticky sidebar

	var aside = jQuery(".aside");
	var sidebar = jQuery(".sidebar");
	var content = jQuery(".content");

	var sidebarHeight = sidebar.height();
	var prevHeight = jQuery('.header').outerHeight();
	var windowHeight = jQuery(window).height();

	var sidebarScroll = "stick";
	var lastScrollTop = 0, delta = 5;

	if (jQuery(window).width() > 676 && sidebar.height() < content.height() + 50) {

		jQuery(window).scroll(function() {

			if( jQuery(this).scrollTop() > prevHeight ) {

				// var st = jQuery(window).scrollTop();

				// if(Math.abs(lastScrollTop - st) <= delta)
				//   return;

				// if (st > lastScrollTop){
				// 	// downscroll code
				// 	console.log('scroll down');
				// } 

				// else {
				// 	// upscroll code
				// 	console.log('scroll up');
				// }

				// lastScrollTop = st;

				sidebar.addClass( sidebarScroll );

				// Check if window is smaller than sidebar
				if( jQuery(window).height() < sidebarHeight ) {
					console.log(" small screen ");
				}
			} 
			else {

				sidebar.removeClass( sidebarScroll );
			}
		});
	};

	// mobile nav

	var mobileNav = jQuery(".mobile-nav");
	var mobileCollapse = jQuery("#mobile-collapse");

	if (jQuery(window).width() < 676 ) {

		sidebar.css({"transform":"translate(" + sidebar.width() + "px, 0px)"});	
	}

	jQuery(window).resize(function() {

		if (jQuery(window).width() > 676 ) {

			sidebar.css({"transform":"translate(0px, 0px)"});
		}
	});

	mobileNav.click(function() {

		sidebar.css({"transform":"translate(0px, 0px)"});
	});

	mobileCollapse.click(function() {

		sidebar.css({"transform":"translate(" + sidebar.width() + "px, 0px)"});	
	});

	// controls
	// collapse

	var collapse = jQuery("#collapse");
	var expand = jQuery("#expand");

	collapse.click(function() {

		var asideWidth = aside.outerWidth();
		var buttonWidth = collapse.outerWidth();

		aside.css({"transform":"translate(" + (asideWidth - buttonWidth) + "px, 0px)"});
		jQuery( this ).toggle();
		expand.toggle();
	});

	expand.click(function() {

		aside.css({"transform":"translate(0px, 0px)"});
		jQuery( this ).toggle();
		collapse.toggle();
	});

	// controls
	// nightmode

	var nightButton = jQuery("#nightmode");
	var dayButton = jQuery("#daymode");
	var container = jQuery(".container");
	var nightmode = "nightmode";

	nightButton.click(function() {

		container.addClass( nightmode );
		jQuery( this ).toggle();
		dayButton.toggle();
		location.hash = "night";

		jQuery("a").each(function() {
			$this = jQuery(this);
			$this.attr("href", $this.attr("href") + "#night");
		});
	});

	dayButton.click(function() {

		container.removeClass( nightmode );
		jQuery( this ).toggle();
		nightButton.toggle();
		location.hash = "";

		jQuery("a").each(function() {
			$this = jQuery(this);
			$this.attr("href", $this.attr("href").split('#')[0]);
		});
	});

	if(location.hash){

		var hashValue = location.hash.split('#')[1];

		if (hashValue == "night") {
			nightButton.trigger( "click" );
		};
	}
});


