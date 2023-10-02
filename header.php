<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    

    <header class="top-0 bg-white w-full z-50 h-20 flex items-center justify-center px-4 pt-8 mb-[80px]">
        <div class="max-w-screen-xl mx-auto flex justify-between items-center w-full">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php echo get_template_directory_uri() . '/images/snapnft_logo.svg'; ?>" alt="<?php bloginfo('name'); ?>" class="w-[150px] h-auto"/>
            </a>
            <nav class="main-navigation">
            <?php
               wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'       => 'ul',
                    'menu_class'      => 'navigation-menu lg:menu-horizontal list-none',
                    //'walker'         => new Tailwind_Walker_Nav_Menu()
                )
            );
            
                ?>

            </nav>
            
        </div>
    </header>

    <!-- Add your site or application content here -->
