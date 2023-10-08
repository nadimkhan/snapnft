/*$meta_boxes = array(
    array(
        'id' => 'mbf_sample_meta_box',
        'title' => 'New Meta Box',
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'type' => 'text',
                'id' => 'searchable_field',
                'name' => 'Searchable Field',
                'label' => 'This is a searchable text input',
                'desc' => 'This field is searchable.',
                'searchable' => true
            ),
            array(
                'type' => 'text',
                'id' => 'regular_field',
                'name' => 'Regular Field',
                'desc' => 'This field is not searchable.',
                'label' => 'This is a non searchable text input',
                'searchable' => false
            ),
            array(
                'type' => 'textarea',
                'id' => 'regular_textarea',
                'name' => 'Regular Field',
                'label' => 'This is a just a textarea',
                'desc' => 'This field is not searchable.',
                'searchable' => false
            ),
            array(
                'type' => 'radio',
                'id' => 'radio_field_id',
                'name' => 'Radio Field Name',
                'label' => 'This is radio outside repeater',
                'desc' => 'Description for the radio field.',
                'options' => array(
                    'option1' => 'Option 1 Label',
                    'option2' => 'Option 2 Label',
                    // ... more options ...
                ),
                'default' => 'option1' // Optional default value
            ),
            array(
                'type' => 'checkbox',
                'id' => 'checkbox_field_id',
                'name' => 'Checkbox Field Name',
                'desc' => 'Description for the checkbox field.',
                'options' => array(
                    'option1' => 'Option 1 Label',
                    'option2' => 'Option 2 Label',
                    // ... more options ...
                )
            ),
            array(
                'type' => 'select',
                'id' => 'select_field_id',
                'name' => 'Select Field Name',
                'desc' => 'Description for the select field.',
                'options' => array(
                    'option1' => 'Option 1 Label',
                    'option2' => 'Option 2 Label',
                    // ... more options ...
                ),
                'default' => 'Select an Option' // Optional default value
            ),
            array(
                'type' => 'wysiwyg',
                'id' => 'wysiwyg_field_id',
                'name' => 'WYSIWYG Field Name',
                'desc' => 'Description for the WYSIWYG field.',
            ),
            array(
                'type' => 'image_upload',
                'id' => 'image_upload_field_id',
                'name' => 'Image Upload Field Name',
                'desc' => 'Description for the image upload field.'
            ),
            array(
                'type' => 'file_upload',
                'id' => 'file_upload_field_id',
                'name' => 'File Upload Field Name',
                'desc' => 'Description for the file upload field.'
            ),
            array(
                'id' => 'linked_content',
                'name' => 'Linked Content',
                'type' => 'content_select',
                'desc' => 'Select content to link to this post.',
                'content_types' => array('page', 'post')
            ),
            array(
                'id' => 'date_picker',
                'name' => 'Date Picker',
                'type' => 'date',
                'desc' => 'Choose the date.'
            ),
            array(
                'id' => 'color_picker',
                'name' => 'Color Picker',
                'type' => 'color',
                'desc' => 'Choose the color.'
            ),            
            array(
                'id' => 'time_picker',
                'name' => 'Time Picker',
                'type' => 'time',
                'desc' => 'Choose the time.'
            ),
            array(
                'id' => 'repeater_field_id',
                'name' => 'Repeater Field',
                'type' => 'repeater',
                'sub_fields' => array(
                    array(
                        'id' => 'text_field',
                        'name' => 'Text Field',
                        'type' => 'text',
                        'label' => 'This is a text in repeater',
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'type' => 'textarea',
                        'id' => 'regular_textarea',
                        'name' => 'Regular Field',
                        'label' => 'This is textarea in repeater',
                        'desc' => 'This field is not searchable.',
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'type' => 'radio',
                        'id' => 're_radio_field_id',
                        'name' => 'Radio Field Name',
                        'label' => 'This is radio in repeater',
                        'desc' => 'Description for the radio field.',
                        'options' => array(
                            'option1' => 'Option 1 Label',
                            'option2' => 'Option 2 Label',
                            'option3' => 'Option 3 Label',
                            // ... more options ...
                        ),
                        'default' => 'option3', // Optional default value
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'type' => 'checkbox',
                        'id' => 'checkbox_field_id',
                        'name' => 'Checkbox Field Name',
                        'label' => 'This is checknox in repeater',
                        'desc' => 'Description for the checkbox field.',
                        'options' => array(
                            'option1' => 'Option 1 Label',
                            'option2' => 'Option 2 Label',
                            'option3' => 'Option 3 Label',
                            'option4' => 'Option 4 Label',
                            // ... more options ...
                        ),
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'type' => 'select',
                        'id' => 'select_field_id',
                        'name' => 'Select Field Name',
                        'label' => 'This is select in repeater',
                        'desc' => 'Description for the select field.',
                        'options' => array(
                            'option1' => 'Option 1 Label',
                            'option2' => 'Option 2 Label',
                            // ... more options ...
                        ),
                        'default' => 'Select an Option', // Optional default value
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'id' => 're_linked_content',
                        'name' => 'Linked Content',
                        'type' => 'content_select',
                        'label' => 'This is content select in repeater',
                        'desc' => 'Select content to link to this post.',
                        'content_types' => array('page', 'post'),
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'type' => 'wysiwyg',
                        'id' => 're_wysiwyg_field_id',
                        'name' => 'WYSIWYG Field Name',
                        'label' => 'This is wysiwyg in repeater',
                        'desc' => 'Description for the WYSIWYG field.',
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ), 
                    array(
                        'id' => 'date_picker',
                        'name' => 'Date Picker',
                        'type' => 'date',
                        'desc' => 'Choose the date.',
                        'label' => 'This is date picker in repeater',
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'id' => 're_color_picker',
                        'name' => 'Color Picker',
                        'type' => 'color',
                        'desc' => 'Choose the color.',
                        'label' => 'This is color picker in repeater',
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'id' => 'time_picker',
                        'name' => 'Time Picker',
                        'type' => 'time',
                        'desc' => 'Choose the time.',
                        'label' => 'This is time picker in repeater',
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'type' => 'image_upload',
                        'id' => 'image_upload_field_id',
                        'name' => 'Image Upload Field Name',
                        'desc' => 'Description for the image upload field.',
                        'label' => 'This is image uploader in repeater',
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                    array(
                        'type' => 'file_upload',
                        'id' => 'file_upload_field_id',
                        'name' => 'File Upload Field Name',
                        'desc' => 'Description for the file upload field.',
                        'label' => 'This is image uploader in repeater',
                        'repeater' => true,
                        'repeater_id' => 'repeater_field_id',
                    ),
                )
            )
                                    
            // ... (more fields can be added here)
        )
    )
);
$meta_boxes = array(
    'id' => 'my_meta_box',
    'title' => 'My Meta Box',
    'post_type' => 'page',
    'context' => 'normal',
    'priority' => 'high',
    'section' => array(
        array(
            'tab' => 'page_header',
            'tab_title' => 'Header',
            'fields' => array(
                array(
                    'id' => 'hd_field_1',
                    'type' => 'text',
                    'label' => 'Text Field in Header',
                    // ... other field properties ...
                ),
                array(
                    'id' => 'hd_field_2',
                    'type' => 'textarea',
                    'label' => 'Textarea Field in Header',
                    // ... other field properties ...
                ),
                // ... more fields ...
            ),
        ),
        array(
            'tab' => 'page_content',
            'tab_title' => 'Content',
            'fields' => array(
                array(
                    'id' => 'cn_field_1',
                    'type' => 'text',
                    'label' => 'Text Field in Content',
                    // ... other field properties ...
                ),
                array(
                    'id' => 'cn_field_2',
                    'type' => 'textarea',
                    'label' => 'Textarea Field in Content',
                    // ... other field properties ...
                ),
                // ... more fields ...
            ),
        ),
    ),
    
);*/

