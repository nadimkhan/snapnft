<?php 
   class Tailwind_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        // Add a custom class for targeting with CSS
        $output .= '<ul class="submenu relative px-2 py-2 ease-in-out transition-all duration-700 transform opacity-0 custom-hidden text-[18px]">';
    }
    

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
    
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
    
        $output .= $indent . '<li' . $class_names . '>';
    
        $icon = '';
        if (in_array('menu-item-has-children', $item->classes)) {
            // Add Font Awesome chevron down icon for items with submenus
            $icon = '<i class="fas fa-chevron-down ml-2"></i>';
        }
    
        // Add Tailwind classes to style the menu item
        $output .= '<a href="' . esc_attr($item->url) . '" class="text-white block  py-1 relative">' . $item->title . $icon . '</a>';
    }
    
    
}


?>