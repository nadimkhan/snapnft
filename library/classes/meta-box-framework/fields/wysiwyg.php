<?php 
// fields/wysiwyg.php

class MBF_Field_Wysiwyg {

    public static function render( $field ) {
    // Determine if this field is inside a repeater
    error_log(print_r($field, true));
    $is_repeater = isset($field['repeater']) && $field['repeater'];
    // Adjust the name, id, and value retrieval based on whether it's in a repeater
    $is_group = isset($field['is_group']) && $field['is_group'];
    
    if ($is_repeater) {           
        $value = isset($field['value']) ? $field['value'] : '';
    } else {        
        $value = get_post_meta(get_the_ID(), $field['id'], true);
    }
    $editor_id = $field['id'];

    if ($is_group) {       
        $original_name = $field['name'];
    } else {        // For standalone wysiwyg fields, set the name attribute to the id specified in the array
        $original_name = $field['id'];
    }
    
       
    
    

    echo '<div class="mbf-field postbox">';
        echo '<div class="mbf-label-desc form-field">';
            echo '<label>' . esc_html( $field['name'] ) . '</label>';
            if ( isset( $field['desc'] ) ) {
                echo '<p class="description">' . esc_html( $field['desc'] ) . '</p>';
            }
        echo '</div>';
        echo '<div class="mbf-input">';            
            if($is_repeater){
                $base_repeater_id = $field['repeater_id'];
                $repeater_index = $field['repeater_index'];
                $sub_field_id = str_replace($base_repeater_id . '_' . $repeater_index . '_', '', $editor_id);
                $original_name = $base_repeater_id . '[' . $repeater_index . '][' . $sub_field_id . ']';

                echo '<textarea id="' . esc_attr($editor_id) . '" name="' . esc_attr($original_name) . '" class="wp-editor-area">' . esc_textarea($value) . '</textarea>';

            } else {
                wp_editor( $value, $editor_id, array(
                    'textarea_name' => $original_name,
                    'media_buttons' => true,
                    'textarea_rows' => 10,
                ) );
            }
            


        echo '</div>';
    echo '</div>';
}

}
?>