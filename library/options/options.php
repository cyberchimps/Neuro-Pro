<?php   

/* 
Portions of code referenced from Theme4Press http://theme4press.com/
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
*/

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' ); 


$options = get_option('neuro');

function is_chrome()
{
return(eregi("chrome", $_SERVER['HTTP_USER_AGENT']));
}

/**
 * Init plugin options to white list our options
 */  
function theme_options_init() {
	
	register_setting( 'ne_options', 'neuro', 'theme_options_validate' );
	wp_register_script('nejquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"), false, '1.4.4');
  wp_register_script('nejqueryui', get_template_directory_uri(). '/library/js/jquery-ui.js');
  wp_register_script('nejquerycookie', get_template_directory_uri(). '/library/js/jquery-cookie.js');
  wp_register_script('necookie', get_template_directory_uri(). '/library/js/cookie.js');
 
  wp_register_script('nemcolor', get_template_directory_uri(). '/library/js/jscolor/jscolor.js');
 
  wp_register_style('necss', get_template_directory_uri(). '/library/options/theme-options.css');
}


$themename = "Neuro Pro";
$template_url = get_template_directory_uri();


/**
 * Load up the menu page
 */
 
function theme_options_add_page() {
global $themename, $shortname, $options;
  $page = add_theme_page($themename." Settings", "".$themename." Settings", 'edit_theme_options', 'theme_options', 'theme_options_do_page');  

  add_action('admin_print_scripts-' . $page, 'ne_scripts');
  add_action('admin_print_styles-' . $page, 'ne_styles');  
 
}



function neuro_add_css() {
$options = get_option('neuro');
$color = $options[('ne_color')]; 
$tdurl = get_template_directory_uri();


	if ( $color == 'blue'){

	echo '<link rel="stylesheet" href="', $tdurl, '/library/css/blue.css" type="text/css" />';
	}
	
	if ( $color == 'grey'){

	echo '<link rel="stylesheet" href="', $tdurl, '/library/css/grey.css" type="text/css" />';
	}
	
	if ( $color == 'green'){

	echo '<link rel="stylesheet" href="', $tdurl, '/library/css/green.css" type="text/css" />';
	}
	
	if ( $color == 'orange'){

	echo '<link rel="stylesheet" href="', $tdurl, '/library/css/orange.css" type="text/css" />';
	}
	
	if ( $color == 'pink'){

	echo '<link rel="stylesheet" href="', $tdurl, '/library/css/pink.css" type="text/css" />';
	}
	
	if ( $color == 'red') {

	echo '<link rel="stylesheet" href="', $tdurl, '/library/css/red.css" type="text/css" />';
	}
}
add_action( 'wp_head', 'neuro_add_css');

/*
Header Color
*/

function neuro_add_header_color() {

$options = get_option('neuro');

if (isset($options['ne_header_color']) == "")
			$header = 'FBFBFB';
			
		else
			$header = $options['ne_header_color']; 
			
echo '<style type="text/css">';
		echo "#headerwrap {background-color: #$header;}";
		echo '</style>';

}

add_action( 'wp_head', 'neuro_add_header_color');


/*
Menu Color
*/

function neuro_add_menu_color() {

$options = get_option('neuro');
$enable = $options['ne_enable_menu_color'];

if (isset($options['ne_custom_menu_color']) == "" && $enable == '1') {
			$link = '276DB3';
}

		if (isset($options['ne_custom_menu_color']) != "" && $enable == '1') {
			$link = $options['ne_custom_menu_color']; 
			
}			
		
if ($enable == '1') {		
echo '<style type="text/css">';
		echo "#navbackground {background: #$link;}";
		echo '</style>';

}

}
add_action( 'wp_head', 'neuro_add_menu_color');

/*
Menu Color
*/

function neuro_add_menu_font_color() {

$options = get_option('neuro');
$enable = $options['ne_enable_menu_font_color'];

if (isset($options['ne_menu_font_color']) == "" && $enable == '1') {
			$link = '276DB3';
}

		if (isset($options['ne_menu_font_color']) != "" && $enable == '1') {
			$link = $options['ne_menu_font_color']; 
			
}			
		
if ($enable == '1') {		
echo '<style type="text/css">';
		echo ".sf-menu a {color: #$link;}";
		echo '</style>';

}

}
add_action( 'wp_head', 'neuro_add_menu_font_color');



/*
Link Color
*/

function neuro_add_link_color() {

$options = get_option('neuro');
$enable = $options['ne_enable_link_color'];

if (isset($options['ne_link_color']) == "" && $enable == '1') {
			$link = '276DB3';
}

		if (isset($options['ne_link_color']) != "" && $enable == '1') {
			$link = $options['ne_link_color']; 
			
}			
		
if ($enable == '1') {		
echo '<style type="text/css">';
		echo ".posts_title a {color: #$link;}";
		echo ".sidebar-widget-style a {color: #$link;}";
		echo '</style>';

}

}
add_action( 'wp_head', 'neuro_add_link_color');


/*
Footer Color
*/

function neuro_add_footer_color() {

$options = get_option('neuro');

if (isset($options['ne_footer_color']) == "")
			$footer = '2C2C2C';
			
		else
			$footer = $options['ne_footer_color']; 
			
echo '<style type="text/css">';
		echo "#footer {background-color: #$footer;}";
		echo '</style>';

}

add_action( 'wp_head', 'neuro_add_footer_color');
/*
Background
*/

function neuro_add_background() {

$options = get_option('neuro');
$tdurl = get_template_directory_uri();
if (isset($options['ne_background']) == "")
			$background = 'woodlight-background';
			
		else
			$background = $options['ne_background']; 
$disable = $options['ne_disable_background'];

	if ( $background == 'blue-background' && $disable != '1'){
		echo '<style type="text/css">';
		echo "body {background: url('$tdurl/images/bg/blue.jpg')}";
		echo '</style>';
	}
	
	if ( $background == 'grey-background' && $disable != '1'){
		echo '<style type="text/css">';
		echo "body {background: url('$tdurl/images/bg/greyback.jpg')}";
		echo '</style>';
	}
	
	if ( $background == 'wood-background' && $disable != '1'){
		echo '<style type="text/css">';
		echo "body {background: url('$tdurl/images/bg/wooddark.jpg')}";
		echo '</style>';
	}
	if ( $background == 'woodlight-background' && $disable != '1'){
		echo '<style type="text/css">';
		echo "body {background: url('$tdurl/images/bg/wood.jpg')}";
		echo '</style>';
	}
		if ( $background == 'neuros-background' && $disable != '1'){
		echo '<style type="text/css">';
		echo "body {background: url('$tdurl/images/bg/neuros.jpg')}";
		echo '</style>';
	}
	
	
		if ( $background == 'pink-background' && $disable != '1'){
		echo '<style type="text/css">';
		echo "body {background: url('$tdurl/images/bg/pink.png')}";
		echo '</style>';
	}
}

add_action( 'wp_head', 'neuro_add_background');

/*
Custom CSS
*/

function neuro_custom_css() {
	$options = get_option('neuro');
	$neuro_css_css = $options['ne_css_options'];
	echo '<style type="text/css">' . "\n";
	echo neuro_css_filter ( $neuro_css_css ) . "\n";
	echo '</style>' . "\n";
}

function neuro_css_filter($_content) {
	$_return = preg_replace ( '/@import.+;( |)|((?:\/\*(?:[^*]|(?:\*+[^*\/]))*\*+\/))/i', '', $_content );
	$_return = htmlspecialchars ( strip_tags($_return), ENT_NOQUOTES, 'UTF-8' );
	return $_return;
}

		
add_action ( 'wp_head', 'neuro_custom_css' );



$select_background = array(
	
	'0' => array(
		'value' => 'woodlight-background',
		'label' => __( 'WoodLight'),
		'thumbnail' => get_template_directory_uri() . '/images/bg/thumbs/woodlight.jpg',
		),
		
	'1' => array(
		'value' => 'blue-background',
		'label' => __( 'Blue'),
		'thumbnail' => get_template_directory_uri() . '/images/bg/thumbs/blue.png',
		),
		
	'2' => array(
		'value' => 'pink-background',
		'label' => __( 'Pink'),
		'thumbnail' => get_template_directory_uri() . '/images/bg/thumbs/pinkthumb.png',
		),	
		
	
	
	);
	
$select_background2 = array(

	'0' => array(
		'value' => 'wood-background',
		'label' => __( 'Wood'),
		'thumbnail' => get_template_directory_uri() . '/images/bg/thumbs/wooddark.jpg',
		),
	
	'1' => array(
		'value' => 'grey-background',
		'label' => __( 'Grey'),
		'thumbnail' => get_template_directory_uri() . '/images/bg/thumbs/greyback.jpg',
		),
	
		
	'2' => array(
		'value' => 'neuros-background',
		'label' => __( 'Neuros'),
		'thumbnail' => get_template_directory_uri() . '/images/bg/thumbs/neurosthumb.jpg',
		),	


);
	
$select_font = array(
		'0' => array('value' =>'Helvetica+Neue','label' => __('Helvetica Neue (default)')), '1' => array('value' =>'Arial','label' => __('Arial')),'2' => array('value' =>'Courier New','label' => __('Courier New')),'3' => array('value' =>'Georgia','label' => __('Georgia')),'4' => array('value' =>'Lucida Grande','label' => __('Lucida Grande')),'5' => array('value' =>'Tahoma','label' => __('Tahoma')),'6' => array('value' =>'Times New Roman','label' => __('Times New Roman')),'7' => array('value' =>'Verdana','label' => __('Verdana')),'8' => array('value' =>'Allan','label' => __('Allan')),'9' => array('value' =>'Allerta','label' => __('Allerta')),'10' => array('value' =>'Allerta+Stencil','label' => __('Allerta Stencil')),'11' => array('value' =>'Amaranth','label' => __('Amaranth')),'12' => array('value' =>'Annie+Use+Your+Telescope','label' => __('Annie Use Your Telescope')),'13' => array('value' =>'Anonymous+Pro','label' => __('Anonymous Pro')),'14' => array('value' =>'Anton','label' => __('Anton')),'15' => array('value' =>'Architects+Daughter','label' => __('Architects Daughter')),'16' => array('value' =>'Arimo','label' => __('Arimo')),'17' => array('value' =>'Arvo','label' => __('Arvo')),'18' => array('value' =>'Astloch','label' => __('Astloch')),'19' => array('value' =>'Bangers','label' => __('Bangers')),'20' => array('value' =>'Bentham','label' => __('Bentham')),'21' => array('value' =>'Bevan','label' => __('Bevan')),'22' => array('value' =>'Buda','label' => __('Buda')),'23' => array('value' =>'Cabin','label' => __('Cabin')),'24' => array('value' =>'Cabin+Sketch','label' => __('Cabin Sketch')),'25' => array('value' =>'Calligraffitti','label' => __('Calligraffitti')),'26' => array('value' =>'Candal','label' => __('Candal')),'27' => array('value' =>'Cantarell','label' => __('Cantarell')),'28' => array('value' =>'Cherry+Cream+Soda','label' => __('Cherry Cream Soda')),'29' => array('value' =>'Chewy','label' => __('Chewy')),'30' => array('value' =>'Coda','label' => __('Coda')),'31' => array('value' =>'Coming+Soon','label' => __('Coming Soon')),'32' => array('value' =>'Copse','label' => __('Copse')),'33' => array('value' =>'Corben','label' => __('Corben')),'34' => array('value' =>'Cousine','label' => __('Cousine')),'35' => array('value' =>'Covered+By+Your+Grace','label' => __('Covered By Your Grace')),'36' => array('value' =>'Crafty+Girls','label' => __('Crafty Girls')),'37' => array('value' =>'Crimson+Text','label' => __('Crimson Text')),'38' => array('value' =>'Crushed','label' => __('Crushed')),'39' => array('value' =>'Cuprum','label' => __('Cuprum')),'40' => array('value' =>'Dancing+Script','label' => __('Dancing Script')),'41' => array('value' =>'Dawning+of+a+New+Day','label' => __('Dawning of a New Day')),'42' => array('value' =>'Droid+Sans','label' => __('Droid Sans')),'43' => array('value' =>'Droid+Sans+Mono','label' => __('Droid Sans Mono')),'44' => array('value' =>'Droid+Serif','label' => __('Droid Serif')),'45' => array('value' =>'EB+Garamond','label' => __('EB Garamond')),'46' => array('value' =>'Expletus+Sans','label' => __('Expletus Sans')),'47' => array('value' =>'Fontdiner+Swanky','label' => __('Fontdiner Swanky')),'48' => array('value' =>'Geo','label' => __('Geo')),'49' => array('value' =>'Goudy+Bookletter+1911','label' => __('Goudy Bookletter 1911')),'50' => array('value' =>'Gruppo','label' => __('Gruppo')),'51' => array('value' =>'Homemade+Apple','label' => __('Homemade Apple')),'52' => array('value' =>'Inconsolata','label' => __('Inconsolata')),'53' => array('value' =>'Indie+Flower','label' => __('Indie Flower')),'54' => array('value' =>'Irish+Grover','label' => __('Irish Grover')),'55' => array('value' =>'Josefin+Sans','label' => __('Josefin Sans')),'56' => array('value' =>'Josefin+Slab','label' => __('Josefin Slab')),'57' => array('value' =>'Just+Another+Hand','label' => __('Just Another Hand')),'58' => array('value' =>'Just+Me+Again+Down+Here','label' => __('Just Me Again Down Here')),'59' => array('value' =>'Kenia','label' => __('Kenia')),'60' => array('value' =>'Kranky','label' => __('Kranky')),'61' => array('value' =>'Kreon','label' => __('Kreon')),'62' => array('value' =>'Kristi','label' => __('Kristi')),'63' => array('value' =>'Lato','label' => __('Lato')),'64' => array('value' =>'League+Script','label' => __('League Script')),'65' => array('value' =>'Lekton','label' => __('Lekton')),'66' => array('value' =>'Lobster','label' => __('Lobster')),'67' => array('value' =>'Luckiest+Guy','label' => __('Luckiest Guy')),'68' => array('value' =>'Maiden+Orange','label' => __('Maiden Orange')),'69' => array('value' =>'Meddon','label' => __('Meddon')),'70' => array('value' =>'MedievalSharp','label' => __('MedievalSharp')),'71' => array('value' =>'Merriweather','label' => __('Merriweather')),'72' => array('value' =>'Michroma','label' => __('Michroma')),'73' => array('value' =>'Miltonian','label' => __('Miltonian')),'74' => array('value' =>'Miltonian+Tattoo','label' => __('Miltonian Tattoo')),'75' => array('value' =>'Molengo','label' => __('Molengo')),'76' => array('value' =>'Mountains+of+Christmas','label' => __('Mountains of Christmas')),'77' => array('value' =>'Neucha','label' => __('Neucha')),'78' => array('value' =>'Neuton','label' => __('Neuton')),'79' => array('value' =>'Nobile','label' => __('Nobile')),'80' => array('value' =>'OFL+Sorts+Mill+Goudy+TT','label' => __('OFL Sorts Mill Goudy TT')),'81' => array('value' =>'Old+Standard+TT','label' => __('Old Standard TT')),'82' => array('value' =>'Orbitron','label' => __('Orbitron')),'83' => array('value' =>'Oswald','label' => __('Oswald')),'84' => array('value' =>'Pacifico','label' => __('Pacifico')),'85' => array('value' =>'Permanent+Marker','label' => __('Permanent Marker')),'86' => array('value' =>'Philosopher','label' => __('Philosopher')),'87' => array('value' =>'Puritan','label' => __('Puritan')),'88' => array('value' =>'Quattrocento','label' => __('Quattrocento')),'89' => array('value' =>'Quattrocento+Sans','label' => __('Quattrocento Sans')),'90' => array('value' =>'Radley','label' => __('Radley')),'91' => array('value' =>'Raleway','label' => __('Raleway')),'92' => array('value' =>'Reenie+Beanie','label' => __('Reenie Beanie')),'93' => array('value' =>'Rock+Salt','label' => __('Rock Salt')),'94' => array('value' =>'Schoolbell','label' => __('Schoolbell')),'95' => array('value' =>'Six+Caps','label' => __('Six Caps')),'96' => array('value' =>'Slackey','label' => __('Slackey')),'97' => array('value' =>'Smythe','label' => __('Smythe')),'98' => array('value' =>'Sniglet','label' => __('Sniglet')),'99' => array('value' =>'Special+Elite','label' => __('Special Elite')),'100' => array('value' =>'Sue+Ellen+Francisco','label' => __('Sue Ellen Francisco')),'101' => array('value' =>'Sunshiney','label' => __('Sunshiney')),'102' => array('value' =>'Syncopate','label' => __('Syncopate')),'103' => array('value' =>'Terminal+Dosis+Light','label' => __('Terminal Dosis Light')),'104' => array('value' =>'The+Girl+Next+Door','label' => __('The Girl Next Door')),'105' => array('value' =>'Tinos','label' => __('Tinos')),'106' => array('value' =>'Ubuntu','label' => __('Ubuntu')),'107' => array('value' =>'Unkempt','label' => __('Unkempt')),'108' => array('value' =>'VT323','label' => __('VT323')),'109' => array('value' =>'Vibur','label' => __('Vibur')),'110' => array('value' =>'Vollkorn','label' => __('Vollkorn')),'111' => array('value' =>'Waiting+for+the+Sunrise','label' => __('Waiting for the Sunrise')),'112' => array('value' =>'Walter+Turncoat','label' => __('Walter Turncoat')),'113' => array('value' =>'Yanone+Kaffeesatz','label' => __('Yanone Kaffeesatz')),

);

$select_color =array(
	'0' => array('value' =>'default','label' => __('Black (default)')),'1' => array('value' =>'blue','label' => __('Blue')),'2' => array('value' =>'green','label' => __('Green')),'3' => array('value' =>'grey','label' => __('Grey')),'4' => array('value' =>'orange','label' => __('Orange')),'5' => array('value' =>'pink','label' => __('Pink')),'6' => array('value' =>'red','label' => __('Red')),
	
);

$select_slider_effect = array(
	'0' => array('value' => 'random', 'label' => __( 'Random')), '1' => array('value' => 'rain', 'label' => __('Rain')), '2' => array('value' => 'straight', 'label' =>__('Straight')), '3' => array('value' => 'swirl', 'label' => __('Swirl')),
  
);

$select_slider_type = array(
	'0' => array('value' => 'posts', 'label' => __('Post Categeory')), '1' => array('value' => 'custom', 'label' => __( 'Custom Slides')), 
);

$select_slider_placement = array(
	'0' => array('value' => 'feature', 'label' => __( 'Neuro Pro Homepage')), '1' => array('value' => 'blog', 'label' => __('Default (Post) Template')),
	
);



$shortname = "ne";

$optionlist = array (

array( "id" => $shortname,
	"type" => "open-tab"),

array( "type" => "open"),
array( "type" => "close"),

array( "type" => "close-tab"),

// General

array( "id" => $shortname."-tab1",
	"type" => "open-tab"),

array( "type" => "open"),


array( "name" => "Choose a font:",  
    "desc" => "(Default is Helvetica Neue)",  
    "id" => $shortname."_font",  
    "type" => "select1",  
    "std" => ""),
            
array( "name" => "Custom Favicon",  
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",  
    "id" => $shortname."_favicon",  
    "type" => "text",  
    "std" => ""),   

array( "name" => "Twitter Bar",  
    "desc" => "Enter your Twitter handle for the Twitter Bar",  
    "id" => $shortname."_twitter_bar",  
    "type" => "twitter",  
    "std" => ""),   

array(  "name" => "Show Facebook Like Button",
        "desc" => "Check this box to show the Facebook Like Button on blog posts",
        "id" => $shortname."_show_fb_like",
        "type" => "checkbox",
        "std" => "false"),  
        
array( "name" => "Google Analytics Code",  
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically be added to the footer.",  
    "id" => $shortname."_ga_code",  
    "type" => "textarea",  
    "std" => ""),  

array( "type" => "close"),

array( "type" => "close-tab"),

array( "id" => $shortname."-tab2",
	"type" => "open-tab"),
 
array( "type" => "open"),


array( "name" => "Choose a color scheme:",  
    "desc" => "(Default is Black)",  
    "id" => $shortname."_color",  
    "type" => "select2",  
    "std" => ""),
    
array( "name" => "Choose a background:",  
    "desc" => "(Default is Wood)",  
    "id" => $shortname."_background",  
    "type" => "radio",  
    "std" => ""),

array( "name" => "Header Color",  
    "desc" => "Use the color picker to select the header color (default is FBFBFB).",  
    "id" => $shortname."_header_color",  
      "type" => "color2",  
    "std" => "false"),

array( "name" => "Footer Color",  
    "desc" => "Use the color picker to select the footer color (default is 2C2C2C).",  
    "id" => $shortname."_footer_color",  
      "type" => "color1",  
    "std" => "false"),
    
array( "name" => "Menu Background Color",  
    "desc" => "Use the color picker to select the footer color (default is 2C2C2C).",  
    "id" => $shortname."_custom_menu_color",  
      "type" => "color4",  
    "std" => "false"),

array( "name" => "Menu Font Color",  
    "desc" => "Use the color picker to select the footer color (default is FFFFFF).",  
    "id" => $shortname."_menu_font_color",  
      "type" => "color5",  
    "std" => "false"),

array( "name" => "Link Color",  
    "desc" => "Use the color picker to select the footer color (default is 276DB3).",  
    "id" => $shortname."_link_color",  
      "type" => "color3",  
    "std" => "false"),
    
array( "name" => "Custom CSS",  
    "desc" => "Override default Neuro CSS here.",  
    "id" => $shortname."_css_options",  
    "type" => "textarea",  
    "std" => ""),  
    
array( "type" => "close"),
array( "type" => "close-tab"),



// Header

array( "id" => $shortname."-tab3",
	"type" => "open-tab"),
 
array( "type" => "open"),

array( "name" => "Logo URL",  
    "desc" => "Enter the link to your logo image (max-height 60px).",  
    "id" => $shortname."_logo",  
    "type" => "text",  
    "std" => ""),  


array( "name" => "Facebook URL",  
    "desc" => "Enter your Facebook page URL to display the Facebook social icon (to hide enter the word: hide).",  
    "id" => $shortname."_facebook",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Twitter URL",  
    "desc" => "Enter your Twitter URL to display the Twitter social icon (to hide enter the word: hide).",  
    "id" => $shortname."_twitter",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "LinkedIn URL",  
    "desc" => "Enter your LinkedIn URL to display the LinkedIn social icon (to hide enter the word: hide).",  
    "id" => $shortname."_linkedin",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "YouTube URL",  
    "desc" => "Enter your YouTube URL to display the YouTube social icon (to hide enter the word: hide).",  
    "id" => $shortname."_youtube",  
    "type" => "text",  
    "std" => ""),  
    


array( "name" => "Email",  
    "desc" => "Enter your contact email address to display the email social icon (to hide enter the word: hide.",  
    "id" => $shortname."_email",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "RSS Link",  
    "desc" => "Enter Feedburner URL, or leave blank for default RSS feed (to hide enter the word: hide).",  
    "id" => $shortname."_rsslink",  
    "type" => "text",  
    "std" => ""),   
 
array( "type" => "close"),

array( "type" => "close-tab"),

array( "id" => $shortname."-tab4",
	"type" => "open-tab"),
 
array( "type" => "open"),



array( "name" => "Home Description",  
    "desc" => "Enter the META description of your homepage here.",  
    "id" => $shortname."_home_description",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Home Keywords",  
    "desc" => "Enter the META keywords of your homepage here (separated by commas).",  
    "id" => $shortname."_home_keywords",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Optional Home Title",  
    "desc" => "Enter an alternative title of your homepage here (default is site tagline).",  
    "id" => "ne_home_title",  
    "type" => "text",  
    "std" => ""),


array( "type" => "close"),
array( "type" => "close-tab"),


// Callout Section

array( "id" => $shortname."-tab5",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Hide Callout Section",  
    "desc" => "Check this box to hide the Callout Section on the homepage.",  
    "id" => $shortname."_hide_callout",  
     "type" => "checkbox",  
    "std" => "false"), 
  
array( "name" => "Callout Title",  
    "desc" => "Enter callout title, you can use HTML.",  
    "id" => $shortname."_callout_title",  
    "type" => "text",
    "std" => ""),

array( "name" => "Callout Text",  
    "desc" => "Enter callout text, you can use HTML.",  
    "id" => $shortname."_callout_text",  
    "type" => "textarea",
    "std" => ""),

array( "name" => "Callout Button Text",  
    "desc" => "Enter text for your callout button",  
    "id" => $shortname."_callout_button_text",  
    "type" => "text",
    "std" => "BUY NOW"),
    
array( "name" => "Callout Button Link",  
    "desc" => "Enter a URL for the Callout button's link.",  
    "id" => $shortname."_callout_image_link",  
    "type" => "text",
    "std" => ""),

array( "type" => "close"), 

array( "type" => "close-tab"),


// neuro Slider

array( "id" => $shortname."-tab6",
	"type" => "open-tab"),

array( "type" => "open"),

array( "name" => "Hide Neuro Slider",  
    "desc" => "Check this box to hide the Feature Slider on the homepage.",  
    "id" => $shortname."_hide_slider",  
    "type" => "checkbox",  
    "std" => "false"),
    
array( "name" => "Select the slider type:",  
    "desc" => "(Choose between custom feature slides or a post category)",  
    "id" => $shortname."_slider_type",  
    "type" => "select4",  
    "std" => ""), 
    
array( "name" => "Select the slider placement:",  
    "desc" => "(Choose between the feature template or the posts page)",  
    "id" => $shortname."_slider_placement",  
    "type" => "select5",  
    "std" => ""), 
    
array( "name" => "Show posts from category:",  
    "desc" => "(Default is all - WARNING: do not enter a category that does not exist or slider will not display)",  
    "id" => $shortname."_slider_category",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Number of featured posts:",  
    "desc" => "(Default is 5)",  
    "id" => $shortname."_slider_posts_number",  
    "type" => "text",  
    "std" => ""),  
    
array( "name" => "Slider height:",  
    "desc" => "(Default is 330)",  
    "id" => $shortname."_slider_height",  
    "type" => "text",  
    "std" => ""),

array( "name" => "Slider delay time (in milliseconds):",  
    "desc" => "(Default is 3500)",  
    "id" => $shortname."_slider_delay",  
    "type" => "text",  
    "std" => ""),
    
array( "name" => "Choose the slider animation:",  
    "desc" => "(Default is random)",  
    "id" => $shortname."_slider_animation",  
    "type" => "select3",  
    "std" => ""), 
    
array( "name" => "Hide the navigation:",  
    "desc" => "Check to disable the slider navigation",  
    "id" => $shortname."_slider_navigation",    
   	"type" => "checkbox",
        "std" => "false"),   
  

array( "type" => "close"),   

array( "type" => "close-tab"),


// Footer

array( "id" => $shortname."-tab7",
	"type" => "open-tab"),

array( "type" => "open"),
  


array( "name" => "Hide the Boxes Section",  
    "desc" => "Check this box to hide the widgetized Boxes Section on the homepage.",  
    "id" => $shortname."_hide_boxes",  
      "type" => "checkbox",  
    "std" => "false"),
  
array( "name" => "Footer Copyright",  
    "desc" => "Enter Copyright text used on the right side of the footer. It can be HTML (default is your blog title)",  
    "id" => $shortname."_footer_text",  
    "type" => "textarea",  
    "std" => ""),
    
array( "name" => "Hide our link",  
    "desc" => "Check this box to hide the link back to CyberChimps.com.",  
    "id" => $shortname."_hide_link",  
      "type" => "checkbox",  
    "std" => "false"),
    
array( "type" => "close"),

array( "type" => "close-tab"),


// Import/Export

array( "id" => $shortname."-tab8",
	"type" => "open-tab"),

array( "type" => "open"),
  
array( "name" => "Import Neuro Settings",  
    "desc" => "To import your settings, Paste the Neuro Pro export code here and press Save Settings.",  
    "id" => $shortname."_import_code",  
    "type" => "import",  
    "process" => "neuro_import_options",
    "std" => ""), 
    
array( "name" => "Export Neuro Settings",  
    "desc" => "Copy the following code, Paste it into a text file and save it. This code can be used to import your settings into another Neuro Pro site.",  
    "id" => $shortname."_export_code",  
    "type" => "export",  
    "std" => ""), 
    
array( "type" => "close"),

array( "type" => "close-tab"),


);  


/**
 * Create the options page
 */
function theme_options_do_page() {
	global $themename, $shortname, $optionlist,  $select_font, $select_color, $select_background, $select_background2, $select_slider_effect, $select_slider_type, $select_slider_placement;
  

	if ( ! isset( $_REQUEST['updated'] ) ) {
		$_REQUEST['updated'] = false; 
} 
  if( isset( $_REQUEST['reset'] )) { 
            global $wpdb;
            $query = "DELETE FROM $wpdb->options WHERE option_name LIKE 'neuro'";
            $wpdb->query($query); 
            die;
            
     } 
   
?>

	<div class="wrap">
  

<?php if ( function_exists('screen_icon') ) screen_icon(); ?>

      
<h2><?php echo $themename; ?> Settings</h2><br />


 <p>Need help? Follow the links below to visit our documentation pages and support forum:</p>
<a href="http://cyberchimps.com/neuropro/docs"><img src="<?php echo get_template_directory_uri();?>/images/docs.png?>" alt="Docs"> </a><a href="http://cyberchimps.com/forum"><img src="<?php echo get_template_directory_uri(); ?>/images/forum.png?>" alt="Forum"></a> 




		<?php if ( false !== $_REQUEST['updated'] ) { ?>
		<?php echo '<div id="message" class="updated fade" style="float:left;"><p><strong>'.$themename.' settings saved</strong></p></div>'; ?>
    
    <?php } if( isset( $_REQUEST['reset'] )) { echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset</strong></p></div>'; } ?>  
				


  <form method="post" action="options.php" enctype="multipart/form-data">
  
    <p class="submit" style="clear:left;">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>  
      
    <div id="tabs" style="clear:both;">   
    <ul class="tabNavigation">
        <li><a href="#ne-tab1"><span>General</span></a></li>
        <li><a href="#ne-tab2"><span>Design</span></a></li>
        <li><a href="#ne-tab3"><span>Header</span></a></li>
        <li><a href="#ne-tab4"><span>SEO</span></a></li>
        <li><a href="#ne-tab5"><span>Callout Section</span></a></li>
        <li><a href="#ne-tab6"><span>Neuro Slider</span></a></li>        
        <li><a href="#ne-tab7"><span>Footer</span></a></li>
        <li><a href="#ne-tab8"><span>Import/Export</span></a></li>
    
    
    </ul>
    
    <div class="tabContainer">
		
			<?php settings_fields( 'ne_options' ); ?>
			<?php $options = get_option( 'neuro' ); ?>

			<table class="form-table">   

      <?php foreach ($optionlist as $value) {  
switch ( $value['type'] ) {
 
case "open":
?>

<table width="100%" border="0" style="padding:10px;">

 
<?php break;
 
case "close":
?>


</table><br />
 
<?php break;


case "open-tab":
?>

<div id="<?php echo $value['id']; ?>">

 
<?php break;
 
case "close-tab":
?>


</div>
 
<?php break; 

case 'color1':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('neuro');

if (isset($options['ne_footer_color']) == "")
			$picker = '2C2C2C';
			
		else
			$picker = $options['ne_footer_color']; 
?>

<input type="text" class="color" id="neuro[ne_footer_color]" name="neuro[ne_footer_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'color2':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('neuro');

if (isset($options['ne_header_color']) == "")
			$picker = 'FBFBFB';
			
		else
			$picker = $options['ne_header_color']; 
?>

<input type="text" class="color" id="neuro[ne_header_color]" name="neuro[ne_header_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'color3':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('neuro');
$color = $options[('ne_color')];

if (isset($options['ne_link_color']) == "")
			$picker = '276DB3';
			
		else
			$picker = $options['ne_link_color']; 
?>

<input type="text" class="color" id="neuro[ne_link_color]" name="neuro[ne_link_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
<input type="checkbox" id="neuro[ne_enable_link_color]" name="neuro[ne_enable_link_color]" value="1" <?php checked( '1', $options['ne_enable_link_color'] ); ?>> - Check this box to enable this option and override any templates.    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'color4':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('neuro');


if (isset($options['ne_custom_menu_color']) == "")
			$picker = '276DB3';
			
		else
			$picker = $options['ne_custom_menu_color']; 
?>

<input type="text" class="color" id="neuro[ne_custom_menu_color]" name="neuro[ne_custom_menu_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
<input type="checkbox" id="neuro[ne_enable_menu_color]" name="neuro[ne_enable_menu_color]" value="1" <?php checked( '1', $options['ne_enable_menu_color'] ); ?>> - Check this box to enable this option and override any templates.    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'color5':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    
    <?php
$options = get_option('neuro');


if (isset($options['ne_menu_font_color']) == "")
			$picker = 'FFFFFF';
			
		else
			$picker = $options['ne_menu_font_color']; 
?>

<input type="text" class="color" id="neuro[ne_menu_font_color]" name="neuro[ne_menu_font_color]"  value="<?php echo $picker ;?>" style="width: 300px;">   

<br /><br />
<input type="checkbox" id="neuro[ne_enable_menu_font_color]" name="neuro[ne_enable_menu_font_color]" value="1" <?php checked( '1', $options['ne_enable_menu_font_color'] ); ?>> - Check this box to enable this option and override any templates.    
    </td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;



case 'radio':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="42%">

<?php
		foreach ( $select_background as $bg ) {						
?>

<?php  
		if ($options['ne_background'] == "")
			$background = 'woodlight-background';
			
		else
			$background = $options['ne_background']; 
			?>

<input type="radio" id="<?php echo 'neuro['.$value['id'].']'; ?>" name="<?php echo 'neuro['.$value['id'].']'; ?>" value="<?php echo esc_attr( $bg['value'] ); ?>" <?php if ($background  == $bg['value'] ) { echo 'checked="checked"' ; } ?>" />
								
	<img src="<?php echo esc_url( $bg['thumbnail'] ); ?>"/>								
									
	<?php
		}
?>

<br />

<?php
		foreach ( $select_background2 as $bg2 ) {						
?>

<input type="radio" id="<?php echo 'neuro['.$value['id'].']'; ?>" name="<?php echo 'neuro['.$value['id'].']'; ?>" value="<?php echo esc_attr( $bg2['value'] ); ?>" <?php if ($background  == $bg2['value'] ) { echo 'checked="checked"' ; } ?>" />
								
	<img src="<?php echo esc_url( $bg2['thumbnail'] ); ?>"/>								
									
	<?php
		}
?>

<br /><br />

<input type="checkbox" id="neuro[ne_disable_background]" name="neuro[ne_disable_background]" value="1" <?php checked( '1', $options['ne_disable_background'] ); ?>> - Check this box to disable Neuro Backgrounds and use the <a href="<?php echo home_url(); ?>/wp-admin/themes.php?page=custom-background" />WordPress Custom Background</a> option.

<br />

</td>

</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php break;


case 'import':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'neuro['.$value['id'].']'; ?>" name="<?php echo 'neuro['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'export':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'neuro['.$value['id'].']'; ?>" name="<?php echo 'neuro['.$value['id'].']'; ?>" style="width:600px; height:300px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo (serialize($options));?></textarea></td>  

 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

 
case 'textarea':
?>
 
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong></label> <br /><small><?php echo $value['desc']; ?></small> </td> 
    <td width="85%"><textarea id="<?php echo 'neuro['.$value['id'].']'; ?>" name="<?php echo 'neuro['.$value['id'].']'; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php echo stripslashes( $options[$value['id']] ); ?></textarea></td>  
 
  
 </tr>
 <tr>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr>
<?php break; 

case 'text':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%"><input style="width:300px;" name="<?php echo 'neuro['.$value['id'].']'; ?>" id="<?php echo 'ne['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" /></td>

  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;

case 'twitter':  
?>  
  
<tr>

    <td width="15%" rowspan="2" valign="middle"><label for="<?php echo $value['id']; ?>"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></label>  </td>
    <td width="85%">
    <br />
    <input style="width:300px;" name="<?php echo 'neuro['.$value['id'].']'; ?>" id="<?php echo 'ne['.$value['id'].']'; ?>" type="<?php echo $value['type']; ?>" value="<?php if (  $options[$value['id']]  != "") { echo esc_attr($options[$value['id']]) ; } else { echo esc_attr($value['std']) ; } ?>" />

<br /><br />

<input type="checkbox" id="neuro[ne_enable_twitter]" name="neuro[ne_enable_twitter]" value="1" <?php checked( '1', $options['ne_enable_twitter'] ); ?>> - Check this box to enable the Twitter Bar on the Neuro Pro Homepage
</td>
  </tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>



<?php
break;


case 'select1':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'neuro['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_font as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;


case 'select2':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'neuro['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_color as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;
case 'select3':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'neuro['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_effect as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select4':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'neuro['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_type as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

case 'select5':
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%"><select style="width:300px;" name="<?php echo 'neuro['.$value['id'].']'; ?>">

<?php
								$selected = $options[$value['id']];
								$p = '';
								$r = '';

								foreach ( $select_slider_placement as $option ) {
									$label = $option['label'];
									if ( $selected == $option['value'] ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $option['value'] ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $option['value'] ) . "'>$label</option>";      
								}
								echo $p . $r;   
							?>    

</select></td>
</tr> 
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php
break;

 
case "checkbox":
?>
<tr>
<td width="15%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong><br /><small><?php echo $value['desc']; ?></small></td>
<td width="85%">
<input type="checkbox" name="<?php echo 'neuro['.$value['id'].']'; ?>" id="<?php echo 'neuro['.$value['id'].']'; ?>" value="1" <?php checked( '1', $options[$value['id']] ); ?>/>
</td>
</tr>
 
<tr>

</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ddd;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>


<?php break;
 
}
}
?>
      </div>  
    </div>    

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Settings" />   
			</p>
		</form>

    
    <form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
&nbsp;&nbsp;&nbsp;<small>WARNING, THIS RESTORES TO DEFAULT</small>
</p>
</form> 


	</div>
	<?php
}



function theme_options_validate( $input ) {
	global  $select_font, $select_color, $select_background, $select_background2, $select_slider_effect, $select_slider_type, $select_slider_placement;

	// Assign checkbox value
  
  if ( ! isset( $input['ne_hide_callout'] ) )
		$input['ne_hide_callout'] = null;
	$input['ne_hide_callout'] = ( $input['ne_hide_callout'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['ne_show_fb_like'] ) )
		$input['ne_show_fb_like'] = null;
	$input['ne_show_fb_like'] = ( $input['ne_show_fb_like'] == 1 ? 1 : 0 ); 
  
  
     if ( ! isset( $input['ne_hide_slider'] ) )
		$input['ne_hide_slider'] = null;
	$input['ne_hide_slider'] = ( $input['ne_hide_slider'] == 1 ? 1 : 0 ); 
  
  
    if ( ! isset( $input['ne_hide_boxes'] ) )
		$input['ne_hide_boxes'] = null;
	$input['ne_hide_boxes'] = ( $input['ne_hide_boxes'] == 1 ? 1 : 0 ); 
  
     if ( ! isset( $input['ne_hide_link'] ) )
		$input['ne_hide_link'] = null;
	$input['ne_hide_link'] = ( $input['ne_hide_link'] == 1 ? 1 : 0 ); 
	
	  if ( ! isset( $input['ne_slider_navigation'] ) )
		$input['ne_slider_navigation'] = null;
	$input['ne_slider_navigation'] = ( $input['ne_slider_navigation'] == 1 ? 1 : 0 ); 
  
	if ( ! isset( $input['ne_disable_background'] ) )
		$input['ne_disable_background'] = null;
	$input['ne_disable_background'] = ( $input['ne_disable_background'] == 1 ? 1 : 0 ); 
	
	if ( ! isset( $input['ne_enable_link_color'] ) )
		$input['ne_enable_link_color'] = null;
	$input['ne_enable_link_color'] = ( $input['ne_enable_link_color'] == 1 ? 1 : 0 ); 
	
	
	if ( ! isset( $input['ne_enable_menu_color'] ) )
		$input['ne_enable_menu_color'] = null;
	$input['ne_enable_menu_color'] = ( $input['ne_enable_menu_color'] == 1 ? 1 : 0 ); 
	
	
	if ( ! isset( $input['ne_enable_menu_font_color'] ) )
		$input['ne_enable_menu_font_color'] = null;
	$input['ne_enable_menu_font_color'] = ( $input['ne_enable_menu_font_color'] == 1 ? 1 : 0 ); 
	
	
	if ( ! isset( $input['ne_enable_twitter'] ) )
		$input['ne_enable_twitter'] = null;
	$input['ne_enable_twitter'] = ( $input['ne_enable_twitter'] == 1 ? 1 : 0 ); 
	
  	// Strip HTML from certain options
  	
  /* $input['ne_logo'] = wp_filter_nohtml_kses( $input['ne_logo'] ); */
  
   $input['ne_facebook'] = wp_filter_nohtml_kses( $input['ne_facebook'] ); 
    
   $input['ne_twitter'] = wp_filter_nohtml_kses( $input['ne_twitter'] ); 
  
   $input['ne_linkedin'] = wp_filter_nohtml_kses( $input['ne_linkedin'] );   
  
   $input['ne_youtube'] = wp_filter_nohtml_kses( $input['ne_youtube'] );  
  
   $input['ne_rsslink'] = wp_filter_nohtml_kses( $input['ne_rsslink'] );  
  
   $input['ne_email'] = wp_filter_nohtml_kses( $input['ne_email'] );   
  
 

	return $input;    

}

?>
<?php

/* Custom Menu */   
  
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}


// Add scripts and stylesheet

  function ne_scripts() {
        wp_enqueue_script('nejquery');
        wp_enqueue_script('nejqueryui');
        wp_enqueue_script('nejquerycookie');
        wp_enqueue_script('necookie');
        wp_enqueue_script('nemcolor');
   }
    
 function ne_styles() {
       wp_enqueue_style('necss');
   }

/* Redirect after activation */

if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
	
if ( isset( $_REQUEST['reset'] ))
  wp_redirect( 'themes.php?page=theme_options' );
  
  if ( isset( $_REQUEST['updated'] ))

  $options = get_option('neuro') ; 
  $checkimport = $options['ne_import_code'];
		
		if ($checkimport != '' ) {
			
			$options = get_option('neuro') ;  
			$import = $options['ne_import_code'];
			
			$options_array = (unserialize($import));
  			update_option( 'neuro', $options_array );
		}   		
	
	
?>                                                                                                                                                                                                                                