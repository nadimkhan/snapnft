<?php
global $meta_boxes;

$meta_boxes = array(
    array(
        'id' => 'bl_meta_box',
        'title' => 'BITSLifestyle Meta Box',
        'post_type' => 'page',
        'context' => 'normal',
        'priority' => 'high',
        'sections' => array(
            array(
                'tab' => 'sect_about',
                'tab_title' => 'About Us',
                'fields' => array( 
                    array(
                        'type' => 'text',
                        'id' => 'about_title',
                        'name' => 'Title',
                        'label' => 'Title',
                        'desc' => 'Title for About Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'about_subtitle',
                        'name' => 'Subtitle',
                        'label' => 'Subtitle',
                        'desc' => 'Subtitle for About Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'about_detailed_subtitle',
                        'name' => 'Detailed Subtitle',
                        'label' => 'Detailed Subtitle',
                        'desc' => 'Detailed Subtitle for About Section',
                    ),
                    array(
                        'type' => 'wysiwyg',
                        'id' => 'about_content',
                        'name' => 'Content for About Section',
                        'label' => 'Content for About Section',
                        'desc' => 'Content for About Section',
                    ), 
                    array(
                        'type' => 'image_upload',
                        'id' => 'about_image',
                        'name' => 'Image Background About Section',
                        'label' => 'Image Background',
                        'desc' => 'Fullscreen Image About Section',
                    ),
                    array(
                        'id' => 'about_linked_content',
                        'name' => 'Linked Content',
                        'type' => 'content_select',
                        'label' => 'Link to Page/Post',
                        'desc' => 'Select content to link to this Section.',
                        'content_types' => array('page', 'post')
                    ),              
                ),
            ),
            array(
                'tab' => 'sect_redefine',
                'tab_title' => 'Redefine Bluprint',
                'fields' => array(
                    array(
                        'type' => 'text',
                        'id' => 'redefine_title',
                        'name' => 'Title',
                        'label' => 'Title',
                        'desc' => 'Title for Redefine Blueprint Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'redefine_subtitle',
                        'name' => 'Subtitle',
                        'label' => 'Subtitle',
                        'desc' => 'Subtitle for Redefine Blueprint Section',
                    ),
                    array(
                        'id' => 'redefine_linked_content',
                        'name' => 'Linked Content',
                        'type' => 'content_select',
                        'label' => 'Link to Page/Post',
                        'desc' => 'Select content to link to this Section.',
                        'content_types' => array('page', 'post')
                    ),       
                ),
            ),
            array(
                'tab' => 'sect_priviledges',
                'tab_title' => 'Priviledges',
                'fields' => array( 
                    array(
                        'type' => 'text',
                        'id' => 'priviledges_title',
                        'name' => 'Title',
                        'label' => 'Title',
                        'desc' => 'Title for Priviledges Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'priviledges_subtitle',
                        'name' => 'Subtitle',
                        'label' => 'Subtitle',
                        'desc' => 'Subtitle for Priviledges Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'priviledges_detailed_subtitle',
                        'name' => 'Detailed Subtitle',
                        'label' => 'Detailed Subtitle',
                        'desc' => 'Detailed Subtitle for Priviledges Section',
                    ),
                    array(
                        'type' => 'wysiwyg',
                        'id' => 'priviledges_content',
                        'name' => 'Content Section',
                        'label' => 'Content Section',
                        'desc' => 'Content for Priviledges Section',
                    ), 
                    array(
                        'type' => 'image_upload',
                        'id' => 'priviledges_image',
                        'name' => 'Image Background Priviledges Section',
                        'label' => 'Image Background',
                        'desc' => 'Fullscreen Image Priviledges Section',
                    ),
                    array(
                        'id' => 'priviledges_linked_content',
                        'name' => 'Linked Content',
                        'type' => 'content_select',
                        'label' => 'Link to Page/Post',
                        'desc' => 'Select content to link to this Section.',
                        'content_types' => array('page', 'post')
                    ),              
                ),
            ),
            array(
                'tab' => 'sect_aviobits',
                'tab_title' => 'Aviobits',
                'fields' => array(
                    array(
                        'type' => 'text',
                        'id' => 'aviobits_title',
                        'name' => 'Title',
                        'label' => 'Title',
                        'desc' => 'Title for Aviobits Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'aviobits_subtitle',
                        'name' => 'Subtitle',
                        'label' => 'Subtitle',
                        'desc' => 'Subtitle for Aviobits Section',
                    ),
                    array(
                        'id' => 'aviobits_linked_content',
                        'name' => 'Linked Content',
                        'type' => 'content_select',
                        'label' => 'Link to Page/Post',
                        'desc' => 'Select content to link to this Section.',
                        'content_types' => array('page', 'post')
                    ),       
                ),
            ),
            array(
                'tab' => 'sect_participation',
                'tab_title' => 'Participation',
                'fields' => array( 
                    array(
                        'type' => 'text',
                        'id' => 'participation_title',
                        'name' => 'Title',
                        'label' => 'Title',
                        'desc' => 'Title for Participation Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'participation_subtitle',
                        'name' => 'Subtitle',
                        'label' => 'Subtitle',
                        'desc' => 'Subtitle for Participation Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'participation_detailed_subtitle',
                        'name' => 'Detailed Subtitle',
                        'label' => 'Detailed Subtitle',
                        'desc' => 'Detailed Subtitle for Participation Section',
                    ),
                    array(
                        'type' => 'wysiwyg',
                        'id' => 'participation_content',
                        'name' => 'Content Section',
                        'label' => 'Content Section',
                        'desc' => 'Content for Participation Section',
                    ), 
                    array(
                        'type' => 'image_upload',
                        'id' => 'participation_image',
                        'name' => 'Image Background Participation Section',
                        'label' => 'Image Background',
                        'desc' => 'Fullscreen Image Participation Section',
                    ),
                    array(
                        'id' => 'participation_linked_content',
                        'name' => 'Linked Content',
                        'type' => 'content_select',
                        'label' => 'Link to Page/Post',
                        'desc' => 'Select content to link to this Section.',
                        'content_types' => array('page', 'post')
                    ),              
                ),
            ),
            array(
                'tab' => 'sect_partners',
                'tab_title' => 'Partners',
                'fields' => array(
                    array(
                        'type' => 'text',
                        'id' => 'partners_title',
                        'name' => 'Title',
                        'label' => 'Title',
                        'desc' => 'Title for Partners Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'partners_subtitle',
                        'name' => 'Subtitle',
                        'label' => 'Subtitle',
                        'desc' => 'Subtitle for Partners Section',
                    ),
                    array(
                        'id' => 'partners_linked_content',
                        'name' => 'Linked Content',
                        'type' => 'content_select',
                        'label' => 'Link to Page/Post',
                        'desc' => 'Select content to link to this Section.',
                        'content_types' => array('page', 'post')
                    ),       
                ),
            ),
            array(
                'tab' => 'sect_contact',
                'tab_title' => 'Contact',
                'fields' => array(
                    array(
                        'type' => 'text',
                        'id' => 'contact_title',
                        'name' => 'Title',
                        'label' => 'Title',
                        'desc' => 'Title for Partners Section',
                    ),
                    array(
                        'type' => 'text',
                        'id' => 'contact_subtitle',
                        'name' => 'Subtitle',
                        'label' => 'Subtitle',
                        'desc' => 'Subtitle for Partners Section',
                    ),
                    array(
                        'id' => 'contact_linked_content',
                        'name' => 'Linked Content',
                        'type' => 'content_select',
                        'label' => 'Link to Page/Post',
                        'desc' => 'Select content to link to this Section.',
                        'content_types' => array('page', 'post')
                    ),       
                ),
            ),
           
            
        ),
    ),
);
?>
