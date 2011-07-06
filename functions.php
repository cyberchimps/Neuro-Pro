<?php

/*
	Functions
	
	Establishes the core Neuro functions.
	
	Copyright (C) 2011 CyberChimps
*/

add_theme_support('automatic-feed-links');
	if ( ! isset( $content_width ) )
	$content_width = 600;
	
add_theme_support( 'post-thumbnails' ); 
set_post_thumbnail_size( 100, 100, true );

// This theme allows users to set a custom background
add_custom_background();
	
// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

//Checklist Shortcode
	
	function checklist($atts, $content = null) {
    	return '<div class="checklist">'.$content.'</div>' ;
}

add_shortcode('checklist', 'checklist');


	//Box Shortcode
	
	function box($atts, $content = null) {
   		return '<div class="boxcode">'.$content.'</div>' ;  
}
	
add_shortcode('box', 'box');

	//Column Shortcode
	
	function one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_third', 'one_third');
 
function one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'one_third_last');
 
function two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'two_third');
 
function two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'two_third_last');
 
function one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'one_half');
 
function one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'one_half_last');

function one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'one_fourth');

function one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'one_fourth_last');

function three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'three_fourth');

function three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'three_fourth_last');

function one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'one_fifth');

function one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'one_fifth_last');

function two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'two_fifth');

function two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'two_fifth_last');

function three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'three_fifth');

function three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'three_fifth_last');

function four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'four_fifth');

function four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'four_fifth_last');



// Create custom post type for Neuro Slider

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'ne_custom_slides',
		array(
			'labels' => array(
				'name' => __( 'Custom Slides' ),
				'singular_name' => __( 'Slides' )
			),
			'public' => true,
			'show_ui' => true, // UI in admin panel
			
			'has_archive' => true,
			'rewrite' => array('slug' => 'slides')
		)
	);
}


//Download Button Shortcode
	
function button( $atts, $content = null ) {
    extract(shortcode_atts(array(
    'link'	=> '#',
    'target'	=> '',
    'variation'	=> '',
    'size'	=> '',
    'align'	=> '',
    ), $atts));

	$style = ($variation) ? ' '.$variation. '_gradient' : '';
	$align = ($align) ? ' align'.$align : '';
	$size = ($size == 'large') ? ' large_button' : '';
	$target = ($target == 'blank') ? ' target="_blank"' : '';

	$out = '<a' .$target. ' class="button_link' .$style.$size.$align. '" href="' .$link. '"><span>' .do_shortcode($content). '</span></a>';

    return $out;
}


add_shortcode('button', 'button');

	//Slide Shortcode
	
	function slide($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => ''
	), $atts));
	return '<a class="slide">'.$title.'</a>

'.$content.'

';
}
add_shortcode('slide', 'slide');




/**
* Attach CSS3PIE behavior to elements
* Add elements here that need PIE applied
*/   
function neuro_render_ie_pie() { ?>
<style type="text/css" media="screen">
#header li a, #headerwrap, #footer, .postmetadata, .post_container, .wp-caption, .sidebar-widget-style, .sidebar-widget-title {
  behavior: url('<?php echo get_template_directory_uri(); ?>/library/pie/PIE.htc');
}
</style>
<?php
}

add_action('wp_head', 'neuro_render_ie_pie', 8);
	
// Load jQuery
	if ( !is_admin() ) {
	   wp_enqueue_script('jquery');
	}

	// Coin Slider 

function neuro_cs_head(){
	 
	$path =  get_template_directory_uri() ."/library/cs/";

	$script = "
		
		<script type=\"text/javascript\" src=\"".$path."scripts/coin-slider.min.js\"></script>
		";
	
	echo $script;
}

add_action('wp_head', 'neuro_cs_head');



	// Register superfish scripts
	
function neuro_add_scripts() {
 
    if (!is_admin()) { // Add the scripts, but not to the wp-admin section.
    // Adjust the below path to where scripts dir is, if you must.
    $scriptdir = get_template_directory_uri() ."/library/sf/";
 
    // Register the Superfish javascript files
    wp_register_script( 'superfish', $scriptdir.'sf.js', false, '1.4.8');
    wp_register_script( 'sf-menu', $scriptdir.'sf-menu.js');
    // Now the superfish CSS
   
    //load the scripts and style.
	wp_enqueue_style('superfish-css');
    wp_enqueue_script('superfish');
    wp_enqueue_script('sf-menu');
    } // end the !is_admin function
} //end add_our_scripts function
 
//Add our function to the wp_head. You can also use wp_print_scripts.
add_action( 'wp_head', 'neuro_add_scripts',0);



	// Register menu names
	
	function neuro_register_menus() {
	register_nav_menus(
	array( 'header-menu' => __( 'Header Menu' ), 'extra-menu' => __( 'Extra Menu' ))
  );
}
	add_action( 'init', 'neuro_register_menus' );
	
	// Menu fallback
	
	function neuro_menu_fallback() {
	global $post; ?>
	
	<ul id="menu-nav" class="sf-menu">
	<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}

	//Register Widgetized Sidebar and Footer
    
    
      if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="sidebar-widget-style">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="sidebar-widget-title">',
    		'after_title'   => '</h2>'
    	));
    	 if (function_exists('register_sidebar')) 
    	register_sidebar(array(
    		'name' => 'Sidebar Left',
    		'id'   => 'sidebar-left',
    		'description'   => 'These are widgets for the left sidebar.',
    		'before_widget' => '<div id="%1$s" class="sidebar-left-widget-style">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="sidebar-left-widget-title">',
    		'after_title'   => '</h2>'
    	));
    	
    	    	 if (function_exists('register_sidebar')) 
    	register_sidebar(array(
    		'name' => 'Sidebar Right',
    		'id'   => 'sidebar-right',
    		'description'   => 'These are widgets for the right sidebar.',
    		'before_widget' => '<div id="%1$s" class="sidebar-right-widget-style">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2 class="sidebar-right-widget-title">',
    		'after_title'   => '</h2>'
    	));
    	
    	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Left Box',
	'before_widget' => '<div class="box1">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="box-widget-title">',
	'after_title' => '</h3>',
	));
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Center Box',
	'before_widget' => '<div class="box2">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="box-widget-title">',
	'after_title' => '</h3>',
	));
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Right Box',
	'before_widget' => '<div class="box3">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="box-widget-title">',
	'after_title' => '</h3>',
	));
	if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'name' => 'Footer',
	'before_widget' => '<div class="footer-widgets">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="footer-widget-title">',
	'after_title' => '</h3>',
	));
    }
  
	//Neuro theme options file
	
require_once ( get_template_directory() . '/library/options/options.php' );
require_once ( get_template_directory() . '/pro/meta-box.php' );

require_once ( get_template_directory() . '/update.php' );

