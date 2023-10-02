<?php
// Register Custom Post Type


function bc_register_post_type( $title, $args = array() ){     
    $sanitizedtitle = sanitize_title($title);
    $sanitizedTitle = $sanitizedtitle;
     
    $defaults = array(
            'labels' => array(
                'name' => $title . 's',
                'singular_name' => $title,
                'add_new_item' => 'Add New ' . $title,
                'edit_item' => 'Edit ' . $title,
                'new_item' => 'New ' . $title,
                'search_items' => 'Search ' . $title . 's',
                'not_found' => 'No ' . $title . 's found',
                'not_found_in_trash' => 'No ' . $title . 's found in trash'
            ),
            '_builtin' => false,
            'public' => true,
            'hierarchical' => false,
            'taxonomies' => array( 'project-category', 'project-tag'),
            'query_var' => true,
            'menu_position' => 6,
            'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'comments'),
            	'rewrite' => array('slug'=> '%store%/'.$sanitizedTitle, 'with_front' => false),
                'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				'menu_position'       => 5,
				'can_export'          => true,		
				'has_archive'         => true,
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'post',
        );
     
    $args = wp_parse_args( $args, $defaults );     
    $postType = isset( $args['postType'] ) ? $args['postType'] : $sanitizedTitle;     
    register_post_type( $postType, $args );     
}

$postTypes = array(	

	'Projects' => array('menu_position' => 7, 'supports' => array('title', 'editor', 'custom-fields', 'author'))
);

foreach( $postTypes as $title => $args )
    bc_register_post_type( $title, $args );
    
