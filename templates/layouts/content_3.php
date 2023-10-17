<section class="w-full lg:my-16 my-4 px-4 md:px-8 lg:px-0">
    <div class="container mx-auto max-w-screen-2xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4 lg:mx-0 pb-10 lg:pb-0">
            <!-- Left Column: Image -->
                <div class="relative">
                    <?php if(isset($data['cn_3_video']) && $data['cn_3_video'] != '') { ?>
                        <div class="w-full h-full relative">
                            <video class="w-full h-full max-h-screen" poster="<?php echo $data['cn_3_main_image'];?>" preload="none" playsinline loop autoplay muted>
                                <source src="<?php echo $data['cn_3_video'];?>" type="video/mp4">
                            </video>
                        </div>
                    <?php } else { ?>
                        <div class="w-full h-64 sm:h-64 md:h-96 lg:h-full max-h-screen lg:bg-contain sm:bg-cover bg-center bg-no-repeat" style="background-image:url('<?php echo $data['cn_3_main_image']; ?>')">&nbsp;</div>
                    <?php } ?>
                </div>
            <!-- Right Column: Text -->
                <div class=" flex items-center lg:p-16 text-center md:text-left">
                    <div>
                        <!--<h3 class="uppercase font-semibold font-xs text-slate-950">Subtitle...</h3>-->
                        <h2 class="font-larken  text-[32px] md:text-[42px] font-light uppercase mb-4 leading-[36px] md:leading-[46px]"><?php echo $data['cn_3_title'];?></h2>
                        <div class="text-darkMat mb-6 pb-5"><?php echo wp_kses_post($data['cn_3_content']);?></div>
                            <?php if($data['cn_3_cta'] != ''){ ?>
                            <a href="<?php echo esc_url(get_permalink($data['cn_3_cta_link']));?>" class="rounded border border-darkMat uppercase text-[12px] px-5 py-4 mt-5 bg-transparent hover:bg-lightGold text-darkMat hover:text-darkMat hover:border-lightGold"><?php echo $data['cn_3_cta'];?></a>
                            <?php } ?>
                    </div>
                </div>
        </div>
    </div>
</section>