<?php
class MBF_Field_File_Upload {

    public static function render( $field ) {
        $is_repeater = isset($field['repeater']) && $field['repeater'];

        if ($is_repeater) {            
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
            if($value) {
                    echo '<div class="file-preview" data-field-id="' . esc_attr( $field['id'] ) . '">';
                    echo '<i class="dashicons dashicons-media-default file-icon"></i>';
                    echo '<p class="file-name">' . basename(esc_url($value)) . '</p>';
                    echo '<i class="file-delete dashicons dashicons-no-alt"></i>';
                    echo '</div>';
            }
                echo '<input type="button" class="button mbf-file-upload" data-field-id="' . esc_attr( $field['id'] ) . '" value="Upload File" style="display:' . ($value ? 'none' : 'inline-block') . ';">';
                echo '<input type="hidden" id="' . esc_attr( $field['id'] ) . '" name="' . esc_attr( $field['id'] ) . '" value="' . esc_url($value) . '">';
            echo '</div>';
        echo '</div>';
    }
}
?>
