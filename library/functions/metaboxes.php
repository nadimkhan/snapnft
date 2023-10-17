<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load meta box configurations based on the current screen and conditions.
function mbf_load_metabox_configurations() {
    $current_template = get_page_template_slug( get_the_ID() );
   // error_log('Current Template in mbf_load_metabox_configurations: ' . $current_template);

    if ('custom-page.php' === $current_template ) {
        include_once get_template_directory() . '/library/functions/metaboxes/custom-page-metabox.php';
    }
    if ('front-page.php' === $current_template ) {
        include_once get_template_directory() . '/library/functions/metaboxes/frontpage-metabox.php';
    }
}
add_action( 'add_meta_boxes', 'mbf_load_metabox_configurations' );
