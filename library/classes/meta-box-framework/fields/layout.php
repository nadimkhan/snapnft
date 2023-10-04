<?php 
// fields/layout.php
class MBF_Field_Layout {

    public static function render($field) {
        //error_log(print_r($field, true)); // Log the $field data

        $value = '';
    
        // Handling repeater field
        if (isset($field['repeater']) && $field['repeater'] === true) {
            $repeater_values = get_post_meta(get_the_ID(), $field['repeater_id'], true);
            preg_match('/\\[(\\w+)\\]$/', $field['id'], $matches);
            $sub_field_id = $matches[1] ?? '';
    
            if (isset($repeater_values[$field['repeater_index']][$sub_field_id])) {
                $value = $repeater_values[$field['repeater_index']][$sub_field_id];
            }
        } else {
            $value = get_post_meta(get_the_ID(), $field['id'], true);
        }
    
        $value = $value ?: ($field['default'] ?? '');
    
        // Start rendering
        if (!isset($field['repeater']) || !$field['repeater']) {
            echo '<div class="mbf-field postbox">';
            echo '<div class="mbf-label-desc form-field">';
            echo '<label for="' . esc_attr($field['id']) . '">' . esc_html($field['name']) . '</label>';
            if (isset($field['desc'])) {
                echo '<p class="description">' . esc_html($field['desc']) . '</p>';
            }
            echo '</div>';
            echo '<div class="mbf-input">';
        }
    
       // ... (previous code)

// ... (previous code)
if (isset($field['type']) && ($field['type'] === 'layout_radio' || $field['type'] === 'layout_checkbox')) {
    if (isset($field['layouts']) && is_array($field['layouts']) && !empty($field['layouts'])) {
        foreach ($field['layouts'] as $index => $layout) {
            echo '<div class="collapsible-box">';
            echo '  <div class="box-header">';
            $sanitized_template = $layout['template'];
            echo '    <label class="layout-option">';
            
            // Determine input type and name based on field type
            $inputType = $field['type'] === 'layout_radio' ? 'radio' : 'checkbox';
            
            // Adjust the input name to generate the desired $_POST structure
            $inputName = $field['type'] === 'layout_radio' ? "{$field['id']}[template]" : "{$field['id']}[{$index}][template]";

            
            // Render input element
            echo "      <input type='{$inputType}' name='{$inputName}' value='{$sanitized_template}' class='layout-input'>";
            echo '<img src="' . esc_url($layout['image']) . '" class="layout_image">';
            echo '</label>';
            
            echo '    <div class="icons">';
            echo '      <span class="dashicons dashicons-arrow-down-alt2"></span>';
            echo '      <span class="dashicons dashicons-move"></span>';
            echo '    </div>';
            echo '  </div>';
            echo '  <div class="box-content" style="display:none;">';
            echo '<div class="layout-fields fields-for-' . esc_attr($sanitized_template) . '">';
            
            if (isset($layout['groups']) && is_array($layout['groups'])) {
                foreach ($layout['groups'] as $group) {
                    if (isset($group['fields']) && is_array($group['fields'])) {
                        foreach ($group['fields'] as $sub_field) {
                            // Adjust the input name for sub-fields to generate the desired $_POST structure
                            $subFieldName = $field['type'] === 'layout_radio' ? "{$field['id']}[fields][{$sub_field['id']}]" : "{$field['id']}[$index][fields][{$sub_field['id']}]";
                            $sub_field['id'] = $subFieldName;
                            self::render_field($sub_field, $field['id']); // Recursive call to render for nested fields
                        }
                    }
                }
            }
            
            echo '</div>'; // Close layout-fields
            echo '  </div>'; // Close box-content
            echo '</div>'; // Close collapsible-box
        }
    } else {
        error_log('Warning: $field[\'layouts\'] is not set or empty in ' . __FILE__);
    }
}



// ... (rest of the code)


    
        if (!isset($field['repeater']) || !$field['repeater']) {
            echo '</div>'; // Close mbf-input
            echo '</div>'; // Close mbf-field postbox
        }
    }
    
    
    

    private static function render_field($sub_field, $field_id) {
        // Set default value if not provided
        $value = $sub_field['default'] ?? '';

        // Common arguments for all field types
        $common_args = array(
            'id' => $field_id . '[' . $sub_field['id'] . ']',
            'name' => $sub_field['id'],
            'value' => $value,
            'desc' => $sub_field['desc'] ?? '',
            'label' => $sub_field['name'],
            'sub_fields' => array()
        );

        

        // Switch based on field type
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
                    $common_args['content_types'] = $sub_field['content_types'];                }
                MBF_Field_Content_Select::render($common_args);
            break;
            case 'wysiwyg':
                $common_args['name'] = $field_id . '[' . $sub_field['id'] . ']';
                $temp_id = str_ireplace('][', '_', $common_args['id']);
                $second_temp_id = str_ireplace(']','',$temp_id);
                $editor_id = str_ireplace('[','_', $second_temp_id);
                $common_args['id'] = $editor_id;
                $common_args['is_group'] = 'true';         
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
            case 'repeater':
                if (isset($sub_field['sub_fields']) && is_array($sub_field['sub_fields'])) {
                    $common_args['sub_fields'] = $sub_field['sub_fields'];
                } else {
                    $common_args['sub_fields'] = array(); // or handle this case as appropriate
                }
                MBF_Field_Repeater::render($common_args);
                break;
             
  

            // ... Add other field types as needed
        }
    }
}
?>
