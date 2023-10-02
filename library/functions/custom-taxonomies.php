<?php 
function bc_register_taxonomies() {

	$taxonomies = array(			
		
		array(
			'slug'         => 'project-category',
			'single_name'  => 'Project Category',
			'plural_name'  => 'Project Categories',
			'post_type'    => array('projects'),
			'rewrite'      => array( 'slug' => 'project-category' ),
			'hierarchical' => true,
		),
		array(
			'slug'         => 'project-tag',
			'single_name'  => 'Project Tag',
			'plural_name'  => 'Project Tags',
			'post_type'    => array('projects'),
			'rewrite'      => array( 'slug' => 'project-tag' ),
			'hierarchical' => true,
		)						
	);

	foreach( $taxonomies as $taxonomy ) {
		$labels = array(
			'name' => $taxonomy['plural_name'],
			'singular_name' => $taxonomy['single_name'],
			'search_items' =>  'Search ' . $taxonomy['plural_name'],
			'all_items' => 'All ' . $taxonomy['plural_name'],
			'parent_item' => 'Parent ' . $taxonomy['single_name'],
			'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
			'edit_item' => 'Edit ' . $taxonomy['single_name'],
			'update_item' => 'Update ' . $taxonomy['single_name'],
			'add_new_item' => 'Add New ' . $taxonomy['single_name'],
			'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
			'menu_name' => $taxonomy['plural_name']
		);
		
		$rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
		$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;
	
		register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
			'hierarchical' => $hierarchical,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => $rewrite,
			'show_admin_column' => true,
		));
	}
	
}
add_action( 'init', 'bc_register_taxonomies' );


?>