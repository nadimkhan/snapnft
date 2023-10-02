<?php
// fields/checkbox.php
class MBF_Field_Checkbox {

    public static function render( $field ) {
        // Determine if this field is part of a repeater and retrieve the appropriate value
        $value = isset($field['repeater']) && $field['repeater'] === true 
                 ? ($field['value'] ?? array()) 
                 : get_post_meta(get_the_ID(), $field['id'], true);
        
        $value = !empty($value) ? (array) $value : array(); // Cast saved values to an array

        // Determine the name attribute
       // fields/checkbox.php
            $name = isset($field['repeater']) && $field['repeater'] === true 
            ? $field['id'] . '[]'
            : $field['id'] . '[]';

    
        echo '<div class="mbf-field postbox">';
            echo '<div class="mbf-label-desc form-field" >';
                echo '<label>' . esc_html( $field['name'] ) . '</label>';
                if ( isset( $field['desc'] ) ) {
                    echo '<p class="description">' . esc_html( $field['desc'] ) . '</p>';
                }
                echo '</div>';
                echo '<div class="mbf-input">';
                    echo '<div class="mbf-form-element mbf-radio-options">';                    
                    foreach ( $field['options'] as $option_value => $option_label ) {
                        $checked = in_array( $option_value, $value ) ? 'checked' : '';                        
                        echo '<label class="input-label">';
                        echo '<input type="checkbox" name="' . esc_attr( $name ) . '" value="' . esc_attr( $option_value ) . '" ' . $checked . '> ';
                        echo esc_html( $option_label );
                        echo '</label>';
                    }
                    echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    
}


?>
