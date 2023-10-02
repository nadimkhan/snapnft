<?php
if (is_admin()){
  /* 
   * prefix of meta keys, optional
   */
  $prefix = '_';
  /* 
   * configure your meta box
   */
  $config = array(
    'id' => 'store_metabox',          // meta box id, unique per meta box
    'title' => 'Store Meta Box',          // meta box title
    'pages' => array('store'),        // taxonomy name, accept categories, post_tag and custom taxonomies
    'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
    'fields' => array(),            // list of meta fields (can be added by field arrays)
    'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
    'use_with_theme' => get_template_directory_uri() . '/library/classes/tax-meta-class'         //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
  );
  
  
  /*
   * Initiate your meta box
   */
  $my_meta =  new Tax_Meta_Class($config);
  
  /*
   * Add fields to your meta box
   */
  
  //text field
  $my_meta->addImage($prefix.'store_image',array('name'=> 'Store Image '));
  
  
  //Finish Meta Box Decleration
  $my_meta->Finish();
}