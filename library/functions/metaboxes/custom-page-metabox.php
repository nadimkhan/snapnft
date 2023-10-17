<?php
global $meta_boxes;

$meta_boxes = array(
    array(
        'id' => 'pg_bl_meta_box',
        'title' => 'BITSLifestyle Meta Box',
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
                                'template' => 'header_1',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_1.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Layout options for Template 1',
                                        'fields' => array(
                                            array('id' => 'hd_1_title_content','name' => 'Title of Content','type' => 'text','label' => 'Title of Content',),
                                            array('id' => 'hd_1_sub_title_content','name' => 'Subtitle of Content','type' => 'text','label' => 'Subtitle/Description',),
                                            array('id' => 'hd_1_image_background','name' => 'Fullscreen Image','type' => 'image_upload','label' => 'Fullscreen Image ',),
                                            array('id' => 'hd_1_video_content','name' => 'Replace Image with Video Content','type' => 'text','label' => 'Video URL','desc' => 'This is an optional field, if you need to have a video background then fpaste the url of video'),
                                            array('id' => 'hd_1_cta_text','name' => 'Text for CTA','type' => 'text','label' => 'CTA Text',),
                                            array('id' => 'hd_1_cta_link','name' => 'Link for CTA','type' => 'content_select','label' => 'CTA Link','content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'header_2',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_2.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Layout options for Template 2',
                                        'fields' => array(
                                            array('id' => 'hd_2_title_content','name' => 'Title of Content','type' => 'text','label' => 'Title of Content',),
                                            array('id' => 'hd_2_sub_title_content','name' => 'Subtitle of Content','type' => 'text','label' => 'Subtitle/Description',),
                                            array('id' => 'hd_2_image_background','name' => 'Fullscreen Image','type' => 'image_upload','label' => 'Fullscreen Image ',),
                                            array('id' => 'hd_2_video_content','name' => 'Replace Image with Video Content','type' => 'text','label' => 'Video URL','desc' => 'This is an optional field, if you need to have a video background then fpaste the url of video'),
                                            array('id' => 'hd_2_cta_text','name' => 'Text for CTA','type' => 'text','label' => 'CTA Text',),
                                            array('id' => 'hd_2_cta_link','name' => 'Link for CTA','type' => 'content_select','label' => 'CTA Link','content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'header_3',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_3.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Layout options for Template 3',
                                        'fields' => array(
                                            array('id' => 'hd_3_title_content','name' => 'Title of Content','type' => 'text','label' => 'Title of Content',),
                                            array('id' => 'hd_3_sub_title_content','name' => 'Subtitle of Content','type' => 'text','label' => 'Subtitle/Description',),
                                            array('id' => 'hd_3_image_background','name' => 'Fullscreen Image','type' => 'image_upload','label' => 'Fullscreen Image ',),
                                            array('id' => 'hd_3_video_content','name' => 'Replace Image with Video Content','type' => 'text','label' => 'Video URL','desc' => 'This is an optional field, if you need to have a video background then fpaste the url of video'),
                                            array('id' => 'hd_3_cta_text','name' => 'Text for CTA','type' => 'text','label' => 'CTA Text',),
                                            array('id' => 'hd_3_cta_link','name' => 'Link for CTA','type' => 'content_select','label' => 'CTA Link','content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'header_4',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_4.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Layout options for Template 4',
                                        'fields' => array(
                                            array('id' => 'hd_4_title_content','name' => 'Title of Content','type' => 'text','label' => 'Title of Content',),
                                            array('id' => 'hd_4_content','name' => 'Content','type' => 'text','label' => 'Content Details',),                                            
                                            array('id' => 'hd_4_image_background','name' => 'Fullscreen Image','type' => 'image_upload','label' => 'Fullscreen Image ',),
                                            array('id' => 'hd_4_cta_text','name' => 'Text for CTA','type' => 'text','label' => 'CTA Text',),
                                            array('id' => 'hd_4_cta_link','name' => 'Link for CTA','type' => 'content_select','label' => 'CTA Link','content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'header_5',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_5.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Layout options for Template 5',
                                        'fields' => array(
                                            array('id' => 'hd_5_content','name' => 'Shortcode Content','type' => 'text','label' => 'Shortcode for Slider/Carousel',)
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'header_6',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_6.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Layout options for Template 6',
                                        'fields' => array(
                                            array('id' => 'hd_6_content','name' => 'Shortcode Content','type' => 'text','label' => 'Shortcode for Slider/Carousel',)
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'header_7',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/header_7.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Layout options for Template 7',
                                        'fields' => array(
                                            array('id' => 'hd_7_title','name' => 'Title','type' => 'text','label' => 'Title text for the section'),
                                            array('id' => 'hd_7_content','name' => 'Content ','type' => 'text','label' => 'Content text for the section'),
                                            array('id' => 'hd_7_image_background','name' => '1/4th Height Image','type' => 'image_upload','label' => '1/4th Height Image ',),
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
                                'template' => 'content_1',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_1.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 1',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_1_title',
                                                'name' => 'Title',
                                                'type' => 'text',
                                                'label' => 'Title of the section',
                                                'desc' => 'Add the title content here',
                                            ),
                                            array(
                                                'id' => 'cn_1_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_1_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_1_underlay_image',
                                                'name' => 'Underlay Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Underlay Image for section',
                                                'desc' => 'Add the Underlay Image here',
                                            ),
                                            array(
                                                'id' => 'cn_1_overlay_image',
                                                'name' => 'Overlay Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Overlay Image for section',
                                                'desc' => 'Add the Overlay Image here',
                                            ),
                                            array(
                                                'id' => 'cn_1_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Add video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_1_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_1_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_2',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_2.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group 2 for Template 2',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_2_title',
                                                'name' => 'Title',
                                                'type' => 'text',
                                                'label' => 'Title of the section',
                                                'desc' => 'Add the title content here',
                                            ),
                                            array(
                                                'id' => 'cn_2_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_2_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_2_underlay_image',
                                                'name' => 'Underlay Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Underlay Image for section',
                                                'desc' => 'Add the Underlay Image here',
                                            ),                                            
                                            array(
                                                'id' => 'cn_2_overlay_image',
                                                'name' => 'Overlay Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Overlay Image for section',
                                                'desc' => 'Add the Overlay Image here',
                                            ),
                                            array(
                                                'id' => 'cn_2_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Add video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_2_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_2_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_3',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_3.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group 3 for Template 3',
                                        'fields' => array( 
                                            array(
                                                'id' => 'cn_3_title',
                                                'name' => 'Title for Section',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the title here',
                                            ),                                           
                                            array(
                                                'id' => 'cn_3_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_3_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_3_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Adding video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_3_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_3_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),                                            
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_4',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_4.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 4',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_4_title',
                                                'name' => 'Title for Section',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the title here',
                                            ),                                            
                                            array(
                                                'id' => 'cn_4_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_4_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ), 
                                            array(
                                                'id' => 'cn_4_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Adding video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_4_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_4_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),                                          
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_5',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_5.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 5',
                                        'fields' => array(  
                                            array(
                                                'id' => 'cn_5_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                          
                                            array(
                                                'id' => 'cn_5_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),                                            
                                            
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_6',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_6.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 6',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_6_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_6_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_6_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_6_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Adding video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_6_color',
                                                'name' => 'Background Color',
                                                'type' => 'color',
                                                'label' => 'Background Color',
                                                'desc' => 'Select Background Color only if it applies else leave as it is',
                                            ),
                                            array(
                                                'id' => 'cn_6_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_6_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_7',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_7.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 7',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_7_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_7_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_7_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_7_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Adding video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_7_color',
                                                'name' => 'Background Color',
                                                'type' => 'color',
                                                'label' => 'Background Color',
                                                'desc' => 'Select Background Color only if it applies else leave as it is',
                                            ),
                                            array(
                                                'id' => 'cn_7_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_7_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_8',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_8.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 8',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_8_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_8_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_8_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_8_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Adding video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_8_color',
                                                'name' => 'Background Color',
                                                'type' => 'color',
                                                'label' => 'Background Color',
                                                'desc' => 'Select Background Color only if it applies else leave as it is',
                                            ),
                                            array(
                                                'id' => 'cn_8_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_8_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_9',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_9.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 9',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_9_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_9_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_9_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_9_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Adding video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_9_color',
                                                'name' => 'Background Color',
                                                'type' => 'color',
                                                'label' => 'Background Color',
                                                'desc' => 'Select Background Color only if it applies else leave as it is',
                                            ),
                                            array(
                                                'id' => 'cn_9_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_9_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_10',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_10.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 10',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_10_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_10_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_10_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_10_content_background',
                                                'name' => 'Content Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Content Image for section',
                                                'desc' => 'Add the background image for content section here',
                                            ),
                                            array(
                                                'id' => 'cn_10_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Add video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_10_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_10_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),                                            
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_11',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_11.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 11',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_11_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_11_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_11_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_11_content_background',
                                                'name' => 'Content Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Content Image for section',
                                                'desc' => 'Add the background image for content section here',
                                            ),
                                            array(
                                                'id' => 'cn_11_video',
                                                'name' => 'Video URL',
                                                'type' => 'text',
                                                'label' => 'Add Video URL',
                                                'desc' => 'Add video url will disable the upload image',
                                            ),
                                            array(
                                                'id' => 'cn_11_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_11_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),                                          
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_12',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_12.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 12',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_12_grids',
                                                'name' => 'No of Boxes ',
                                                'type' => 'text',
                                                'label' => 'No. of Boxes',
                                                'desc' => 'Number of boxes in each row. Default is 4. Leave blank if you want to use the default',
                                            ),                                              
                                            array(
                                                'id' => 'cn_12_repeater_field',
                                                'name' => 'Repeater Field',
                                                'type' => 'repeater',
                                                'label' => 'Repeater block for multiple field',
                                                'sub_fields' => array(
                                                    array(
                                                        'id' => 'cn_12_title',
                                                        'name' => 'Name/Title',
                                                        'type' => 'text',
                                                        'label' => 'Name/Title',
                                                        'desc' => 'Add Name/Title here for the section',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ),
                                                    array(
                                                        'id' => 'cn_12_short_designation',
                                                        'name' => 'Designation Shortform',
                                                        'type' => 'text',
                                                        'label' => 'Designation Shortform',
                                                        'desc' => 'Add Short form of designation for the team member',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ), 
                                                    array(
                                                        'id' => 'cn_12_designation',
                                                        'name' => 'Designation',
                                                        'type' => 'text',
                                                        'label' => 'Designation',
                                                        'desc' => 'Add designation of the team member',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ), 
                                                    array(
                                                        'type' => 'textarea',
                                                        'id' => 'cn_12_content',
                                                        'name' => 'Content for the section',
                                                        'desc' => 'Content for the section',
                                                        'label' => 'Content details for the each box',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ),                                                      
                                                    array(
                                                        'type' => 'image_upload',
                                                        'id' => 'cn_12_image',
                                                        'name' => 'Background Image for the section',
                                                        'desc' => 'Upload Image for background.',
                                                        'label' => 'Background Image for the section',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ),
                                                    array(
                                                        'id' => 'cn_12_facebook',
                                                        'name' => 'Link to Facebook',
                                                        'type' => 'text',
                                                        'label' => 'Link to Facebook',
                                                        'desc' => 'Add Facebook profile link',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ),                                                   
                                                    array(
                                                        'id' => 'cn_12_twitter',
                                                        'name' => 'Link to Twitter',
                                                        'type' => 'text',
                                                        'label' => 'Link to Twitter',
                                                        'desc' => 'Add Twitter profile link',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ),    
                                                    array(
                                                        'id' => 'cn_12_insta',
                                                        'name' => 'Link to Instagram',
                                                        'type' => 'text',
                                                        'label' => 'Link to Instagram',
                                                        'desc' => 'Add Instagram profile link',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ),
                                                    array(
                                                        'id' => 'cn_12_linkedin',
                                                        'name' => 'Link to LinkedIn',
                                                        'type' => 'text',
                                                        'label' => 'Link to LinkedIn',
                                                        'desc' => 'Add LinkedIn profile link',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_12_repeater_field',
                                                    ),      
                                                   
                                                )
                                            )                                       
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_13',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_13.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 13',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_13_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_13_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_13_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ), 
                                            array(
                                                'id' => 'cn_13_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_13_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),                                          
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'template' => 'content_14',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_14.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 14',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_14_repeater_field',
                                                'name' => 'Repeater Field',
                                                'type' => 'repeater',
                                                'label' => 'Repeater block for multiple field',
                                                'sub_fields' => array(
                                                    array(
                                                        'id' => 'cn_14_title',
                                                        'name' => 'Title for Section',
                                                        'type' => 'text',
                                                        'label' => 'Title for Section',
                                                        'desc' => 'Add Title here for the section',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_14_repeater_field',
                                                    ),                                                    
                                                    array(
                                                        'type' => 'image_upload',
                                                        'id' => 'cn_14_image',
                                                        'name' => 'Background Image for the section',
                                                        'desc' => 'Upload Image for background.',
                                                        'label' => 'Background Image for the section',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_14_repeater_field',
                                                    ),                                                    
                                                )
                                            )  
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_15',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_15.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 15',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_15_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_15_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_15_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_15_color',
                                                'name' => 'Background Color',
                                                'type' => 'color',
                                                'label' => 'Background Color',
                                                'desc' => 'Select Background Color only if it applies else leave as it is',
                                            ),
                                            array(
                                                'id' => 'cn_15_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_15_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_16',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_16.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 16',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_16_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_16_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_16_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_16_color',
                                                'name' => 'Background Color',
                                                'type' => 'color',
                                                'label' => 'Background Color',
                                                'desc' => 'Select Background Color only if it applies else leave as it is',
                                            ),
                                            array(
                                                'id' => 'cn_16_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_16_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_17',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_17.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 16',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_17_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_17_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_17_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_17_color',
                                                'name' => 'Background Color',
                                                'type' => 'color',
                                                'label' => 'Background Color',
                                                'desc' => 'Select Background Color only if it applies else leave as it is',
                                            ),
                                            array(
                                                'id' => 'cn_17_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_17_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_18',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_18.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 18',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_18_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                              
                                            array(
                                                'id' => 'cn_18_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_18_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_18_color',
                                                'name' => 'Background Color',
                                                'type' => 'color',
                                                'label' => 'Background Color',
                                                'desc' => 'Select Background Color only if it applies else leave as it is',
                                            ),
                                            array(
                                                'id' => 'cn_18_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_18_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_19',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_19.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 19',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_19_grids',
                                                'name' => 'No of Boxes ',
                                                'type' => 'text',
                                                'label' => 'No. of Boxes',
                                                'desc' => 'Number of boxes in each row',
                                            ),
                                            array(
                                                'type' => 'select',
                                                'id' => 'cn_19_arrangement',
                                                'name' => 'Select Arrangement Type',
                                                'label' => 'Select Arrangement Type',
                                                'desc' => 'Select the arrangement of the box content. I = Icon, T = Title, D = Description',
                                                'options' => array(
                                                    'option1' => 'I-T/D',
                                                    'option2' => 'T/I/D',
                                                    'option3' => 'I/T/D',
                                                ),
                                                'default' => 'Select Arrangement Type' // Optional default value
                                            ),                                             
                                            array(
                                                'id' => 'cn_19_repeater_field',
                                                'name' => 'Repeater Field',
                                                'type' => 'repeater',
                                                'label' => 'Repeater block for multiple field',
                                                'sub_fields' => array(
                                                    array(
                                                        'id' => 'cn_19_title',
                                                        'name' => 'Title for Box',
                                                        'type' => 'text',
                                                        'label' => 'Title for Box',
                                                        'desc' => 'Add Title here for the Box',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_19_repeater_field',
                                                    ),                                                    
                                                    array(
                                                        'type' => 'image_upload',
                                                        'id' => 'cn_19_image',
                                                        'name' => 'Icon Image for the section',
                                                        'desc' => 'Icn Image',
                                                        'label' => 'Icon Image for the section',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_19_repeater_field',
                                                    ),
                                                    array(
                                                        'type' => 'text',
                                                        'id' => 'cn_19_content',
                                                        'name' => 'Content for the section',
                                                        'desc' => 'Content for the section',
                                                        'label' => 'Content details for the each box',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_19_repeater_field',
                                                    ),                                                      
                                                   
                                                )
                                            )                                       
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_20',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_20.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 20',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_20_title',
                                                'name' => 'Title',
                                                'type' => 'text',
                                                'label' => 'Title of the section',
                                                'desc' => 'Add the title content here',
                                            ),
                                            array(
                                                'id' => 'cn_20_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_20_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_20_overlay_image',
                                                'name' => 'Overlay Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Overlay Image for section',
                                                'desc' => 'Add the Overlay Image here',
                                            ),
                                            array(
                                                'id' => 'cn_20_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_20_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_21',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_21.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 21',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_21_title',
                                                'name' => 'Title',
                                                'type' => 'text',
                                                'label' => 'Title of the section',
                                                'desc' => 'Add the title content here',
                                            ),
                                            array(
                                                'id' => 'cn_21_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_21_main_image',
                                                'name' => 'Main Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Main Image for section',
                                                'desc' => 'Add the Main Image here',
                                            ),
                                            array(
                                                'id' => 'cn_21_overlay_image',
                                                'name' => 'Overlay Image Section',
                                                'type' => 'image_upload',
                                                'label' => 'Overlay Image for section',
                                                'desc' => 'Add the Overlay Image here',
                                            ),
                                            array(
                                                'id' => 'cn_21_cta',
                                                'name' => 'CTA text',
                                                'type' => 'text',
                                                'label' => 'CTA Text',
                                                'desc' => 'Add the CTA Text here',
                                            ),
                                            array(
                                                'id' => 'cn_21_cta_link',
                                                'name' => 'Link to Page/Post',
                                                'type' => 'content_select',
                                                'label' => 'Link to Page/Post',
                                                'desc' => 'Select the page/post to link to',
                                                'content_types' => array('page', 'post'),
                                            ),
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_22',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_22.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 22',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_22_title',
                                                'name' => 'Title',
                                                'type' => 'text',
                                                'label' => 'Title of the section',
                                                'desc' => 'Add the title content here',
                                            ),
                                            array(
                                                'id' => 'cn_22_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_22_repeater_field',
                                                'name' => 'Repeater Field',
                                                'type' => 'repeater',
                                                'label' => 'Repeater block for multiple field',
                                                'sub_fields' => array(
                                                    array(
                                                        'id' => 'cn_22_title',
                                                        'name' => 'Title for Box',
                                                        'type' => 'text',
                                                        'label' => 'Title for Box',
                                                        'desc' => 'Add Title here for the Box',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_22_repeater_field',
                                                    ),
                                                    array(
                                                        'type' => 'text',
                                                        'id' => 'cn_22_content',
                                                        'name' => 'Content for the section',
                                                        'desc' => 'Content for the section',
                                                        'label' => 'Content details for the each box',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_22_repeater_field',
                                                    ),                                                      
                                                   
                                                )
                                            )  
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            
                            array(
                                'template' => 'content_23',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_23.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 23',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_23_title',
                                                'name' => 'Title',
                                                'type' => 'text',
                                                'label' => 'Title of the section',
                                                'desc' => 'Add the title content here',
                                            ),
                                            array(
                                                'id' => 'cn_23_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_24',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_24.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 24',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_24_title',
                                                'name' => 'Title',
                                                'type' => 'text',
                                                'label' => 'Title of the section',
                                                'desc' => 'Add the title content here',
                                            ),
                                            array(
                                                'id' => 'cn_24_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),
                                            array(
                                                'id' => 'cn_24_color',
                                                'name' => 'Background Color for Section',
                                                'type' => 'color',
                                                'label' => 'Background Color for Section',
                                                'desc' => 'Add a new color to change background color or let it be at default',
                                            ),
                                            
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            
                            array(
                                'template' => 'content_25',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_5.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 5',
                                        'fields' => array(  
                                            array(
                                                'id' => 'cn_25_title',
                                                'name' => 'Title ',
                                                'type' => 'text',
                                                'label' => 'Title for section',
                                                'desc' => 'Add the Title here',
                                            ),                                          
                                            array(
                                                'id' => 'cn_25_content',
                                                'name' => 'Content for Section',
                                                'type' => 'wysiwyg',
                                                'label' => 'Content for section',
                                                'desc' => 'Add the content here',
                                            ),                                            
                                            
                                        ),
                                    ),
                                    // ... more groups for template_1.php ...
                                ),
                            ),
                            array(
                                'template' => 'content_26',
                                'image' => get_template_directory_uri() . '/library/classes/meta-box-framework/assets/images/content_26.svg',
                                'type' => 'group',
                                'groups' => array(
                                    array(
                                        'group_name' => 'Group for Template 26',
                                        'fields' => array(
                                            array(
                                                'id' => 'cn_26_repeater_field',
                                                'name' => 'Repeater Field',
                                                'type' => 'repeater',
                                                'label' => 'Repeater block for FAQ',
                                                'sub_fields' => array(
                                                    array(
                                                        'id' => 'cn_26_title',
                                                        'name' => 'Name/Title',
                                                        'type' => 'text',
                                                        'label' => 'Name/Title',
                                                        'desc' => 'Add Name/Title here for the section',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_26_repeater_field',
                                                    ),                                                    
                                                    array(
                                                        'type' => 'textarea',
                                                        'id' => 'cn_26_content',
                                                        'name' => 'Content for the section',
                                                        'desc' => 'Content for the section',
                                                        'label' => 'Content details for the each box',
                                                        'repeater' => true,
                                                        'repeater_id' => 'cn_26_repeater_field',
                                                    ),
                                                )
                                            ) 
                                            
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
