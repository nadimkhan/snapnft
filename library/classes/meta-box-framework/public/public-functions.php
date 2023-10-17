<?php
class Layout_Handler {
    private $post_id;

    public function __construct($post_id) {
        $this->post_id = $post_id;
    }

    function render_layout($meta_key) {
        $serialized_meta_data = get_post_meta($this->post_id, $meta_key, true);
    
        // Check if data is not empty
        if (!$serialized_meta_data) {
            error_log("No meta data found for key: {$meta_key}");
            return;
        }
    
        // Attempt to unserialize the data
        $meta_data = maybe_unserialize($serialized_meta_data);
    
        // Check if unserialization was successful
        if ($meta_data === false && $serialized_meta_data !== 'b:0;') {
            error_log("Failed to unserialize meta data for key: {$meta_key}");
            return;
        }
    
        // If $meta_data is an array, handle multiple templates
        if (is_array($meta_data)) {
            // Check if it's the hd_layout_field_id structure
            if (isset($meta_data['template']) && isset($meta_data['fields'])) {
                $this->load_template($meta_data['template'], $meta_data['fields']);
            }
            // Otherwise, assume it's the cn_layout_field_id structure
            else {
                foreach ($meta_data as $data) {
                    if (isset($data['template']) && isset($data['fields'])) {
                        $this->load_template($data['template'], $data['fields']);
                    } else {
                        error_log('Unexpected array structure: ' . var_export($data, true));
                    }
                }
            }
        } else {
            error_log('Unexpected meta data format for key: ' . $meta_key);
        }
    }
    
    
    
    
    function load_template($template, $data = array()) {
        $template_file = get_template_directory() . "/templates/layouts/{$template}.php";
    
        if (file_exists($template_file)) {
            extract($data, EXTR_SKIP);
            include $template_file;
            //echo $template_file;
        } else {
            error_log("Template file not found: {$template_file}");
        }
    }
    
}
?>
