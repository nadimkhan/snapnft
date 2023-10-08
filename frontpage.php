<?php
/**
 * Template Name: Front Page Template
 */?>
<?php 
get_header();

// Start the loop.
while ( have_posts() ) : the_post();

  // Display the page content
  the_content();

  // Display custom text input fields
  $custom_text_field_1_value = get_post_meta(get_the_ID(), 'custom_text_field_1', true);
  $custom_text_field_2_value = get_post_meta(get_the_ID(), 'custom_text_field_2', true);

  // Output the custom fields
  if (!empty($custom_text_field_1_value)) {
      echo '<p>Custom Text Field 1: ' . esc_html($custom_text_field_1_value) . '</p>';
  }

  if (!empty($custom_text_field_2_value)) {
      echo '<p>Custom Text Field 2: ' . esc_html($custom_text_field_2_value) . '</p>';
  }

// End the loop.
endwhile;

get_footer();
?>
