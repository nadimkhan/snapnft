<?php
/**
 * Color Field for Meta Box Framework
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! class_exists( 'MBF_Field_Color' ) ) {

    class MBF_Field_Color {

        public static function render( $args ) {
            $value = isset( $args['value'] ) ? $args['value'] : '';
            if ( empty( $value ) && isset( $args['id'] ) ) {
                $value = get_post_meta( get_the_ID(), $args['id'], true );
            }

            // Update the value in $args
            $args['value'] = $value;

            echo '<div class="mbf-field postbox">';
                echo '<div class="mbf-label-desc form-field" >';
                echo '<label for="' . esc_attr($args['id']) . '">' . esc_html($args['name']) . '</label>';
                if ( ! empty( $args['desc'] ) ) {
                    echo '<p class="description">' . esc_html( $args['desc'] ) . '</p>';
                }
                echo '</div>';
            echo '<div class="mbf-input">';
                echo '<div class="mbf-form-element">';
                   // echo '<input type="text" class="mbf-color-picker-display" id="' . esc_attr( $args['id'] ) . '_display" value="' . esc_attr( $args['value'] ) . '" />';
                   $value = (isset($args['value']) && !empty($args['value'])) ? esc_attr($args['value']) : '#ffffff';
                    echo '<input type="color" class="mbf-color-picker" id="' . esc_attr( $args['id'] ) . '" name="' . esc_attr( $args['id'] ) . '" value="' . $value . '" style="display:block;" />';
                echo '</div>';
                echo '</div>';
            echo '</div>';

            
        }
        
    }
}
?>
