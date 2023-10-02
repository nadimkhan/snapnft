<?php

/* Theme setup */
add_action( 'after_setup_theme', 'snapnft_nav_setup' );
    if ( ! function_exists( 'snapnft_nav_setup' ) ):
        function snapnft_nav_setup() {  
            register_nav_menu( 'categories', __( 'Category navigation', 'snapnfttheme' ) );
            register_nav_menu( 'primary', __( 'Primary navigation', 'snapnfttheme' ) );
        } endif;


  

// Code for themes
add_action( 'after_switch_theme', 'flush_rewrite_rules' );
add_action('wp_enqueue_scripts', 'add_theme_scripts', 11);
function add_theme_scripts(){		
    //wp_register_script('flowbite', 'https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js', '', true);
	wp_register_script('theme-script', get_template_directory_uri() . '/js/theme_scripts.js', array('jquery'), '20141112', true);
	wp_enqueue_script('theme-script');
	wp_localize_script('theme-script', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
    
	
}

/*snapnft Scripts*/
add_action('wp_enqueue_scripts', 'add_snapnft_scripts', 12);
function add_snapnft_scripts(){
	/*
	
	wp_register_script('snapnft-datepicker', get_template_directory_uri() . '/library/js/bootstrap-datepicker.min.js', false, '20141112', true);
    wp_register_script('snapnft-slick', get_template_directory_uri() . '/library/js/slick.js', false, '20141112', true);
	wp_register_script('snapnft', get_stylesheet_directory_uri() . '/js/main.js', array('snapnft-datepicker', 'snapnft-slick') , '20141112', true);	
	
	wp_enqueue_script('snapnft');*/
	
}

function FontAwesome_icons() {    
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">';
}
add_action('wp_head', 'FontAwesome_icons');
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
		wp_register_style('parent-tailwind', get_template_directory_uri() . '/tailwind.css');	
    	wp_register_style('parent-style', get_template_directory_uri() . '/style.css', array('parent-tailwind'));
    	wp_enqueue_style( 'parent-style' );
}

add_theme_support('post-thumbnails', array('cp-zoonideals', 'cp-slide', 'cp-success-story', 'parent-fonts'));
if ( function_exists('add_image_size')) { 
    add_image_size('thumb_mini', 60, 60, true);
    add_image_size('thumb_small', 80, 80, true);
    add_image_size('thumb_medium', 120, 120, true);
    add_image_size('thumb_large', 175, 175, true);
    add_image_size('thumbnail', 225, 225, true);
}

function custom_body_class($classes) {
    // Add 'my-custom-class' to the $classes array
    $classes[] = "mt-[100px]";
    // Return the array
    return $classes;
}
// Add 'my_custom_body_class' function to the 'body_class' filter
add_filter('body_class', 'custom_body_class');


add_action( 'add_meta_boxes', 'attached_images_meta' );

function attached_images_meta() {
    $screens = array( 'cp-success-story', 'cp-zoonideals' ); //add more in here as you see fit
    foreach ($screens as $screen) {
        add_meta_box(
            'attached_images_meta_box', //this is the id of the box
            'Attached Images', //this is the title
            'attached_images_meta_box', //the callback
            $screen, //the post type
            'side' //the placement
        );
    }
}
function attached_images_meta_box($post){
    $args = array('post_type'=>'attachment','post_parent'=>$post->ID);
    $attachments = get_children($args);
    foreach ($attachments as $attachment_id => $attachment ) {
     $thumb = wp_get_attachment_image( $attachment_id, 'thumb_mini', true );
     echo '<a href="/wp-admin/media-upload.php?post_id='.$post->ID.'&tab=gallery" class="thickbox">'.$thumb.'</a>';
    }
    
}

function force_default_editor() {
    return 'tinymce';
}
if(!is_admin()){
    add_filter( 'wp_default_editor', 'force_default_editor' );
}

/*add_filter('post_type_link', 'store_permalink_structure', 10, 4);
function store_permalink_structure($post_link, $post, $leavename, $sample) {
    if (false !== strpos($post_link, '%store%')) {
        $store_type_term = get_the_terms($post->ID, 'store');
        if (!empty($store_type_term))
            $post_link = str_replace('%store%', array_pop($store_type_term)->slug, $post_link);
        else
            $post_link = str_replace('%store%', 'uncategorized', $post_link);
    }
    return $post_link;
}*/

?>