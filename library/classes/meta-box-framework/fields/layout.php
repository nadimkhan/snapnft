<?php 
// fields/layout.php
class MBF_Field_Layout {

    public static function render($field) {
        //error_log(print_r($field, true)); // Log the $field data
        $saved_data = get_post_meta(get_the_ID(), $field['id'], true);
        //error_log('Saved Data: ' . print_r($saved_data, true));
        if (!is_array($saved_data)) {
            $saved_data = array();
        }

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
            $array_index = array_search($layout['template'], array_column($saved_data, 'template'));
            //error_log('Array Index:' . $array_index);
            $array_index = $array_index + 1;
            // Determine input type and name based on field type
            $inputType = $field['type'] === 'layout_radio' ? 'radio' : 'checkbox';            
            // Adjust the input name to generate the desired $_POST structure
            $inputName = $field['type'] === 'layout_radio' ? "{$field['id']}[template]" : "{$field['id']}[{$index}][template]";

            echo '<div class="collapsible-box" data-order="'. $array_index .'" data-input-type="' . $inputType . '">';
            echo '  <div class="box-header">';
            $sanitized_template = $layout['template'];
            echo '    <label class="layout-option">';
            
            

            // Check if this input should be checked
            $is_checked = '';
            if ($field['type'] === 'layout_radio' && isset($value['template']) && $value['template'] == $sanitized_template) {
                $is_checked = 'checked';
            } elseif ($field['type'] === 'layout_checkbox' && isset($value[$index]['template']) && $value[$index]['template'] == $sanitized_template) {
                $is_checked = 'checked';
            }

            // Render input element
            echo "      <input type='{$inputType}' name='{$inputName}' value='{$sanitized_template}' class='layout-input' {$is_checked}>";
            echo '<img src="' . esc_url($layout['image']) . '" class="layout_image">';
            echo '<div class="image-preview" style="display:none; background-image:url('. esc_url($layout['image']) .');"></div>';            
            echo '</label>';
            if($inputType == 'checkbox'){
                echo '<span class="order-display">' . $array_index .'</span><input type="hidden" name="item-order[]" class="order-input" value="' . $array_index .'">';
            }
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
                            $subFieldName = $field['type'] === 'layout_radio' ? "{$field['id']}[fields][{$sub_field['id']}]" : "{$field['id']}[{$index}][fields][{$sub_field['id']}]";
                            $sub_field['id'] = $subFieldName;
                            self::render_field($sub_field, $field['id'], $saved_data);  // Recursive call to render for nested fields
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
    
    
    

    private static function render_field($sub_field, $field_id, $saved_data) {
        // Set default value if not provided
            $value = $sub_field['default'] ?? '';

            // Extract the actual field ID from the sub_field['id']
            preg_match('/\[(\w+)\]$/', $sub_field['id'], $matches);
            $actual_sub_field_id = $matches[1] ?? '';

            // Retrieve the saved data using the actual field ID
            // Handle direct access
            if (isset($saved_data['fields'][$actual_sub_field_id])) {
                $value = $saved_data['fields'][$actual_sub_field_id];
            }
            // Handle indexed access
            elseif (is_array($saved_data)) {
                foreach ($saved_data as $index => $data) {
                    if (isset($data['fields'][$actual_sub_field_id])) {
                        $value = $data['fields'][$actual_sub_field_id];
                        break;
                    }
                }
            }

    //error_log('Value Data for ' . $sub_field['id'] . ': ' . print_r($value, true));



            // Common arguments for all field types
            $common_args = array(
                'id' => $sub_field['id'],
                'name' => $sub_field['id'],
                'value' => $value,
                'desc' => $sub_field['desc'] ?? '',
                'label' => $sub_field['name'],
                'sub_fields' => array()
            );

        

        // Switch based on field type
        switch ($sub_field['type']) {
            case 'text':
                $common_args['value'] = $value;         
                $common_args['label'] = $sub_field['label'];
                MBF_Field_Text::render($common_args);
                break;    
            case 'textarea':
                $common_args['value'] = $value;
                MBF_Field_Textarea::render($common_args);
                break;
    
            case 'radio':
                $common_args['value'] = $value;
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
                $common_args['value'] = $value;
                $common_args['options'] = $sub_field['options'];
                MBF_Field_Select::render($common_args);
                break;
            case 'content_select':
                $common_args['value'] = $value;
                if (isset($sub_field['content_types'])) {
                    $common_args['content_types'] = $sub_field['content_types']; }
                    $common_args['label'] = $sub_field['name'];
                    $common_args['is_group'] = 'true';
                MBF_Field_Content_Select::render($common_args);
            break;
            case 'wysiwyg':
                $common_args['name'] = $sub_field['id'];
                $temp_id = str_ireplace('][', '_', $common_args['id']);
                $second_temp_id = str_ireplace(']','',$temp_id);
                $editor_id = str_ireplace('[','_', $second_temp_id);
                $common_args['id'] = $editor_id;
                $common_args['is_group'] = 'true';
                $common_args['value'] = $value; 
                $common_args['label'] = $sub_field['label'];     
                MBF_Field_Wysiwyg::render($common_args);
            break;
            case 'date':
                $common_args['value'] = $value;
                $common_args['label'] = $sub_field['label'];
                MBF_Field_Date::render($common_args);
                break;
            case 'color':
                $common_args['value'] = $value;
                $common_args['label'] = $sub_field['label'];
                MBF_Field_Color::render($common_args);
            break;
            case 'time':
                $common_args['value'] = $value;
                $common_args['label'] = $sub_field['label'];
                MBF_Field_time::render($common_args);
            break;
            case 'image_upload':
                $common_args['is_group'] = 'true';
                $common_args['value'] = $value;
                $common_args['name'] = $sub_field['label'];
                MBF_Field_Image_Upload::render($common_args, true);
            break; 
            case 'file_upload':
                $common_args['value'] = $value;
                $common_args['is_group'] = 'true';
                MBF_Field_File_Upload::render($common_args);
            break;
            case 'repeater':
                if (isset($sub_field['sub_fields']) && is_array($sub_field['sub_fields'])) {
                    $common_args['sub_fields'] = $sub_field['sub_fields'];
                } else {
                    $common_args['sub_fields'] = array(); // or handle this case as appropriate
                }
                $common_args['id'] = $sub_field['id'];                
                $common_args['value'] = $value; 
                $common_args['name'] = $sub_field['label'];
                $common_args['is_group'] = 'true';
                MBF_Field_Repeater::render($common_args);
                break;
             
  

            // ... Add other field types as needed
        }
    }
}
?>
