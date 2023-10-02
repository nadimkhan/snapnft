<?php 
   //class Tailwind_Walker_Nav_Menu extends Walker_Nav_Menu {
    class Tailwind_Walker_Nav_Menu extends Walker_Nav_Menu {
        public function start_lvl(&$output, $depth = 0, $args = null) {
            if(isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat($t, $depth);
            $classes = ['absolute', 'right-0', 'z-10', 'mt-2', 'w-56', 'origin-top-right', 'rounded-md', 'bg-white', 'shadow-lg', 'ring-1', 'ring-black', 'ring-opacity-5', 'focus:outline-none'];
    
            $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
    
            $output .= "{$n}{$indent}<div$class_names role=\"menu\" aria-orientation=\"vertical\" aria-labelledby=\"menu-button\" tabindex=\"-1\"><div class=\"py-1\" role=\"none\">{$n}";
        }
    
        public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
            if(isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ($depth) ? str_repeat($t, $depth) : '';
    
            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
    
            $args = apply_filters('nav_menu_item_args', $args, $item, $depth);
    
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
    
            $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';
    
            $output .= $indent . '<div' . $id . $class_names .'>';
    
            $atts = array();
            $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
            $atts['target'] = ! empty($item->target)     ? $item->target     : '';
            $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
            $atts['href']   = ! empty($item->url)        ? $item->url        : '';
    
            $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
    
            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }
    
            $title = apply_filters( 'the_title', $item->title, $item->ID );
    
            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
    
            $item_output = $args->before;
            $item_output .= '<a' . $attributes . ' class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1">';
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;
    
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    
        public function end_el( &$output, $item, $depth = 0, $args = null ) {
            if(isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $output .= "</div>{$n}";
        }
    
        public function end_lvl( &$output, $depth = 0, $args = null ) {
            if(isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat($t, $depth);
            $output .= "$indent</div></div>{$n}";
        }
    }
    
    
?>