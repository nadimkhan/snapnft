<?php
$theme_info = wp_get_theme();
$theme_title = $theme_info->get('Name');
$theme_version = $theme_info->get('Version');
$theme_shortname = strtolower(str_replace(" ","",$theme_title)) . "_";
$uploads_dir = wp_upload_dir();
/*------------------------------------------
 *   Global Variables
 *------------------------------------------*/
 $gtheme_options = new stdClass();
/*------------------------------------------
 *   Main Constants
 *------------------------------------------*/
define("GTHEME_THEMENAME", $theme_title);
define("GTHEME_SHORTNAME", $theme_shortname);
define("GTHEME_VERSION", $theme_version);
define("GTHEME_LIB", TEMPLATEPATH . '/library/');
define("GTHEME_LIB_URI", get_template_directory_uri(). '/library/');
define("GTHEME_FUNCTIONS", GTHEME_LIB . 'functions/');
define("GTHEME_FUNCTIONS_URI", GTHEME_LIB_URI . 'functions/');
define("GTHEME_CLASSES", GTHEME_LIB . 'classes/');
define("GTHEME_CLASSES_URI", GTHEME_LIB_URI . 'classes/');
define("GTHEME_OPTIONS", GTHEME_LIB . 'options/');
define("GTHEME_SCRIPTS", GTHEME_LIB_URI . 'scripts/');
define("GTHEME_STYLES", GTHEME_LIB_URI . 'styles/');
define("GTHEME_ADMIN_IMAGES", GTHEME_LIB . 'images/');
define("GTHEME_IMAGES", get_template_directory_uri(). '/images/');
define("GTHEME_UPLOADS_DIR", $uploads_dir['url']);
define("GTHEME_UTILS", GTHEME_LIB_URI . 'utilities/');
define('GTHEME_PATTERNS', GTHEME_IMAGES .'pattern_samples/');
define('GTHEME_META_PATH', GTHEME_CLASSES_URI .'meta-box-framework/');



define("GTHEME_SETTINGS_PAGE", 'core-functions.php');
//echo GTHEME_FUNCTIONS;
function upload_relative_path(){
	$rel_path_arr = wp_upload_dir();
	$rel_path = $rel_path_arr['path'];
	define('WP_IMAGE_UPLOAD_DIR', str_replace("\\","/",$rel_path_arr['path']));
	return WP_IMAGE_UPLOAD_DIR;
}

function upload_url(){
$path_arr = wp_upload_dir();
	$url_path = $path_arr[url];
	return $url_path;
}
require_once(GTHEME_FUNCTIONS. 'metaboxes.php');


require_once (GTHEME_CLASSES. '/meta-box-framework/core.php');
//require_once (GTHEME_CLASSES. '/tax-meta-class/tax-meta-class.php');
//require_once(GTHEME_FUNCTIONS. 'custom-post-types.php');
//require_once(GTHEME_FUNCTIONS. 'custom-taxonomies.php');
//require_once(GTHEME_FUNCTIONS. 'taxonomy-meta.php');	
//require_once(GTHEME_FUNCTIONS. 'theme-ajax-functions.php');
//require_once(GTHEME_FUNCTIONS. 'custom-controllers.php');
require_once(GTHEME_FUNCTIONS. 'theme-supports-enqueue.php');
//require_once(GTHEME_FUNCTIONS. 'tailwindcss_walker.php');

Meta_Box_Framework_Core::get_instance();


function slugify($text){ 
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '_', $text);
  // trim
  $text = trim($text, '_');
  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  // lowercase
  $text = strtolower($text);
  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text)){
    return 'n-a';
  }
  return $text;
}

function get_published_post_counts($post_type){
	$count = wp_count_posts($post_type);
	$result = '<a href="'.admin_url('edit.php?post_status=publish&post_type='.$post_type).'">Published ('.$count->publish.')</a> &nbsp;|&nbsp;&nbsp;';
	return $result;
}
function get_draft_post_counts($post_type){
	$count = wp_count_posts($post_type);
	$result = '<a href="'.admin_url('edit.php?post_status=draft&post_type='.$post_type).'">Draft ('.$count->draft.')</a>';
	return $result;
}
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

// Directly register a test meta box for debugging.
/*function mbf_direct_meta_box_registration() {
  add_meta_box(
      'mbf_test_meta_box',
      'Test Meta Box',
      'mbf_display_test_meta_box',
      'page',
      'normal',
      'high'
  );
}
add_action( 'add_meta_boxes', 'mbf_direct_meta_box_registration' );

// Display content for the test meta box.
function mbf_display_test_meta_box() {
  echo 'This is a test meta box content.';
}
*/


?>