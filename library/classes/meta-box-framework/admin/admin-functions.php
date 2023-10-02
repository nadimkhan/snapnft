<?php
/**
 * Admin Functions for Meta Box Framework
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Include the text field class.
require_once MBF_PATH . 'fields/text.php';

/**
 * Register meta boxes.
 */
function mbf_register_meta_boxes() {
    add_meta_box(
        'mbf_sample_meta_box',          // Meta box ID
        'Sample Meta Box',              // Title
        'mbf_display_sample_meta_box',  // Callback function
        'post',                         // Post type
        'normal',                       // Context
        'high'                          // Priority
    );
}
add_action( 'add_meta_boxes', 'mbf_register_meta_boxes' );

/**
 * Display the sample meta box.
 *
 * @param WP_Post $post The post object.
 */
function mbf_display_sample_meta_box( $post ) {
    // Use nonce for verification.
    wp_nonce_field( 'mbf_meta_box_nonce', 'mbf_meta_box_nonce_field' );

    // Fetch the serialized data
    $serialized_data = get_post_meta($post->ID, 'serialized_meta_data', true);
    error_log(print_r($serialized_data, true));
    if (!$serialized_data) {
        $serialized_data = array();
    }

    // If the field is searchable, fetch its individual value
    // For the sake of this example, let's assume 'mbf_text_field' is your regular (non-searchable) field
    $text_value = isset($serialized_data['mbf_text_field']) ? $serialized_data['mbf_text_field'] : '';

    // Render the text field.
    MBF_Field_Text::render(
        array(
            'id'    => 'mbf_text_field',
            'name'  => 'Sample Text Field',
            'value' => $text_value,
            'desc'  => 'Enter some text here.'
        )
    );
}


/**
 * Save meta box data.
 *
 * @param int $post_id The post ID.
 */
function mbf_save_meta_box_data( $post_id ) {
    //error_log( 'mbf_save_meta_box_data triggered' );
    // Verify nonce.
    if ( ! isset( $_POST['mbf_meta_box_nonce_field'] ) || ! wp_verify_nonce( $_POST['mbf_meta_box_nonce_field'], 'mbf_meta_box_nonce' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check user permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $meta_boxes = apply_filters( 'mbf_meta_boxes', array() );
    //error_log( 'Meta boxes after filter: ' . count( $meta_boxes ) );

    $serialized_data = array();

    // Loop through each meta box and its fields
    foreach ( $meta_boxes as $meta_box ) {
        foreach ( $meta_box['fields'] as $field ) {
            //error_log( 'Processing field: ' . $field['id'] );
            $field_class = 'MBF_Field_' . ucfirst( $field['type'] );
            if ( class_exists( $field_class ) && method_exists( $field_class, 'save' ) ) {
                if (isset($field['searchable']) && $field['searchable']) {
                    call_user_func( array( $field_class, 'save' ), $post_id, $field );
                } else {
                    $serialized_data[$field['id']] = $_POST[$field['id']];
                }
            }
        }
    }

    // Save the serialized data
    update_post_meta($post_id, 'serialized_meta_data', $serialized_data);
}
add_action( 'save_post', 'mbf_save_meta_box_data' );

?>
