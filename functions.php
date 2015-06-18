<?php

function theme_setup() {

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for custom header image
	$args = array(
		'width'         => 1200,
		'height'        => 140,
		'default-image' => get_template_directory_uri() . '/images/header-bg.jpg',
		'uploads'       => true,
	);

	add_theme_support( 'custom-header', $args );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'GRIF' ),
		'social'  => __( 'Social Links Menu', 'GRIF' ),
		'footer' => __( 'Footer Menu',        'GRIF' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'theme_setup' );

// register Events post type
function events_post_type() {
	$labels = array(
		'name'                  =>   'Events',
		'singular_name'         =>   'Event',
		'add_new_item'          =>   'Add New Event',
		'all_items'             =>   'All Events',
		'edit_item'             =>   'Edit Event',
		'new_item'              =>   'New Event',
		'view_item'             =>   'View Event',
		'not_found'             =>   'No Events Found',
		'not_found_in_trash'    =>   'No Events Found in Trash'
	);
	 
	$supports = array(
		'title',
		'editor',
		'excerpt'
	);
	 
	$args = array(
		'label'         =>   'Events',
		'labels'        =>   $labels,
		'description'   =>   'A list of upcoming events',
		'public'        =>   true,
		'show_in_menu'  =>   true,
		'has_archive'   =>   true,
		'rewrite'       =>   true,
		'supports'      =>   $supports,
	);
	 
	register_post_type( 'event', $args );
}

add_action( 'init', 'events_post_type' );

//Add new fields to event post type
function render_event_info_metabox( $post ) {
 
	// generate a nonce field
	wp_nonce_field( basename( __FILE__ ), 'event-info-nonce' );
 
	// get previously saved meta values (if any)
	$event_start_date = get_post_meta( $post->ID, 'event-start-date', true );
	$event_end_date = get_post_meta( $post->ID, 'event-end-date', true );
	$event_location = get_post_meta( $post->ID, 'event-location', true );
 
	// // if there is previously saved value then retrieve it, else set it to the current time
	// $event_start_date = ! empty( $event_start_date ) ? $event_start_date : time();
 
	//we assume that if the end date is not present, event ends on the same day
	$event_end_date = ! empty( $event_end_date ) ? $event_end_date : $event_start_date;
 
	?>
		 
		<label for="event-start-date">Event Start Date:</label>
				<input id="event-start-date" type="text" name="event-start-date" placeholder="Format: June 1, 2015" value="<?php echo date( 'F d, Y', $event_start_date ); ?>" />
		 		<br>
		<label for="event-end-date">Event End Date:</label>
				<input id="event-end-date" type="text" name="event-end-date" placeholder="Format: June 1, 2015" value="<?php echo date( 'F d, Y', $event_end_date ); ?>" />
				<br>
		<label for="event-location">Event Location:</label>
				<input id="event-location" type="text" name="event-location" placeholder="eg. Grand Rapids Museum" value="<?php echo $event_location; ?>" />
				<br>
	<?php 
}

function add_event_info_metabox() {
	add_meta_box(
		'event-info-metabox',
		'Event Info',
		'render_event_info_metabox',
		'event',
		'side',
		'core'
	);
}
add_action( 'add_meta_boxes', 'add_event_info_metabox' );

//save new fields to database
function save_event_info( $post_id ) {

	// checking if the post being saved is an 'event',
	if ( 'event' != $_POST['post_type'] ) {
		return;
	}

	// checking for the 'save' status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	// verify nonce field
	$is_valid_nonce = ( isset( $_POST['event-info-nonce'] ) && ( wp_verify_nonce( $_POST['event-info-nonce'], basename( __FILE__ ) ) ) ) ? true : false;
 
	// exit depending on the save status or if the nonce is not valid
	if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
		return;
	}
 
	// checking for the values and performing necessary actions
	if ( isset( $_POST['event-start-date'] ) ) {
		update_post_meta( $post_id, 'event-start-date', strtotime( $_POST['event-start-date'] ) );
	}

	if ( isset( $_POST['event-end-date'] ) ) {
		update_post_meta( $post_id, 'event-end-date', strtotime( $_POST['event-end-date'] ) );
	}
 
	if ( isset( $_POST['event-location'] ) ) {
		update_post_meta( $post_id, 'event-location', sanitize_text_field( $_POST['event-location'] ) );
	}
 
}
add_action( 'save_post', 'save_event_info' );



/**
 * Register widget area.
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Right Sidebar', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'twentyfifteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

// Function that outputs the contents of the dashboard widget
function sub_export_admin_function() {

	$theme_path = get_template_directory_uri();

	echo '<form method="post" name="fz_csv_exporter_form" action="'.$theme_path.'/export.php">
					<p class="submit"><input type="submit" name="Submit" value="Export Subscriber Info" /></p>
			</form>';
}

// Function used in the action hook
function add_sub_widget() {
	wp_add_dashboard_widget('sub_export_admin', 'Get Current Subscriber List', 'sub_export_admin_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_sub_widget' );

// Function that outputs the contents of the dashboard widget
function documentation_admin_function() {

	$theme_path = get_template_directory_uri();

	echo '<form method="post" name="doc_form" action="'.$theme_path.'/GRIF-documentation.pdf">
					<p class="submit"><input type="submit" name="Submit" value="Get the theme documentation" /></p>
			</form>';
}

// Function used in the action hook
function add_documentation_widget() {
	wp_add_dashboard_widget('documentation_admin', 'Get GRIF theme documentation', 'documentation_admin_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_documentation_widget' );

/**
 * Enqueue scripts and styles.
 * @since Twenty Fifteen 1.0
 */

