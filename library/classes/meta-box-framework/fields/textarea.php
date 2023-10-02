<?php
/**
 * Textarea Field for Meta Box Framework
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class MBF_Field_Textarea {

    /**
     * Render the textarea field.
     *
     * @param array $args Field arguments.
     */
    public static function render( $args ) {
        $value = isset( $args['value'] ) ? $args['value'] : '';
        if ( empty( $value ) && isset( $args['id'] ) ) {
            $value = get_post_meta( get_the_ID(), $args['id'], true );
        }

        // Update the value in $args
        $args['value'] = $value;

        $defaults = array(
            'id'    => '',
            'name'  => '',
            'value' => '',
            'desc'  => '',
        );

        $args = wp_parse_args( $args, $defaults );
        echo '<div class="mbf-field postbox">';
            echo '<div class="mbf-label-desc form-field" >';
                echo '<label for="' . esc_attr( $args['id'] ) . '">' . esc_html( $args['name'] ) . '</label>';
                if ( ! empty( $args['desc'] ) ) {
                    echo '<p class="description">' . esc_html( $args['desc'] ) . '</p>';
                }
                echo '</div>';
                echo '<div class="mbf-input">';
                    echo '<div class="mbf-form-element">';
                        echo '<textarea id="' . esc_attr( $args['id'] ) . '" name="' . esc_attr( $args['id'] ) . '" class="large-text" rows="4">' . esc_textarea( $args['value'] ) . '</textarea>';
                    echo '</div>';
            echo '</div>';
    echo '</div>';

       
    }
}
