<?php
class MBF_Field_Content_Select {

    public static function render( $field ) {
        // Determine if this field is inside a repeater
        $is_repeater = isset($field['repeater']) && $field['repeater'];

        // Adjust the name and value retrieval based on whether it's in a repeater
        if ($is_repeater) {            
            $value = isset($field['value']) ? $field['value'] : '';
        } else {            
            $value = get_post_meta(get_the_ID(), $field['id'], true);
        }
        $name = $field['id'];

        $content_types = isset($field['content_types']) ? $field['content_types'] : array('page');
        $args = array('public' => true, '_builtin' => false);
        $post_types = get_post_types($args, 'objects');

        echo '<div class="mbf-field postbox">';
            echo '<div class="mbf-label-desc form-field">';
                echo '<label>' . esc_html( $field['name'] ) . '</label>';
                if ( isset( $field['desc'] ) ) {
                    echo '<p class="description">' . esc_html( $field['desc'] ) . '</p>';
                }
            echo '</div>';
            echo '<div class="mbf-input">';
                echo '<select name="' . esc_attr( $name ) . '">';
                    echo '<option value="">Select content</option>'; // Default option

                    foreach ($content_types as $content_type) {
                        if (in_array($content_type, array('post', 'page')) || array_key_exists($content_type, $post_types)) {
                            $items = get_posts(array('post_type' => $content_type, 'numberposts' => -1));
                            foreach ($items as $item) {
                                $selected = ($value == $item->ID) ? 'selected' : '';
                                echo '<option value="' . $item->ID . '" ' . $selected . '>' . $item->post_title . ' (' . ucfirst($content_type) . ')</option>';
                            }
                        } elseif (taxonomy_exists($content_type)) {
                            $terms = get_terms(array('taxonomy' => $content_type, 'hide_empty' => false));
                            foreach ($terms as $term) {
                                $selected = ($value == $term->term_id) ? 'selected' : '';
                                echo '<option value="' . $term->term_id . '" ' . $selected . '>' . $term->name . ' (' . ucfirst($content_type) . ')</option>';
                            }
                        }
                    }

                echo '</select>';
            echo '</div>';
        echo '</div>';
    }
}


?>