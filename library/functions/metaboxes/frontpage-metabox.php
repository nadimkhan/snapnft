<?php

  $front_slider_config = array(
    'id'             => 'front_meta',          // meta box id, unique per meta box
    'title'          => 'Slider Box',          // meta box title
    'pages'          => array('page'),    // post types, accept custom post types as well, default is array('post'); optional
    'context'        => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'       => 'high',            // order of meta box: high (default), low; optional
    'fields'         => array(),            // list of meta fields (can be added by field arrays)
    'local_images'   => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => get_template_directory_uri() . '/library/classes/meta-box-class'          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  	);
  
  
  /*
   * Initiate your meta box
   */
  $front_slider =  new AT_Meta_Box($front_slider_config);
  
  /*
   * Add fields to your meta box
   */
  
  
  $repeater_fields[] = $front_slider->addImage($prefix.'slider_image',array('name'=> 'Slider Image '),true); 
  $repeater_fields[] = $front_slider->addText($prefix.'slider_url',array('name'=> 'Deal URL '),true); 
  
  
  
  $front_slider->addRepeaterBlock($prefix.'re_slider',array(
    'inline'   => false, 
    'name'     => 'Slider',
    'fields'   => $repeater_fields, 
    'sortable' => true
  ));
  
  
  //Finish Meta Box Declaration 
  $front_slider->Finish();