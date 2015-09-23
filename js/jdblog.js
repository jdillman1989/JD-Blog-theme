jQuery(document).ready(function() {

	// sticky sidebar

	var postContainer = jQuery(".post-container");

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

	// // full height content

	// var container = jQuery(".container");

	// if ( container.height() < jQuery(window).height() ) {
	// 	container.css({"height":"100%"});
	// };

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
			jQuerythis = jQuery(this);
			jQuerythis.attr("href", jQuerythis.attr("href") + "#night");
		});
	});

	dayButton.click(function() {

		container.removeClass( nightmode );
		jQuery( this ).toggle();
		nightButton.toggle();
		location.hash = "day";

		jQuery("a").each(function() {
			jQuerythis = jQuery(this);
			jQuerythis.attr("href", jQuerythis.attr("href").split('#')[0]);
		});
	});

	if(location.hash){

		var hashValue = location.hash.split('#')[1];

		if (hashValue == "night") {
			nightButton.trigger( "click" );
		};
	}

	// Contact form

	// Get the form.
	var form = jQuery('#ajax-contact');

	// Get the messages div.
	var formMessages = jQuery('#form-messages');

	// Set up an event listener for the contact form.
	jQuery(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		formMessages.css({"transform":"translate( 0px, 0px)"});

		// Serialize the form data.
		var formData = jQuery(form).serialize();

		// Submit the form using AJAX.
		jQuery.ajax({
			type: 'POST',
			url: jQuery(form).attr('action'),
			data: formData
		})

		.done(function(response) {

			// Set the message text.
			jQuery(formMessages).text(response);

			formMessages.css({"transform":"translate( 0px, " + 80 + "px )"});

			// Clear the form.
			jQuery('#name').val('');
			jQuery('#email').val('');
			jQuery('#message').val('');
		})

		.fail(function(data) {

			// Set the message text.
			if (data.responseText !== '') {
				jQuery(formMessages).text(data.responseText);
			} 

			else {
				jQuery(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
	});

	// Work Portfolio

	// Animate thumbnails on hover
	var workThumbnails = jQuery(".work-thumbnail");

	// Thumbnail click event
	var fullSizeContainer = jQuery(".full-size-work");
	var descriptionContainer = jQuery(".description-container");

	workThumbnails.click(function() {

		fullSizeContainer.css({"width":postContainer.width()});

		if ( jQuery(window).width() > 676 ) {

			descriptionContainer.css({"height":jQuery(window).height()});
		}
		else{

			descriptionContainer.css({"height":"auto"});
		};

		var selected = jQuery(this);
		var imgSrc = selected.attr("src");
		var descriptionContent = selected.next().html();

		fullSizeContainer.attr( "src", imgSrc );
		descriptionContainer.html( descriptionContent );

		if ( jQuery(window).width() < 676 ) {
			fullSizeContainer.css({"margin-top":descriptionContainer.outerHeight()+15});
		}

		var fullSizeTranslate = fullSizeContainer.width() + parseInt(postContainer.css("marginLeft"));

		fullSizeContainer.css({"transform":"translate( " + fullSizeTranslate + "px, 0px )"});

		descriptionContainer.css({"transform":"translate( 0px, " + descriptionContainer.outerHeight() + "px )"});
	});

	descriptionContainer.on('click', '.exit', function(){

		fullSizeContainer.css({"transform":"translate( 0px, 0px )"});

		descriptionContainer.css({"transform":"translate( 0px, 0px )"});
	});
});


