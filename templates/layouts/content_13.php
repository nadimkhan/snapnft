<section class="lg:h-[690px] md:h-[450px] h-[400px] w-full bg-darkMat/50 overflow-hidden bg-cover bg-no-repeat relative" style="background-image:url('<?php echo $data['cn_13_main_image'];?>')">
    <div class="absolute w-full h-full top-0 left-0 bg-darkMat/50 z-0"></div>
    <div class="container mx-auto relative h-full items-center flex">
        <div class="flex w-full flex-wrap text-center items-center text-white px-4">
            <h3 class="block w-full text-[28px] lg:text-[44px] font-larken mb-3 lg:mb-6"><?php echo $data['cn_13_title'];?></h3>
                <div class="w-full lg:w-1/2 mx-auto">
                    <?php echo $data['cn_13_content'];?>
                    <?php if($data['cn_13_cta'] != ''){ ?>
                    <p class="mt-16"><a href="<?php echo esc_url(get_permalink($data['cn_13_cta_link']));?>" class="border border-white uppercase text-[12px] px-5 py-4 mt-2 lg:mt-5 bg-transparent hover:bg-darkMat text-white hover:text-white hover:border-darkMat"><?php echo $data['cn_13_cta'];?></a></p>
                    <?php } ?>
                </div>
            
        </div>
    </div>
    </section>