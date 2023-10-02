<?php 
// fields/radio.php
class MBF_Field_Radio {

    public static function render( $field ) {
        $value = '';
        if (isset($field['repeater']) && $field['repeater'] === true) {
            $repeater_values = get_post_meta(get_the_ID(), $field['repeater_id'], true);
            // Extract the correct sub-field ID
            preg_match('/\[(\w+)\]$/', $field['id'], $matches);
            $sub_field_id = $matches[1] ?? '';

            if (isset($repeater_values[$field['repeater_index']][$sub_field_id])) {
                $value = $repeater_values[$field['repeater_index']][$sub_field_id];            
            }
        }
        
         else {
            $value = get_post_meta(get_the_ID(), $field['id'], true);
        }
        $value = $value ?: ($field['default'] ?? '');



        // Determine the name attribute
        $name = isset($field['repeater']) && $field['repeater'] === true 
                ? $field['id']  
                : $field['id'];

        // Handle nested repeater scenario
        if (strpos($name, '[__index__]') !== false) {
            $name = str_replace('[__index__]', '[' . $field['repeater_index'] . ']', $name);
        }
        

        echo '<div class="mbf-field postbox">';
            echo '<div class="mbf-label-desc form-field">';
                echo '<label for="' . esc_attr( $field['id'] ) . '">' . esc_html( $field['name'] ) . '</label>';
                if ( isset( $field['desc'] ) ) {
                    echo '<p class="description">' . esc_html( $field['desc'] ) . '</p>';
                }
            echo '</div>';
            echo '<div class="mbf-input">';
                echo '<div class="mbf-form-element mbf-radio-options">';
                foreach ( $field['options'] as $option_value => $option_label ) {
                    echo '<label class="input-label">';
                    echo '<input type="radio" name="' . esc_attr( $name ) . '" value="' . esc_attr( $option_value ) . '"' . checked( $value, $option_value, false ) . '>';
                    echo esc_html( $option_label );
                    echo '</label>';
                }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}
?>