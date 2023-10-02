<?php
class MBF_Field_Repeater {

    public static function render( $field ) {
        $values = get_post_meta(get_the_ID(), $field['id'], true);
        $sub_fields = $field['sub_fields'] ?? array(); // Use the sub_fields from $field
        $layouts = $sub_field['layouts'] ?? array(); // or another default value


        echo '<div class="mbf-field postbox mbf-repeater-block-main">';
            echo '<div class="mbf-label-desc form-field">';
                echo '<label>' . esc_html( $field['name'] ) . '</label>';
                if ( isset( $field['desc'] ) ) {
                    echo '<p class="description">' . esc_html( $field['desc'] ) . '</p>';
                }
            echo '</div>';
            echo '<div class="mbf-input">';

            // Template for the repeater item
            echo '<div class="mbf-repeater-template" style="display: none;">';
            echo '<div class="mbf-repeater-header">';
                echo '<span class="dashicons dashicons-arrow-down-alt2 mbf-repeater-collapse"></span>';
                echo '<span class="dashicons dashicons-trash mbf-repeater-remove"></span>';
                echo '<span class="dashicons dashicons-move mbf-repeater-drag"></span>';
            echo '</div>';
          //  if (isset($field['sub_fields'])) { // Check if sub_fields key exists
                foreach ($field['sub_fields'] as $sub_field) {
                    echo '<div class="mbf-sub-field">';
                        echo '<div class="mbf-label-desc form-field">';
                            echo '<label>' . esc_html( $sub_field['label'] ) . '</label>';
                        echo '</div>';
                        echo '<div class="mbf-input">';
                        
                        // Use the respective field type class to render the field
                        self::render_field($sub_field, $field['id']);

                        echo '</div>';
                    echo '</div>';
                }
          //  }
            echo '</div>'; // Close the template

            // Loop through saved values and display them
            if (is_array($values)) {
                foreach ($values as $index => $value_group) {
                    // Check if the current repeater block has any non-empty sub-fields
                    $has_data = array_reduce($value_group, function($carry, $item) {
                        return $carry || !empty($item);
                    }, false);
            
                    if (!$has_data) {
                        continue; // Skip this block if it doesn't have any data
                    }
                    echo '<div class="mbf-repeater-item">';
                    echo '<div class="mbf-repeater-header">';
                        echo '<span class="dashicons dashicons-arrow-down-alt2 mbf-repeater-collapse" onclick="console.log("Click directly from html")"></span>';
                        echo '<span class="dashicons dashicons-trash mbf-repeater-remove"></span>';
                        echo '<span class="dashicons dashicons-move mbf-repeater-drag"></span>';
                    echo '</div>';
                    foreach ($field['sub_fields'] as $sub_field) {
                        $original_sub_field_id = $sub_field['id'];

                        $value = isset($value_group[$original_sub_field_id]) ? $value_group[$original_sub_field_id] : '';
            
                        echo '<div class="mbf-sub-field">';
                            echo '<div class="mbf-label-desc form-field">';
                                echo '<label>' . esc_html( $sub_field['name'] ) . '</label>';
                            echo '</div>';
                        
                        echo '<div class="mbf-input">';
                        
                        // Use the respective field type class to render the field with saved values
                        self::render_field($sub_field, $field['id'], $value, $index);

                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            }

            // Add New button
            echo '<button class="mbf-repeater-add">Add New</button>';
            echo '</div>'; // Close mbf-field postbox
        echo '</div>'; // Close main div
    }

    private static function render_field($sub_field, $field_id, $value = '', $index = '__index__') {
        // Default value check
        $value = empty($value) && isset($sub_field['default']) ? $sub_field['default'] : $value;
    
        // Common arguments for all field types
        $common_args = array(
            'id' => $field_id . '[' . $index . '][' . $sub_field['id'] . ']',
            'name' => $sub_field['label'],
            'value' => $value,
            'desc' => isset($sub_field['desc']) ? $sub_field['desc'] : '',
            'repeater' => true,
            'repeater_id' => $field_id,
            'repeater_index' => $index,
            //'layouts' => $sub_field['layouts'], // Ensure layouts array is passed

        );
    
        //error_log('Value before switch in repeater.php: ' . print_r($value, true));
    
        switch ($sub_field['type']) {
            case 'text':
                $common_args['label'] = $sub_field['label'];
                MBF_Field_Text::render($common_args);
                break;
    
            case 'textarea':
                MBF_Field_Textarea::render($common_args);
                break;
    
            case 'radio':
                $common_args['options'] = $sub_field['options'];
                $common_args['default'] = isset($sub_field['default']) ? $sub_field['default'] : '';
                MBF_Field_Radio::render($common_args);
                break;
    
            case 'checkbox':
                $saved_value = is_array($value) ? $value : array();                
                $common_args['options'] = $sub_field['options'];
                $common_args['default'] = isset($sub_field['default']) ? $sub_field['default'] : '';
                $common_args['value'] = $saved_value;
                MBF_Field_Checkbox::render($common_args);
                break;
            
            case 'select':
                $common_args['options'] = $sub_field['options'];
                MBF_Field_Select::render($common_args);
                break;
            case 'content_select':
                if (isset($sub_field['content_types'])) {
                    $common_args['content_types'] = $sub_field['content_types'];
                }
                MBF_Field_Content_Select::render($common_args);
            break;
            case 'wysiwyg':        
                $temp_id = str_ireplace('][', '_', $common_args['id']);
                $second_temp_id = str_ireplace(']','',$temp_id);
                $editor_id = str_ireplace('[','_', $second_temp_id);
                $common_args['id'] = $editor_id ;
                MBF_Field_Wysiwyg::render($common_args);
            break;
            case 'date':
                $common_args['label'] = $sub_field['label'];
                MBF_Field_Date::render($common_args);
                break;
            case 'color':
                $common_args['label'] = $sub_field['label'];
                MBF_Field_Color::render($common_args);
            break;
            case 'time':
                $common_args['label'] = $sub_field['label'];
                MBF_Field_time::render($common_args);
            break;
            case 'image_upload':
                MBF_Field_Image_Upload::render($common_args, true);
            break; 
            case 'file_upload':
                MBF_Field_File_Upload::render($common_args);
            break; 
            case 'layout':
                MBF_Field_Layout::render($common_args);
            break; 
    
            // ... Add other field types as needed
        }
    }
    
}
?>