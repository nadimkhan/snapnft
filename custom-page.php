<?php
/**
 * Template Name: Custom Page Template
 */?>
<?php 
get_header();

// Start the loop.
while ( have_posts() ) : the_post();

  
  the_content();

  $metabox = get_post_custom();
  //print_r(maybe_unserialize($metabox));
  $header_mt = maybe_unserialize($metabox['hd_layout_field_id'][0]);
  $post_id = get_the_ID();

// Create an instance of Layout_Handler with the post ID
$layoutHandler = new Layout_Handler($post_id);

// Render layouts for 'hd_layout_field_id'
$layoutHandler->load_template($header_mt['template'], $header_mt['fields'] );

// Get the 'cn_layout_field_id' meta data
$cn_layout_field_id_data = maybe_unserialize($metabox['cn_layout_field_id'][0]);

//print_r($cn_layout_field_id_data);
error_log('layout data: ' . var_export($cn_layout_field_id_data, true));
// Check if the meta data is not empty
if ($cn_layout_field_id_data) {
  // Assuming $cn_layout_field_id_data is already an array; if not, you might need to unserialize it
  $cn_layout_data = $cn_layout_field_id_data;

  // Check if the data is an array
  if (is_array($cn_layout_data)) {
      // Loop through each item in the array and render the layout
      foreach ($cn_layout_data as $layout_data) {
          // Check if 'template' key is set and not empty
          if (isset($layout_data['template']) && !empty($layout_data['template'])) {
              // Check if 'fields' key is set; if not, initialize it as an empty array
              $fields = isset($layout_data['fields']) ? $layout_data['fields'] : array();
              // Call load_template with the template and fields
              $layoutHandler->load_template($layout_data['template'], $fields);
          } else {
              // Log an error or handle the case where 'template' key is not set or is empty
              error_log('Template key not found or is empty in layout data: ' . var_export($layout_data, true));
          }
      }
  } else {
      // Handle the case where $cn_layout_data is not an array
      error_log('$cn_layout_data is not an array: ' . var_export($cn_layout_data, true));
  }
} else {
  // Handle the case where $cn_layout_field_id_data is empty
  error_log('$cn_layout_field_id_data is empty for post ID: ' . $post_id);
}



// End the loop.
endwhile;

get_footer();
?>