function theme_scripts() {

	// Load our main stylesheet.
	wp_enqueue_style( 'twentyfifteen-style', get_stylesheet_uri() );

	// Load theme js
	wp_enqueue_script( 'grif-script', get_template_directory_uri() . '/js/grif.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


// Add header styles
function header_style() {

	$header_image = get_header_image();

	$nav_items = wp_nav_menu(array(
		'echo' => false,
		'theme_location' => 'primary',
		'depth' => 1
	));

	$nav_items_count = substr_count($nav_items,'class="menu-item ');

	$nav_item_width = (100 / $nav_items_count) - .3;

	// // Dynamic social media icons
	// $menu = wp_get_nav_menu_object( 'social' );

	// $menu_items = wp_get_nav_menu_items($menu->term_id);

	// $menu_list = '';

	// foreach ( (array) $menu_items as $key => $menu_item ) {
		
	//     $title = $menu_item->title;
	//     $menu_list .= '.'.$title.'{ background-image: url( images/'.$title.'.jpg ); margin-right: 10px; }';
	// }

	return "<style type='text/css'>
				@media (min-width: 676px) {
					.header{
						background-image: 
						linear-gradient(to right, rgba(1, 1, 1, 0.9), rgba(1, 1, 1, 0.1) 35%), 
						url('".$header_image."');
					}

					.nav ul li {
						width: ".$nav_item_width."%;
					}
				}
			</style>";
}


// Subscription form class
class Signup {
		
	function checkInput() {
					
		// Bail right away if our hidden form value isn't there
		if (!(isset($_POST['form-data']))) { return false; }
	
		// Initialize errors
		$this->nameError = false;
		$this->emailError = false;
				
		// Set variables from post
		$this->subscriberName = $_POST['name'];
		$this->subscriberEmail = $_POST['email'];
		$this->events = $_POST['events'];
		$this->services = $_POST['services'];
				
		// Check tester name
		if (empty($this->subscriberName)) { $this->nameError = true; }
		
		// Check tester email		
		if (empty($this->subscriberEmail) || strpos($this->subscriberEmail,'@') === false) { $this->emailError = true; }
				
		// Bail on errors
		if ($this->nameError || $this->emailError) return false;		
	
		if (empty($this->events)) {
			$this->eventsInt = false;
		} else {
			$this->eventsInt = true;
		}

		if (empty($this->services)) {
			$this->servicesInt = false;
		} else {
			$this->servicesInt = true;
		}			
				
		return true;
	}
	
	function insertUser() {
		
		global $wpdb;
		
		$wpdb->hide_errors();
		
		$tableName = "wp_subscribers";
						
		return $wpdb->query($wpdb->prepare("
				INSERT INTO ".$tableName."
				(Name, Email, Events, Services)
				VALUES (%s, %s, %d, %d)",
				$this->subscriberName, $this->subscriberEmail, $this->eventsInt, $this->servicesInt));
						
	}
	
	function required($error) {
		if ($error) {
			return '<span class="error">*</span>';
		}
	}
	
	function getValue($var) {
		if (empty($var)) {
			return ' value=""';
		} else {
			return ' value="'.esc_html($var).'"';
		}
	}
	
	function errorLabel() {
		if ($this->nameError || $this->emailError || $this->rpgTypeError) {
			return '<strong class="error">Missing required field</strong><br>';
		}
	}
}

function showSignupForm() {

	$subform = new Signup();
	
	if ($subform->checkInput()) {
	
		$success = $subform->insertUser();
		
		if ($success) {

			$form = '<h2>Successfully signed up</h2>';
			return $form;
		} else {

			$form = '<h2 class="error">Error signing up</h2>';
			return $form;
		}		
	
	} else {
	
		$form = '<form id="sub-form" action="'.get_permalink().'#sub-form" method="post">
					<h2>Sign up for GRIF emails</h2>
					<p>
						<label for="name">Name:'.$subform->required($subform->nameError).'</label>
						<input type="text" name="name" id="name" size="30"'.$subform->getValue($subform->subscriberName).'/>
					</p>
					<p>
						<label for="email">Email:'.$subform->required($subform->emailError).'</label>
						<input type="email" name="email" id="email" size="30"'.$subform->getValue($subform->subscriberEmail).'/>
					</p>
					<p>
						<input type="checkbox" name="events" id="events" value="True" checked/>
						<label for="events">Notify me about new events at GRIF</label>
					</p>
					<p>
						<input type="checkbox" name="services" id="services" value="True" checked/>
						<label for="services">Notify me about services at GRIF</label>
					</p>
					<p>
						'.$subform->errorLabel().'
						<input type="hidden" name="form-data" value="process"/>
						<input type="submit" id="submit" name="Submit" value="Submit"/>
					</p>
				</form>';
		return $form;
	}	
}
