<?php 
// fields/layout.php
class MBF_Field_Layout {

    public static function render($field) {
        $value = '';
    
        // Handling repeater field
        if (isset($field['repeater']) && $field['repeater'] === true) {
            $repeater_values = get_post_meta(get_the_ID(), $field['repeater_id'], true);
            preg_match('/\[(\w+)\]$/', $field['id'], $matches);
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
    
        // Handling layout field
        if ($field['type'] === 'layout') {
            echo '<div class="mbf-form-element mbf-layout-options">';
            if (isset($field['layouts']) && is_array($field['layouts']) && !empty($field['layouts'])) {
                foreach ($field['layouts'] as $layout) {
                    $sanitized_template = sanitize_html_class($layout['template']);
                    echo '<label class="layout-option">';
                    echo '<input type="radio" name="' . esc_attr($field['id']) . '" value="' . esc_attr($layout['template']) . '"' . checked($value, $layout['template'], false) . ' data-target="fields-for-' . esc_attr($sanitized_template) . '">';
                    echo '<img src="' . esc_url($layout['image']) . '" alt="' . esc_attr($layout['template']) . '" class="layout_image">';
                    echo '</label>';
                }
                echo '</div>';
                foreach ($field['layouts'] as $layout) {
                    $sanitized_template = sanitize_html_class($layout['template']);
                    echo '<div class="layout-fields fields-for-' . esc_attr($sanitized_template) . '" style="display:none;">';
                    if (isset($layout['fields']) && is_array($layout['fields'])) {
                        foreach ($layout['fields'] as $sub_field) {
                            self::render($sub_field,  $field['id']); // Recursive call to render for nested fields
                        }
                    }
                    echo '</div>'; // Close layout-fields
                }
            } else {
                error_log('Warning: $field[\'layouts\'] is not set or empty in ' . __FILE__);
            }
        } elseif ($field['type'] === 'repeater') {
            // Handle repeater field rendering here
            if (isset($field['sub_fields']) && is_array($field['sub_fields'])) {
                // Start rendering repeater container
                echo '<div class="mbf-repeater-container" data-repeater-id="' . esc_attr($field['id']) . '">';
        
                // Get the saved values for this repeater field
                $repeater_values = get_post_meta(get_the_ID(), $field['id'], true);
                $repeater_values = is_array($repeater_values) ? $repeater_values : array();
        
                // Loop through each saved repeater item and render its sub-fields
                foreach ($repeater_values as $repeater_index => $repeater_item) {
                    echo '<div class="mbf-repeater-item" data-repeater-index="' . esc_attr($repeater_index) . '">';
                    foreach ($field['sub_fields'] as $sub_field) {
                        // Set the repeater index and ID on the sub-field and render it
                        $sub_field['repeater'] = true;
                        $sub_field['repeater_index'] = $repeater_index;
                        $sub_field['repeater_id'] = $field['id'];
                        self::render($sub_field); // Recursive call to render for nested fields
                    }
                    echo '</div>'; // Close repeater item
                }
        
                // Close repeater container
                echo '</div>'; // Close mbf-repeater-container
            } else {
                error_log('Warning: $field[\'sub_fields\'] is not set or not an array in ' . __FILE__);
            }
        }
        
    
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
            'name' => $sub_field['name'],
            'value' => $value,
            'desc' => $sub_field['desc'] ?? '',
            'label' => $sub_field['name'],
            'sub_fields' => array(),
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
