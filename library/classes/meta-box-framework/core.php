<?php
/**
 * Meta Box Framework Core
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Meta_Box_Framework_Core' ) ) {

    class Meta_Box_Framework_Core {

        /**
         * Instance of the class.
         */
        private static $instance = null;

        /**
         * Get the instance of the class.
         */
        public static function get_instance() {
            if ( is_null( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }
        /**
     * Enqueue admin styles.
     */
    

        /**
         * Constructor.
         */
        private function __construct() {
            $this->define_constants();
            $this->includes();
            $this->init_hooks();
        }

        /**
         * Define constants.
         */
        private function define_constants() {
            define( 'MBF_VERSION', '1.0.0' );
            define( 'MBF_PATH', get_template_directory() . '/library/classes/meta-box-framework/' ); // This remains unchanged
            define( 'MBF_URL', get_template_directory_uri() . '/library/classes/meta-box-framework/' );
        }

        /**
         * Include required files.
         */
        private function includes() {
            require_once MBF_PATH . 'fields/text.php';
            require_once MBF_PATH . 'fields/textarea.php';
            require_once MBF_PATH . 'fields/radio.php';
            require_once MBF_PATH . 'fields/checkbox.php';
            require_once MBF_PATH . 'fields/select.php';
            require_once MBF_PATH . 'fields/wysiwyg.php';
            require_once MBF_PATH . 'fields/image-uploads.php';
            require_once MBF_PATH . 'fields/file-uploads.php';
            require_once MBF_PATH . 'fields/content-select.php';
            require_once MBF_PATH . 'fields/date-field.php';
            require_once MBF_PATH . 'fields/color-field.php';
            require_once MBF_PATH . 'fields/time-field.php';
            require_once MBF_PATH . 'fields/layout.php';
            require_once MBF_PATH . 'fields/repeater.php';
            require_once MBF_PATH . 'admin/admin-functions.php';
            require_once MBF_PATH . 'public/public-functions.php';
        }

        /**
         * Enqueue admin styles.
         */
        public function mbf_enqueue_admin_styles() {
            // Construct the URL to the CSS file
            $css_url = MBF_URL . 'assets/css/admin-style.css';
            // Enqueue the stylesheet
            wp_enqueue_style('mbf-admin-styles', $css_url);
            wp_enqueue_style('jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css');
            // Enqueue the WordPress color picker styles
            wp_enqueue_style('wp-color-picker');
        }
        
        function mbf_enqueue_admin_scripts() {
            wp_enqueue_editor();
            wp_enqueue_media();
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-sortable');
            wp_enqueue_script('wp-color-picker');
            wp_enqueue_script('jquery-ui-datepicker');
            wp_enqueue_script('mbf-time-picker', MBF_URL . 'assets/js/addons/jquery-ui-timepicker.js', '', '1.0.0', true);
            wp_enqueue_script('mbf-image-upload', MBF_URL . 'assets/js/mbf-image-upload.js', '', '1.0.0', true);
            wp_enqueue_script('mbf-main', MBF_URL . 'assets/js/mbf-main.js', array('jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'mbf-image-upload', 'wp-color-picker','jquery-ui-datepicker','mbf-time-picker' ), '', true);
        }
        
       
        /**
         * Initialize hooks.
         */
        private function init_hooks() {
            add_action( 'init', array( $this, 'init' ), 0 );
            add_action( 'add_meta_boxes', array( $this, 'register_all_meta_boxes' ) );
            add_action( 'save_post', array( __CLASS__, 'save_meta_box_data' ) );
            add_action( 'admin_enqueue_scripts', array( $this, 'mbf_enqueue_admin_styles' ) ); // Add this line
            add_action( 'admin_enqueue_scripts', array( $this, 'mbf_enqueue_admin_scripts' ) ); // Add this line
        }

        /**
         * Initialization.
         */
        public function init() {
            // This is where we can register custom post types, taxonomies, etc.
        }

        
        public static function register_all_meta_boxes() {
            include_once get_template_directory( ) . '/library/functions/metaboxes.php'; // Update the path accordingly
            global $meta_boxes;
            self::register_meta_boxes();
        }
        
        
        
        

        public static function register_meta_boxes() {
            global $meta_boxes;
            if (!is_array($meta_boxes)) {
                return;
            }
        
            foreach ($meta_boxes as $meta_box) {
                if (isset($meta_box['sections']) && is_array($meta_box['sections'])) {
                    add_meta_box(
                        $meta_box['id'],
                        $meta_box['title'],
                        array(__CLASS__, 'display_meta_box'),
                        $meta_box['post_type'],
                        $meta_box['context'],
                        $meta_box['priority'],
                        $meta_box['sections']
                    );
                } else {
                    error_log('Sections not defined properly for metabox with ID: ' . $meta_box['id']);
                }
            }
        }
        
        public static function render_tabs($tabs) {
            if (!is_array($tabs) || empty($tabs)) {
                return;
            }
            echo '<ul class="tabs">';
            foreach ($tabs as $tab_id => $tab_name) {
                echo '<li class="tab-link" data-tab="' . esc_attr($tab_id) . '">' . esc_html($tab_name) . '</li>';
            }
            echo '</ul>';
        }
        
        public static function display_meta_box($post, $metabox) {
            $sections = $metabox['args'];
            wp_nonce_field('mbf_meta_box_nonce', 'mbf_meta_box_nonce_field');
        
            $serialized_data = get_post_meta($post->ID, $metabox['id'] . '_serialized_data', true);
            if (!is_array($serialized_data)) {
                $serialized_data = array();
            }
        
            $tabs = array();
            foreach ($sections as $section) {
                $tab_id = isset($section['tab']) ? $section['tab'] : 'general';
                $tabs[$tab_id] = $section;
            }
        
            self::render_tabs(array_column($sections, 'tab_title', 'tab'));
        
            foreach ($tabs as $tab_id => $section) {
                echo '<div id="' . esc_attr($tab_id) . '" class="tab-content">';
                foreach ($section['fields'] as $field) {
                    $field['value'] = isset($serialized_data[$field['id']]) ? $serialized_data[$field['id']] : '';
                    //call_user_func(array('MBF_Field_' . ucfirst($field['type']), 'render'), $field);
                    if ($field['type'] === 'layout_radio' || $field['type'] === 'layout_checkbox') {
                        // Call the render method of MBF_Field_Layout for layout_radio and layout_checkbox field types
                        call_user_func(array('MBF_Field_Layout', 'render'), $field);
                    } else {
                        // Call the render method of the appropriate field class for other field types
                        call_user_func(array('MBF_Field_' . ucfirst($field['type']), 'render'), $field);
                    }
                }
                echo '</div>';
            }
        }
        

        
        public static function sanitize_and_remove_index($array) {
            $sanitized_array = array();
            
        
            foreach ($array as $key => $value) {
                if ($key !== '__index__') {
                    if (is_array($value)) {
                        // Recursive call for nested arrays
                        $sanitized_array[$key] = self::sanitize_and_remove_index($value);
                    } else {
                        // Sanitize the value if necessary
                        $sanitized_array[$key] = wp_kses_post($value);
                    }
                }
            }
        
            return $sanitized_array;
        }
        
        
        

        public static function save_meta_box_data( $post_id ) {
            $allowed_tags = array(
                'a' => array(
                    'href' => array(),
                    'title' => array()
                ),
                'br' => array(),
                'em' => array(),
                'strong' => array(),
                'p' => array(),
                'h1' => array(),
                'h2' => array(),
                'h3' => array(),
                'h4' => array(),
                'h5' => array(),
                'h6' => array(),
            );
            mbf_load_metabox_configurations();
            self::register_all_meta_boxes();
            // Verify nonce.
            if ( ! isset( $_POST['mbf_meta_box_nonce_field'] ) || ! wp_verify_nonce( $_POST['mbf_meta_box_nonce_field'], 'mbf_meta_box_nonce' ) ) {            
                return;
            }
            // If this is an autosave, our form has not been submitted, so we don't want to do anything.
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                return;
            }
            // Check user permissions.
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return;
            }
            
            global $meta_boxes;
        
            if (is_array($meta_boxes)) {
                foreach ( $meta_boxes as $meta_box ) {
                   // error_log(print_r($_POST, true));
                    if (isset($meta_box['sections']) && is_array($meta_box['sections'])) {
                        foreach ($meta_box['sections'] as $section) {
                            if (isset($section['fields']) && is_array($section['fields'])) {
                                $serialized_data = array();
                                foreach ( $section['fields'] as $field ) {

                                    if ($field['type'] == 'checkbox') {
                                        // Handle checkbox data
                                        $checked_values = isset($_POST[$field['id']]) ? $_POST[$field['id']] : array();
                                        // Delete existing meta
                                        $delete_result = delete_post_meta($post_id, $field['id']);
                                        // Update meta
                                        $result = update_post_meta($post_id, $field['id'], $checked_values);                            
                                    } elseif ($field['type'] == 'text') {
                                        if (isset($_POST[$field['id']])) {
                                            $sanitized_content = wp_kses_post($_POST[$field['id']]);
                                            update_post_meta($post_id, $field['id'], $sanitized_content);
                                        // error_log('WYSIWYG update result for ' . $field['id'] . ': ' . ($result ? 'Success' : 'Failed')); // Debugging statement
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                            //error_log('WYSIWYG delete result for ' . $field['id'] . ': ' . ($delete_result ? 'Success' : 'Failed')); // Debugging statement
                                        }
                                    } elseif ($field['type'] == 'textarea') {
                                        if (isset($_POST[$field['id']])) {
                                            $sanitized_content = sanitize_textarea_field($_POST[$field['id']]);
                                            update_post_meta($post_id, $field['id'], $sanitized_content);
                                        // error_log('WYSIWYG update result for ' . $field['id'] . ': ' . ($result ? 'Success' : 'Failed')); // Debugging statement
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                            //error_log('WYSIWYG delete result for ' . $field['id'] . ': ' . ($delete_result ? 'Success' : 'Failed')); // Debugging statement
                                        }
                                    } elseif ($field['type'] == 'radio') {
                                        if (isset($_POST[$field['id']]) && array_key_exists($_POST[$field['id']], $field['options'])) {
                                            // Delete the old meta key
                                            delete_post_meta($post_id, $field['id']);
                                            // Add the new meta key with the updated data
                                            $result = add_post_meta($post_id, $field['id'], sanitize_text_field($_POST[$field['id']]), true);
                                            //error_log('Radio update result for ' . $field['id'] . ': ' . ($result ? 'Success' : 'Failed')); // Debugging statement
                                        } else {
                                            $delete_result = delete_post_meta($post_id, $field['id']);
                                            //error_log('Radio delete result for ' . $field['id'] . ': ' . ($delete_result ? 'Success' : 'Failed')); // Debugging statement
                                        }
                                    } elseif ($field['type'] == 'wysiwyg') {
                                        if (isset($_POST[$field['id']])) {
                                            $sanitized_content = wp_kses_post($_POST[$field['id']], $allowed_tags);
                                            update_post_meta($post_id, $field['id'], $sanitized_content);
                                        // error_log('WYSIWYG update result for ' . $field['id'] . ': ' . ($result ? 'Success' : 'Failed')); // Debugging statement
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                            //error_log('WYSIWYG delete result for ' . $field['id'] . ': ' . ($delete_result ? 'Success' : 'Failed')); // Debugging statement
                                        }
                                    } elseif ($field['type'] == 'image_upload') {
                                        if (isset($_POST[$field['id']])) {
                                            $image_url = esc_url_raw($_POST[$field['id']]);
                                            update_post_meta($post_id, $field['id'], $image_url);
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                        }
                                    } elseif ($field['type'] == 'file_upload') {
                                        if (isset($_POST[$field['id']])) {
                                            $image_url = esc_url_raw($_POST[$field['id']]);
                                            update_post_meta($post_id, $field['id'], $image_url);
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                        }
                                    } elseif ($field['type'] == 'date') {
                                        if (isset($_POST[$field['id']])) {
                                            $date_value = sanitize_text_field($_POST[$field['id']]);
                                            update_post_meta($post_id, $field['id'], $date_value);
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                        }
                                    } elseif ($field['type'] == 'color') {
                                        if (isset($_POST[$field['id']])) {
                                            $color_value = sanitize_text_field($_POST[$field['id']]);
                                            update_post_meta($post_id, $field['id'], $color_value);
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                        }
                                    } elseif ($field['type'] == 'time') {
                                        if (isset($_POST[$field['id']])) {
                                            $time_value = sanitize_text_field($_POST[$field['id']]);
                                            update_post_meta($post_id, $field['id'], $time_value);
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                        }
                                    }
                                    elseif ($field['type'] == 'repeater') {
                                        $repeater_data = array();
                                    
                                        //error_log('POSt Data: ' . print_r($_POST, true));
                                    
                                        if (isset($_POST[$field['id']]) && is_array($_POST[$field['id']])) {
                                            foreach ($_POST[$field['id']] as $repeater_index => $repeater_item) {
                                                if ($repeater_index === '__index__') {
                                                    continue; // Skip the template data
                                                }
                                                //error_log('Repeater field data: ' . print_r($field['sub_fields'], true));
                                                foreach ($field['sub_fields'] as $sub_field) {
                                                    $sub_field['repeater_id'] = $field['id'];
                                                    $sub_field['repeater_index'] = $repeater_index;
                                    
                                                    if (isset($repeater_item[$sub_field['id']])) {
                                                        $value = $repeater_item[$sub_field['id']];
                                                        if (is_array($value) && isset($value['__index__'])) {
                                                            unset($value['__index__']);  // Remove the template index
                                                        }
                                                        //error_log('Processing sub_field with ID: ' . $sub_field['id']);

                                                        switch ($sub_field['type']) {
                                                            case 'text':
                                                            case 'radio':                                                    
                                                                $repeater_data[$repeater_index][$sub_field['id']] = sanitize_text_field($value);
                                                            break;
                                                            case 'textarea':
                                                                $repeater_data[$repeater_index][$sub_field['id']] = sanitize_textarea_field($value);
                                                            break;
                                                            // In your save function
                                                            case 'checkbox':
                                                                $repeater_data[$repeater_index][$sub_field['id']] = isset($repeater_item[$sub_field['id']]) ? $repeater_item[$sub_field['id']] : array();
                                                            break;
                                                            case 'select':  // Add this case for the select box
                                                                $repeater_data[$repeater_index][$sub_field['id']] = sanitize_text_field($value);
                                                            break;
                                                            case 'content_select':  // For the content_select field                                                    
                                                                $repeater_data[$repeater_index][$sub_field['id']] = intval($value);
                                                            break;
                                                            case 'wysiwyg':
                                                                $wysiwyg_value = $_POST[$field['id']][$repeater_index][$sub_field['id']];
                                                                $repeater_data[$repeater_index][$sub_field['id']] = wp_kses($wysiwyg_value, $allowed_tags);
                                                            break;
                                                            case 'date':
                                                                $repeater_data[$repeater_index][$sub_field['id']] = sanitize_text_field($value);
                                                            break;
                                                            case 'color':
                                                                $repeater_data[$repeater_index][$sub_field['id']] = sanitize_hex_color($value);
                                                            break;
                                                            case 'time':
                                                                $repeater_data[$repeater_index][$sub_field['id']] = sanitize_text_field($value);
                                                            break;
                                                            case 'image_upload':
                                                                if (isset($repeater_item[$sub_field['id']])) {
                                                                    $image_url = esc_url_raw($repeater_item[$sub_field['id']]);
                                                                    $repeater_data[$repeater_index][$sub_field['id']] = $image_url;
                                                                }                                                    
                                                            break;
                                                            case 'file_upload':
                                                                if (isset($repeater_item[$sub_field['id']])) {
                                                                    $file_url = esc_url_raw($repeater_item[$sub_field['id']]);
                                                                    $repeater_data[$repeater_index][$sub_field['id']] = $image_url;
                                                                }                                                    
                                                            break;
                                                            case 'layout':
                                                                $repeater_data[$repeater_index][$sub_field['id']] = sanitize_text_field($value);
                                                            break;
                                                            // Add other field types as needed
                                                        }
                                                    }
                                                }
                                            }
                                    
                                            // Update or add the meta key with the updated data
                                            //delete_post_meta($post_id, $field['id']);
                                            update_post_meta($post_id, $field['id'], $repeater_data);
                                            error_log('Saved repeater data for ' . $field['id'] . ': ' . print_r($repeater_data, true));
                                    
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                        }                        
                                    } elseif ($field['type'] == 'layout_radio' || $field['type'] == 'layout_checkbox') {
                                        //error_log('RAW Data: ' . print_r($_POST, true));
                                    
                                        // Check if the field ID exists in $_POST
                                        if (isset($_POST[$field['id']])) {
                                            // Retrieve the layout data from $_POST
                                            $layout_data = $_POST[$field['id']];
                                    
                                            // Sanitize and remove __index__ arrays
                                            $sanitized_layout_data = self::sanitize_and_remove_index($layout_data);
                                    
                                            // Save the sanitized and restructured layout data to post meta
                                            update_post_meta($post_id, $field['id'], $sanitized_layout_data);
                                        } else {
                                            // If no layout data is provided, delete the existing layout data
                                            delete_post_meta($post_id, $field['id']);
                                        }
                                    }
                                    
                                    
                                    
                                    
                                    elseif ($field['type'] == 'content_select') {
                                        if (isset($_POST[$field['id']])) {
                                            $content_id = intval($_POST[$field['id']]);
                                            update_post_meta($post_id, $field['id'], $content_id);
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                        }
                                    } elseif ($field['type'] == 'select'){
                                        $select_name = $field['id'];                            
                                        if (isset($_POST[$select_name])) {
                                            $selected_value = sanitize_text_field($_POST[$select_name]);                                
                                            update_post_meta($post_id, $field['id'], $selected_value);
                                        } else {
                                            delete_post_meta($post_id, $field['id']);
                                        }
                                    }
                                    
                                    elseif (isset($field['searchable']) && $field['searchable']) {
                                        $result = update_post_meta($post_id, $field['id'], sanitize_text_field($_POST[$field['id']]));
                                    } else {
                                        if (isset($_POST[$field['id']])) {
                                            $serialized_data[$field['id']] = sanitize_text_field($_POST[$field['id']]);
                                        } else {
                                            $serialized_data[$field['id']] = ''; // or some default value
                                        }
                                    
                                    }
                                }
                                // Use the meta box ID for serialized data to ensure it's unique and identifiable.
                                update_post_meta($post_id, $meta_box['id'] . '_serialized_data', $serialized_data);
                            } else {
                                error_log('Fields not defined properly for section within metabox with ID: ' . $meta_box['id']);
                            }
                        }
                    } else {
                        error_log('Sections not defined properly for metabox with ID: ' . $meta_box['id']);
                    }
                }
            } else {
                error_log('The $meta_boxes variable is not an array.');
            }
            return;
        }
        
        
        
        
    } //class ends here

    // Initialize the core.
    Meta_Box_Framework_Core::get_instance();
    add_filter( 'mbf_meta_boxes', function( $boxes ) {
        global $meta_boxes; // This fetches the $meta_boxes array from custom-page-metabox.php
        if ( ! isset( $meta_boxes ) || ! is_array( $meta_boxes ) ) {
            $meta_boxes = array();
        }
        return array_merge( $boxes, $meta_boxes );
    }, 10, 1 );
    
}
?>
