<?php

function theme_setup() {

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'JDBlog' ),
		'social'  => __( 'Social Links Menu', 'JDBlog' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Enqueue scripts and styles.
 * @since Twenty Fifteen 1.0
 */

function theme_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'JDBlog-style', get_template_directory_uri() . '/css/application.css' );

	// Load theme js
	wp_enqueue_script( 'JDBlog-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// AJAX form

add_action( 'wp_ajax_mail_form', 'form_mail' );
add_action( 'wp_ajax_nopriv_mail_form', 'form_mail' );

function form_mail() {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Get the form fields and remove whitespace.
		$name = strip_tags(trim($_POST["name"]));
				$name = str_replace(array("\r","\n"),array(" "," "),$name);
		$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
		$message = trim($_POST["message"]);

		// Check that data was sent to the mailer.
		if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// Set a 400 (bad request) response code and exit.
			http_response_code(400);
			echo "Oops! There was a problem with your submission. Please complete the form and try again.";
			die();
		}
		else{

			// Set the recipient email address.
			$file = "../../site_mail.txt";

			// record date
			date_default_timezone_set('America/Chicago');
			$timestamp = date('l jS \of F Y h:i:s A');

			// Build the email content.
			$email_content = "Sent: $timestamp\n\n";
			$email_content .= "Name: $name\n";
			$email_content .= "Email: $email\n\n";
			$email_content .= "Message:\n$message\n\n";
			$email_content .= "**********************************\n\n";

			file_put_contents($file, $email_content, FILE_APPEND | LOCK_EX);

			// Set a 200 (okay) response code.
			http_response_code(200);
			echo "Thank You! Your message has been sent.";
			die();
		}
	} else {
		// Not a POST request, set a 403 (forbidden) response code.
		http_response_code(403);
		echo "There was a problem with your submission, please try again.";
		die();
	}
}

function form_shortcode( $atts ) {

	return '<div class="form-container">

				<div id="form-messages" class="animate"></div>

				<div class="contact-jesse">
					<form id="ajax-contact" method="post" action="'. admin_url('admin-ajax.php?action=mail_form') .'">

						<div class="field">

							<input type="text" id="name" name="name" placeholder="Name" required>

							<input type="email" id="email" name="email" placeholder="Email" required>

							<button type="submit">Send</button>
						</div>

						<div class="email-message">
							<textarea id="message" name="message" placeholder="Message" required></textarea>
						</div>
					</form>
				</div>
			</div>';
}

add_shortcode( 'contact_jesse', 'form_shortcode' );

