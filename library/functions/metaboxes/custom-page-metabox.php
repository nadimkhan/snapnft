<?php
//error_log( 'Loading custom-page-metabox.php' );
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
                        'id' => 'hd_field_1',
                        'type' => 'text',
                        'label' => 'Text Field in Header',
                        // ... other field properties ...
                    ),
                    array(
                        'id' => 'hd_layout_field_id',
                        'name' => 'Choose Layout',
                        'type' => 'layout',
                        'layouts' => array(
                            array(
                                'template' => 'template_1.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_1.svg',
                                'fields' => array( // Fields to show when this layout is selected
                                    array(
                                        'id' => 'field_1',
                                        'name' => 'Field 1 for Template 1',
                                        'type' => 'text',
                                        'label' => 'Field 1 for Template 1',
                                        // ... other field properties ...
                                    ),
                                    array(
                                        'type' => 'image_upload',
                                        'id' => 'image_upload_field_id',
                                        'name' => 'Image Upload Field Name',
                                        'desc' => 'Description for the image upload field.',
                                        'label' => 'This is image uploader in repeater',
                                    ),
                                    // ... more fields for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'template_2.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_2.svg',
                                'fields' => array( // Fields to show when this layout is selected
                                    array(
                                        'id' => 'field_1',
                                        'name' => 'Field 1 for Template 2',
                                        'type' => 'textarea',
                                        'label' => 'Field 1 for Template 2',
                                        // ... other field properties ...
                                    ),
                                    // ... more fields for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'template_3.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_3.svg',
                                'fields' => array( // Fields to show when this layout is selected
                                    array(
                                        'id' => 'field_1',
                                        'name' => 'Field 1 for Template 1',
                                        'type' => 'image_upload',
                                        // ... other field properties ...
                                    ),
                                    // ... more fields for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'template_4.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_4.svg',
                                'fields' => array( // Fields to show when this layout is selected
                                    array(
                                        'id' => 're_field_1',
                                        'name' => 'Field 1 for Template 1',
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
                                                'type' => 'image_upload',
                                                'id' => 'image_upload_field_id',
                                                'name' => 'Image Upload Field Name',
                                                'desc' => 'Description for the image upload field.',
                                                'label' => 'This is image uploader in repeater',
                                                'repeater' => true,
                                                'repeater_id' => 'repeater_field_id',
                                            ),
                                        )
                                        // ... other field properties ...
                                    ),
                                    // ... more fields for template_1.php ...
                                ),
                            ),
                            
                            // ... more layouts ...
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
                        'id' => 'cn_field_1',
                        'type' => 'text',
                        'label' => 'Text Field in Content',
                        // ... other field properties ...
                    ),
                    array(
                        'id' => 'cn_layout_field_id',
                        'name' => 'Choose Layout',
                        'type' => 'layout',
                        'layouts' => array(
                            array(
                                'template' => 'template_1.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_1.svg',
                            ),
                            array(
                                'template' => 'template_2.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_2.svg',
                            ),
                            array(
                                'template' => 'template_3.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_3.svg',
                            ),
                            array(
                                'template' => 'template_4.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_4.svg',
                            ),
                            array(
                                'template' => 'template_5.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_5.svg',
                            ),
                            array(
                                'template' => 'template_6.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_6.svg',
                            ),
                            array(
                                'template' => 'template_7.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_7.svg',
                            ),
                            array(
                                'template' => 'template_8.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_8.svg',
                            ),
                            array(
                                'template' => 'template_9.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_9.svg',
                            ),
                            array(
                                'template' => 'template_10.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_10.svg',
                            ),
                            array(
                                'template' => 'template_11.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_11.svg',
                            ),
                            array(
                                'template' => 'template_12.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_12.svg',
                            ),
                            array(
                                'template' => 'template_13.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_13.svg',
                            ),
                            array(
                                'template' => 'template_14.php',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_14.svg',
                            ),
                            // ... more layouts ...
                        ),
                        'default' => '',
                        'desc' => 'Select a layout',
                    ),
                    array(
                        'id' => 'repeater_id',
                        'name' => 'Repeater Field',
                        'type' => 'repeater',
                        'sub_fields' => array(
                            array(
                                'id' => 'cn_layout_field_id',
                                'name' => 'Choose Layout',
                                'label' => 'Layout Fields',
                                'type' => 'layout',
                                'layouts' => array(
                                    array(
                                        'template' => 'template_1.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_1.svg',
                                    ),
                                    array(
                                        'template' => 'template_2.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_2.svg',
                                    ),
                                    array(
                                        'template' => 'template_3.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_3.svg',
                                    ),
                                    array(
                                        'template' => 'template_4.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_4.svg',
                                    ),
                                    array(
                                        'template' => 'template_5.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_5.svg',
                                    ),
                                    array(
                                        'template' => 'template_6.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_6.svg',
                                    ),
                                    array(
                                        'template' => 'template_7.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_7.svg',
                                    ),
                                    array(
                                        'template' => 'template_8.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_8.svg',
                                    ),
                                    array(
                                        'template' => 'template_9.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_9.svg',
                                    ),
                                    array(
                                        'template' => 'template_10.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_10.svg',
                                    ),
                                    array(
                                        'template' => 'template_11.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_11.svg',
                                    ),
                                    array(
                                        'template' => 'template_12.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_12.svg',
                                    ),
                                    array(
                                        'template' => 'template_13.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_13.svg',
                                    ),
                                    array(
                                        'template' => 'template_14.php',
                                        'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_14.svg',
                                    ),
                                    // ... more layouts ...
                                ),
                                'default' => '',
                                'desc' => 'Select a layout',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);

//error_log(print_r($meta_boxes, true));


?>
