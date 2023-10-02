<?php

  $trans_config = array(
    'id'             => 'order_info',          // meta box id, unique per meta box
    'title'          => 'Meta Box for Order details',          // meta box title
    'pages'          => array('transaction'),    // post types, accept custom post types as well, default is array('post'); optional
    'context'        => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'priority'       => 'high',            // order of meta box: high (default), low; optional
    'fields'         => array(),            // list of meta fields (can be added by field arrays)
    'local_images'   => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => get_template_directory_uri() . '/library/classes/meta-box-class'          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
   */
  $trans_meta =  new AT_Meta_Box($trans_config);
  
  /*
   * Add fields to your meta box
   */
  $trans_meta->addText($prefix.'order_id',array('name'=> 'Order ID ')); 
  $trans_meta->addText($prefix.'order_type',array('name'=> 'Order Type '));
  $trans_meta->addText($prefix.'order_amount',array('name'=> 'Amount '));
  
  $trans_meta->Finish();





  