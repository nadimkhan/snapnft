<?php
/**
 * Template Name: Custom Page Template
 */
get_header();

// Start the loop.
while ( have_posts() ) : the_post();
  
  

  $metabox = get_post_custom();
  
  // Check if 'hd_layout_field_id' and 'cn_layout_field_id' are set and not empty
  if (isset($metabox['hd_layout_field_id'][0]) && !empty($metabox['hd_layout_field_id'][0])) {
      $header_mt = maybe_unserialize($metabox['hd_layout_field_id'][0]);
      $post_id = get_the_ID();

      // Create an instance of Layout_Handler with the post ID
      $layoutHandler = new Layout_Handler($post_id);

      // Check if 'template' and 'fields' keys are set in $header_mt
      if (isset($header_mt['template']) && !empty($header_mt['template']) && isset($header_mt['fields'])) {
          // Render layouts for 'hd_layout_field_id'
          $layoutHandler->load_template($header_mt['template'], $header_mt['fields']);
      }
  }
  if(!is_page(array(61,63,55,59,3,28))){
    get_template_part( 'templates/parts/content', 'breadcrumbs' ); 
  }
  ?>
  <?php if(is_page(array(28, 30, 3, 33, 55, 59, 63))){ ?>
    <?php if(is_page(array(33))){ ?>
        <section class="xl:pt-20 pt-4 lg:pt-10 -mb-[50px] xl:-mb-[100px] px-4 lg:px-0">
    <?php } else { ?> 
        <section class="lg:py-20 py-4 px-4 lg:px-0">
    <?php } ?>
  
  <div class="container mx-auto">
     <?php if(!is_page(array(30))){ ?>
      <h2 class="text-center font-larken text-[32px] md:text-[42px] font-light mb-4 leading-[36px] md:leading-[46px]"><?php the_title(); ?></h2>
      <?php } ?>
      <?php if(is_page(array(33))){ ?>
        <div class="mx-auto xl:w-1/2 lg:w-3/5 w-full text-center mb-10 pt-5 px-8">
        <?php } elseif(is_page(array(30))){ ?> 
            <div class="w-full lg:w-1/2 mx-auto">
        <?php } else { ?>
            <div class="mx-auto w-full lg:w-5/6 mb-10 pt-5">
        <?php } ?>
           <?php if(is_page(array(30))){ ?>
            <?php the_content(); ?>
            <?php } else { ?> 
                <div class="post-container">
                <?php the_content(); ?>
                </div>
          <?php } ?> 
      </div>
      
      
  </div>

  </section>
  <?php } ?>
  <?php
  // Check if 'cn_layout_field_id' is set and not empty
  if (isset($metabox['cn_layout_field_id'][0]) && !empty($metabox['cn_layout_field_id'][0])) {
      $cn_layout_field_id_data = maybe_unserialize($metabox['cn_layout_field_id'][0]);

      // Check if $cn_layout_field_id_data is an array
      if (is_array($cn_layout_field_id_data)) {
          foreach ($cn_layout_field_id_data as $layout_data) {
              // Check if 'template' key is set and not empty in $layout_data
              if (isset($layout_data['template']) && !empty($layout_data['template'])) {
                  // Check if 'fields' key is set in $layout_data; if not, initialize it as an empty array
                  $fields = isset($layout_data['fields']) ? $layout_data['fields'] : array();
                  // Call load_template with the template and fields
                  $layoutHandler->load_template($layout_data['template'], $fields);
              }
          }
      }
  }

// End the loop.
endwhile;

get_footer();
?>
