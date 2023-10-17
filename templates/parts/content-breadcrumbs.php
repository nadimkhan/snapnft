<?php global $post; ?>
<section class="px-4 lg:px-0">
    <div class="container mx-auto">
    <?php if(is_page(array(43, 47, 39, 41, 45))){ ?>
        <div class="grid grid-cols-1 lg:grid-cols-2 text-white relative">
            <div class="mt-8"><?php generate_breadcrumbs(); ?></div>
            <div class="lmy-6 g:mb-8">
                <div class="w-full py-6">
                    <div class="py-3 text-darkMat text-center lg:text-left">
                                               
                            <a href="<?php echo esc_url(get_permalink(39));?>" class="mr-3 text-darkMat hover:text-lightGold" >Fly</a> | 
                            <a href="<?php echo esc_url(get_permalink(41));?>" class="mx-3 text-darkMat hover:text-lightGold">Sail</a> | 
                            <a href="<?php echo esc_url(get_permalink(43));?>" class="mx-3 text-darkMat hover:text-lightGold">Drive</a> | 
                            <a href="<?php echo esc_url(get_permalink(45));?>" class="mx-3 text-darkMat hover:text-lightGold">Stay</a> | 
                            <a href="<?php echo esc_url(get_permalink(47));?>" class="ml-3 text-darkMat hover:text-lightGold">Eat</a> 
                        
                    </div>                
                </div>                
            </div>
        </div>
        <?php } else { ?>
            <div class="grid grid-cols-1 text-white relative">
                <div class="my-8 px-4 lg:px-0"><?php generate_breadcrumbs(); ?></div>            
            </div>
        <?php } ?>
    </div>
</section>
