<?php 
// fields/select.php

class MBF_Field_Select {

    public static function render($field) {
        if (isset($field['repeater']) && $field['repeater']) {
            $value = isset($field['value']) ? $field['value'] : '';
        } else {
            $value = get_post_meta(get_the_ID(), $field['id'], true);
        }
        
        $name = $field['id'];
    
       // error_log('Rendering select field with ID: ' . $field['id'] . ' and value: ' . $value);
    
        echo '<div class="mbf-field postbox">';
            echo '<div class="mbf-label-desc form-field">';
                echo '<label>' . esc_html($field['name']) . '</label>';
                if (isset($field['desc'])) {
                    echo '<p class="description">' . esc_html($field['desc']) . '</p>';
                }
            echo '</div>';
            echo '<div class="mbf-input">';
                echo '<select name="' . esc_attr($name) . '">';
                    echo '<option value="">-- Select --</option>'; // Default blank option
                    foreach ($field['options'] as $option_value => $option_label) {
                        $selected = $value == $option_value ? 'selected' : '';                        
                        echo '<option value="' . esc_attr($option_value) . '" ' . $selected . '>' . esc_html($option_label) . '</option>';
                    }
                echo '</select>';
            echo '</div>';
        echo '</div>';
    }
}



?>