<?php

  $project_config = array(
    'id'             => 'project_info',          // meta box id, unique per meta box
    'title'          => 'Meta Box for Project details',          // meta box title
    'pages'          => array('projects'),    // post types, accept custom post types as well, default is array('post'); optional
    'context'        => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'       => 'high',            // order of meta box: high (default), low; optional
    'fields'         => array(),            // list of meta fields (can be added by field arrays)
    'local_images'   => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => get_template_directory_uri() . '/library/classes/meta-box-class'          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
   */
  $project_meta =  new AT_Meta_Box($project_config);
  
  /*
   * Add fields to your meta box
   */
  $project_meta->addRadio($prefix.'images_type_field_id',array('parallax'=>'Parallax','carousel'=>'Carousel'),array('name'=> 'Type of Header Images', 'std'=> array('parallax')));
  $project_fields[] = $project_meta->addText($prefix.'project_text',array('name'=> 'Text over Image '),true); 
  $project_fields[] = $project_meta->addImage($prefix.'header_image',array('name'=> 'Image URL '),true);
  $project_meta->addRepeaterBlock($prefix.'re_project_images',array(
    'inline'   => false, 
    'name'     => 'Project Images',
    'fields'   => $project_fields, 
    'sortable' => true
  ));

  $project_meta->addText($prefix.'contrack_address',array('name'=> 'Contract Address '));
  $project_meta->addText($prefix.'network_name',array('name'=> 'Network Name '));
  $project_meta->addText($prefix.'network_url',array('name'=> 'Network URL '));
  $project_meta->addText($prefix.'marketplace_name',array('name'=> 'Marketplace Name '));
  $project_meta->addText($prefix.'marketplace_url',array('name'=> 'Marketplace URL '));
  $project_meta->addText($prefix.'total_supply',array('name'=> 'Total Supply '));
  $project_meta->addText($prefix.'price_per_token',array('name'=> 'Token Price '));

  $project_social_fields[] = $project_meta->addText($prefix.'project_social_details',array('name'=> 'Project Contact Info '),true); 


   
   
 

  $project_meta->addRepeaterBlock($prefix.'re_project_contacts',array(
    'inline'   => false, 
    'name'     => 'Project Contact and Social Info',
    'fields'   => $project_social_fields, 
    'sortable' => true
  ));
    
  
  $project_meta->Finish();





  