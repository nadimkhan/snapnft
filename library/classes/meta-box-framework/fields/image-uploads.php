<?php
class MBF_Field_Image_Upload {

    public static function render( $field ) {
        $is_repeater = isset($field['repeater']) && $field['repeater'];
        $is_group = isset($field['is_group']) && $field['is_group'];

        // Adjust the name and value retrieval based on whether it's in a repeater
        if ($is_repeater || $is_group) {            
            $value = isset($field['value']) ? $field['value'] : '';
        } else {            
            $value = get_post_meta(get_the_ID(), $field['id'], true);
        }

        echo '<div class="mbf-field postbox">';
            echo '<div class="mbf-label-desc form-field">';
                echo '<label>' . esc_html( $field['name'] ) . '</label>';
                if ( isset( $field['desc'] ) ) {
                    echo '<p class="description">' . esc_html( $field['desc'] ) . '</p>';
                }
            echo '</div>';
            echo '<div class="mbf-input">';

                $background_style = $value ? 'background-image:url(' . esc_url($value) . ');width:150px;height:150px;' : 'display:none;';
                echo '<div class="mbf-image-container" data-field-id="' . esc_attr( $field['id'] ) . '" style="' . $background_style . '">';
                echo '<span class="dashicons dashicons-no remove_image_button" style="' . ( $value ? '' : 'display:none;' ) . '"></span>';
                echo '</div>';

                echo '<div class="mbf-buttons-container">';
                echo '<input type="button" class="button mbf-image-upload" data-field-id="' . esc_attr( $field['id'] ) . '" value="Upload Image">';
                echo '<input type="hidden" id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['id'] ) . '" value="' . esc_url($value) . '">';
                echo '</div>';
            echo '</div>';
        echo '</div>';

        
    }
}



?>