// Handling layout field
if (isset($field['type']) && ($field['type'] === 'layout_radio' || $field['type'] === 'layout_checkbox')) {
    if (isset($field['layouts']) && is_array($field['layouts']) && !empty($field['layouts'])) {
        foreach ($field['layouts'] as $index => $layout) {
            echo '<div class="collapsible-box">';
            echo '  <div class="box-header">';
            $sanitized_template = sanitize_html_class($layout['template']);
            echo '    <label class="layout-option">';
            $inputNamePrefix = "{$field['id']}[{$index}]";
            echo '<input type="hidden" name="' . $inputNamePrefix . '" value="' . esc_attr($layout['template']) . '">';
            echo '<img src="' . esc_url($layout['image']) . '" class="layout_image">';
            echo '</label>';
            echo '    <div class="icons">';
            echo '      <span class="dashicons dashicons-arrow-down"></span>';
            echo '      <span class="dashicons dashicons-trash"></span>';
            echo '      <span class="dashicons dashicons-move"></span>';
            echo '    </div>';
            echo '  </div>';
            echo '  <div class="box-content" style="display:none;">';
            echo '<div class="layout-fields fields-for-' . esc_attr($sanitized_template) . '">';
            if (isset($layout['groups']) && is_array($layout['groups'])) {
                foreach ($layout['groups'] as $group) {
                    if (isset($group['fields']) && is_array($group['fields'])) {
                        foreach ($group['fields'] as $sub_field) {
                            $sub_field['id'] = $inputNamePrefix . '[fields][' . $sub_field['id'] . ']'; // Adjust the id of the sub_field
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


<?php
global $meta_boxes;

$meta_boxes = array(
    array(
        'id' => 'my_meta_box',
        'title' => 'My Meta Box',
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'high',
        'sections' => array(
            array(
                'tab' => 'page_header',
                'tab_title' => 'Header',
                'fields' => array(                             
                    array(
                        'id' => 'hd_layout_field_id',
                        'name' => 'Choose Layout',
                        'type' => 'layout_radio', // Changed type to layout_radio
                        'layouts' => array(
                            array(
                                'template' => 'template_1.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_1.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group 1 for Template 1',
                                        'fields' => array(
                                            array(
                                                'id' => 'field_1',
                                                'name' => 'Field 1 for Template 1',
                                                'type' => 'text',
                                                'label' => 'Field 1 for Template 1',
                                                // ... other field properties ...
                                            ),
                                            array(
                                                'id' => 'field_2',
                                                'name' => 'Field 1 for Template 1',
                                                'type' => 'image_upload',
                                                'label' => 'Field 1 for Template 1',
                                                // ... other field properties ...
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'template_2.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_2.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group 2 for Template 2',
                                        'fields' => array(
                                            array(
                                                'id' => 'field_3',
                                                'name' => 'Field 1 for Template 2',
                                                'type' => 'text',
                                                'label' => 'Field 1 for Template 2',
                                                // ... other field properties ...
                                            ),
                                            array(
                                                'id' => 'field_4',
                                                'name' => 'Field 2 for Template 2',
                                                'type' => 'wysiwyg',
                                                'label' => 'Field 2 for Template 2',
                                                'wysiwyg_id' => 'field_4'
                                                // ... other field properties ...
                                            ),
                                            array(
                                                'id' => 'field_6',
                                                'name' => 'Field 2 for Template 2',
                                                'type' => 'repeater',
                                                'label' => 'Field 2 for Template 2', 
                                                'sub_fields' => array(
                                                    array(
                                                        'type' => 'wysiwyg',
                                                        'id' => 're_wysiwyg_field_id',
                                                        'name' => 'WYSIWYG Field Name',
                                                        'label' => 'This is wysiwyg in repeater',
                                                        'desc' => 'Description for the WYSIWYG field.',
                                                        'repeater' => true,
                                                        'repeater_id' => 'repeater_field_id',
                                                    ), 
                                                )                        
                                            ),  
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            // ... more layouts with groups ...
                        ),
                        'default' => '',
                        'desc' => 'Select a layout',
                    ),

                ),
            ),
            array(
                'tab' => 'page_content',
                'tab_title' => 'Content',
                'fields' => array(                             
                    array(
                        'id' => 'cn_layout_field_id',
                        'name' => 'Choose Layout',
                        'type' => 'layout_checkbox', // Changed type to layout_radio
                        'layouts' => array(
                            array(
                                'template' => 'template_1.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_1.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group 1 for Template 1',
                                        'fields' => array(
                                            array(
                                                'id' => 'field_1',
                                                'name' => 'Field 1 for Template 1',
                                                'type' => 'text',
                                                'label' => 'Field 1 for Template 1',
                                                // ... other field properties ...
                                            ),
                                            array(
                                                'id' => 'field_2',
                                                'name' => 'Field 1 for Template 1',
                                                'type' => 'image_upload',
                                                'label' => 'Field 1 for Template 1',
                                                // ... other field properties ...
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'template_2.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_2.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group 2 for Template 2',
                                        'fields' => array(
                                            array(
                                                'id' => 'field_3',
                                                'name' => 'Field 1 for Template 2',
                                                'type' => 'text',
                                                'label' => 'Field 1 for Template 2',
                                                // ... other field properties ...
                                            ),
                                            array(
                                                'id' => 'field_4',
                                                'name' => 'Field 2 for Template 2',
                                                'type' => 'wysiwyg',
                                                'label' => 'Field 2 for Template 2',
                                                'wysiwyg_id' => 'field_4'
                                                // ... other field properties ...
                                            ),
                                            array(
                                                'id' => 'field_6',
                                                'name' => 'Field 2 for Template 2',
                                                'type' => 'repeater',
                                                'label' => 'Field 2 for Template 2', 
                                                'sub_fields' => array(
                                                    array(
                                                        'type' => 'wysiwyg',
                                                        'id' => 're_wysiwyg_field_id',
                                                        'name' => 'WYSIWYG Field Name',
                                                        'label' => 'This is wysiwyg in repeater',
                                                        'desc' => 'Description for the WYSIWYG field.',
                                                        'repeater' => true,
                                                        'repeater_id' => 'field_6',
                                                    ), 
                                                )                        
                                            ),  
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            // ... more layouts with groups ...
                        ),
                        'default' => '',
                        'desc' => 'Select a layout',
                    ),

                ),
            ),
           
            
        ),
    ),
);
?>

'fields' => array(
                                            array(
                                                'id' => 'cn_8_repeater_field',
                                                'name' => 'Repeater Field',
                                                'type' => 'repeater',
                                                'label' => 'Repeater block for multiple field',
                                                'sub_fields' => array(
                                                    array(
                                                        'id' => 'cn_8_title',
                                                        'name' => 'Title for Section',
                                                        'type' => 'text',
                                                        'label' => 'Title for Section',
                                                        'desc' => 'Add Title here for the section',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_8_repeater_field',
                                                    ),                                                    
                                                    array(
                                                        'type' => 'image_upload',
                                                        'id' => 'cn_8_image',
                                                        'name' => 'Background Image for the section',
                                                        'desc' => 'Upload Image for background.',
                                                        'label' => 'Background Image for the section',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_8_repeater_field',
                                                    ),
                                                   
                                                )
                                            )
                                             
                                        ),