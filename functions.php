<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {
	   	// <script src="assets/scripts/jquery.js"></script>
		// <script src="owlcarousel/dist/owl.carousel.min.js"></script>
		// <script src="assets/scripts/script.js"></script>

        wp_deregister_script('jquery');
		wp_register_script('jquery', ASSETS_URL . '/assets/scripts/jquery.js', false, false, true);
		wp_register_script('owlcarousel', ASSETS_URL . '/assets/scripts/owl.carousel.min.js', array('jquery'), false, true);
		wp_register_script('script', ASSETS_URL . '/assets/scripts/script.js', array('owlcarousel'), false, true);
        // wp_register_script('js_main', ASSETS_URL . '/assets/js/main.js', array('jquery'), '1.0', true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('owlcarousel');
        wp_enqueue_script('script');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/main.css';

	if( $styles_path ) {
		// <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i|Marcellus|Roboto:300,300i,400&amp;subset=latin-ext" rel="stylesheet">
		// <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		// <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css">
		// <link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.min.css">
		// <link rel="stylesheet" href="assets/css/style.css">
		wp_register_style('gfonts', "https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i|Marcellus|Roboto:300,300i,400&amp;subset=latin-ext" , array(), false, 'all');
		wp_register_style('fontawesome', ASSETS_URL . '/assets/css/font-awesome.min.css', array('gfonts'), false, 'all');
		wp_register_style('owlcarousel', ASSETS_URL . '/assets/css/owl.carousel.min.css', array('fontawesome'), false, 'all');
		wp_register_style('owlcarouseltheme', ASSETS_URL . '/assets/css/owl.theme.default.min.css', array('owlcarousel'), false, 'all');
		wp_register_style('style', ASSETS_URL . '/assets/css/style.css', array('owlcarouseltheme'), false, 'all');
		// wp_register_style('main-css', ASSETS_URL . '/assets/css/main.css', array(), false, 'all');

		// UZREGISTRAVOME FAILUS, DABAR PAGAL NICKNAME REIKIA UZKRAUTI
		wp_enqueue_style('gfonts');
		wp_enqueue_style('fontawesome');
		wp_enqueue_style('owlcarousel');
		wp_enqueue_style('owlcarouseltheme');
		wp_enqueue_style('style');
	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

// Apibrėžiame navigacijas

function register_theme_menus() {
   
	register_nav_menus(array( 
        'primary-navigation' => __( 'Primary Navigation', 'vcs-starter' ) 
    ));
}

add_action( 'init', 'register_theme_menus' );

// Apibrėžiame widgets juostas

#$sidebars = array( 'Footer Widgets', 'Blog Widgets' );

if( isset($sidebars) && !empty($sidebars) ) {

	foreach( $sidebars as $sidebar ) {

		if( empty($sidebar) ) continue;

		$id = sanitize_title($sidebar);

		register_sidebar(array(
			'name' => $sidebar,
			'id' => $id,
			'description' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

// Custom posts

$themePostTypes = array(
//'Testimonials' => 'Testimonial'

);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = 'vcs-starter' . '-' . sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

function dump($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function special_nav_class($classes, $item){
    if (in_array('current-menu-item', $classes)){
        $classes[] = 'selected';
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'special_nav_class' , 10 , 2);

// Paveiksliuku dydziai ("Wordpress 5 Logo, Main Menu", 1:23:18)
// add_image_size('pavadinimas', plotis, ilgis, ar_apkirpti_paveiksleli);
// add_image_size('logo', 120, 35, false);
add_image_size('voucher_background', 1280, 726, false);

?>