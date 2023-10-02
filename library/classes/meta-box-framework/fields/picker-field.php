<?php
/**
 * Picker Field (Color, Date, Time) for Meta Box Framework
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! class_exists( 'MBF_Field_Picker' ) ) {

    class MBF_Field_Picker {

        /**
         * Render the picker field based on type.
         *
         * @param array $args Field arguments.
         */
        public static function render( $args ) {
            $value = isset( $args['value'] ) ? $args['value'] : '';
            if ( empty( $value ) && isset( $args['id'] ) ) {
                global $post;
                $value = get_post_meta( $post->ID, $args['id'], true );
            }
        
            // Update the value in $args
            $args['value'] = $value;
        
            $defaults = array(
                'id'    => '',
                'name'  => '',
                'value' => '',
                'label' => '',
                'desc'  => '',
                'type'  => 'text' // default to text if no type is provided
            );
        
            $args = wp_parse_args( $args, $defaults );

            // Depending on the type, enqueue necessary scripts and styles
            switch ($args['type']) {
                case 'color':                    
                    $class = 'mbf-color-picker';
                    break;
                case 'date':
                    // Enqueue date picker scripts and styles here
                    $class = 'mbf-date-picker';
                    break;
                case 'time':
                    // Enqueue time picker scripts and styles here
                    $class = 'mbf-time-picker';
                    break;
                default:
                    $class = '';
                    break;
            }

            echo '<div class="mbf-field postbox">';
                echo '<div class="mbf-label-desc form-field" >';
                echo '<label for="' . esc_attr($args['id']) . '">' . esc_html($args['label']) . '</label>';
                if ( ! empty( $args['desc'] ) ) {
                    echo '<p class="description">' . esc_html( $args['desc'] ) . '</p>';
                }
                echo '</div>';
            echo '<div class="mbf-input">';
                echo '<div class="mbf-form-element">';
                    echo '<input type="text" class="' . esc_attr($class) . '" id="' . esc_attr( $args['id'] ) . '" name="' . esc_attr( $args['id'] ) . '" value="' . esc_attr( $args['value'] ) . '" />';
                echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
}
?>
