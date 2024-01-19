<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory_uri() . $theme_styles );

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
	wp_enqueue_script( 'jquery' );
	
	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory_uri() . $theme_scripts );
	
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

// add ACF options page
if( function_exists('acf_add_options_page') ) {    
    acf_add_options_page();  
    acf_add_options_sub_page('Restaurant Info');
}

// add footer menu
function register_footer_menu() {
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );

// add restaurant menu
function register_restaurant_menu() {
	register_nav_menu('restaurant-menu',__( 'Restaurant Menu' ));
}
add_action( 'init', 'register_restaurant_menu' );

/**
 * Add styling to events calendar
 */
function events_styles_method() {
	
	$custom_css = '
	:root {
		--tec-font-family-sans-serif: var(--bs-body-font-family) ! important;
		--tec-font-size-7: var(--bs-body-font-size) ! important;
		--tec-color-event-icon-hover: var(--bs-primary) ! important;
		--tec-color-accent-primary: var(--bs-primary) ! important;
		--tec-color-accent-primary-hover: var(--bs-primary-rgba) ! important;
		--tec-color-accent-primary-active: var(--bs-primary) ! important;
		--tec-color-icon-focus: var(--bs-primary) ! important;
	}
	'. $css_output	.'	  
	';
	$stylesheet_handle = 'child-understrap-styles';
	// FILTER FOR DIFFERENT STYLESHEET HANDLES
	$stylesheet_handle = apply_filters('change_stylesheet_handle', $stylesheet_handle);
	wp_add_inline_style( $stylesheet_handle, $custom_css );	

}
add_action( 'wp_enqueue_scripts', 'events_styles_method', 11 );

// ad reservation widget to footer
function brg_reservation_widget() {
	$widget = get_field('reservation_widget', 'option');
	if ($widget) {
		$output = '
		<div class="modal fade" id="reservation">
			<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</button>
				</div>
				<div class="modal-body">
					'. $widget .'
				</div>
				</div>
			</div>
		</div>
		';
	}
  echo $output;
}
add_action('wp_footer', 'brg_reservation_widget');


// add restaurant menu and buttons to top nav menu
function brg_nav_menu( $items, $args ) {
	// modify nav menus only
	if ( $args->theme_location == 'primary' ) {
		// vars
		$top_button = get_field('top_button_one', 'option'); 
		$top_button2 = get_field('top_button_two', 'option');

		if( $top_button ) { 
			$link_url = $top_button['url'];
			$link_title = $top_button['title'];
			$link_target = $top_button['target'] ? $top_button['target'] : '_self';		
			$button_output .= '<a class="btn btn-light" href="'. esc_url( $link_url ) .'" target="'. esc_attr( $link_target ) .'">'. esc_html( $link_title ) .'</a>';
		} if( $top_button2 ) { 
			$link_url2 = $top_button2['url'];
			$link_title2 = $top_button2['title'];
			$link_target2 = $top_button2['target'] ? $top_button2['target'] : '_self';
			$button_output .= '<a class="btn btn-outline-light" href="'. esc_url( $link_url2 ) .'" target="'. esc_attr( $link_target2 ) .'">'. esc_html( $link_title2 ) .'</a>';
		}
		
		$top_right  = '<!-- top right buttons --><div class="right-menu">'. $button_output .'</div>';

		$restaurant_nav = wp_nav_menu( 
			array( 
				'theme_location' => 'restaurant-menu',
				'container_id'    => 'restaurant-menu-container',
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				'echo' => false,
				) 
			);

		$restaurant_menu = '
		<div id="restaurant-menu">
			<h4>Black Restaurant Group</h4>
			'. $restaurant_nav .'
		</div>';

		// append menus
		$items_output .= '<div id="navbarNavDropdown" class="collapse navbar-collapse">'. $items . $top_right . $restaurant_menu .'</div>';

	}

	// return
	return $items_output;

}
add_filter( 'wp_nav_menu', 'brg_nav_menu', 10, 2 );

// add gallery image size
add_image_size( 'gallery', 340, 330, true );