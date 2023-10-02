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