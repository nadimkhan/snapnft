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
           
            
        ),
    ),
);
?>
