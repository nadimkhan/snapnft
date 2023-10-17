<section class="pb-20 w-full">         
    <div class="max-w-screen-2xl mx-auto my-8">
        <?php if(isset($data['cn_12_grids']) && $data['cn_12_grids'] != ''){ ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-<?php echo $data['cn_12_grids'];?> xl:gap-8 gap-4 px-4 team">
        <?php } else { ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 xl:gap-8 gap-4 px-4 team">
        <?php } ?>
            <?php if(isset($data['cn_12_repeater_field']) && $data['cn_12_repeater_field'] != ''){ 
                    foreach($data['cn_12_repeater_field'] as $content){ ?>
                    <!-- Team Item -->
                    <div class="w-full h-auto bg-cover bg-no-repeat bg-center relative aspect-square overflow-hidden group " style="background-image:url('<?php echo $content['cn_12_image'];?>')">
                        <div class="absolute bg-darkMat/50 left-0 top-0 w-full h-full z-10 group-hover:bg-darkMat/90 transition-all duration-500"></div>
                        <div class="absolute z-20 w-full h-full">
                            <div class="absolute w-full h-full z-30 ">
                                <div class="w-full h-full mx-auto flex flex-col -translate-y-full group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-500">
                                    <h2 class="mb-0 text-center text-white font-larken text-[22px] pt-7 pb-2 uppercase"><?php echo $content['cn_12_title']; ?></h2>
                                    <div class="text-white px-7 m-0 text-[14px] text-justify leading-4"><?php echo $content['cn_12_content']; ?></div>
                                    <div class="text-center mt-10 text-lg space-x-4">
                                        <?php if(isset($content['cn_12_facebook']) && $content['cn_12_facebook'] != ''){ ?>
                                            <a href="<?php echo $content['cn_12_facebook'];?>" class="text-white hover:text-lightGold"><i class="fa fa-facebook"></i></a>
                                        <?php } ?>
                                        <?php if(isset($content['cn_12_twitter']) && $content['cn_12_twitter'] != ''){ ?>
                                            <a href="<?php echo $content['cn_12_twitter'];?>" class="text-white hover:text-lightGold"><i class="fa fa-twitter"></i></a>
                                        <?php } ?>
                                        <?php if(isset($content['cn_12_linkedin']) && $content['cn_12_linkedin'] != ''){ ?>
                                        <a href="<?php echo $content['cn_12_linkedin'];?>" class="text-white hover:text-lightGold"><i class="fa fa-linkedin"></i></a>
                                        <?php } ?>
                                        <?php if(isset($content['cn_12_insta']) && $content['cn_12_insta'] != ''){ ?>
                                        <a href="<?php echo $content['cn_12_insta'];?>" class="text-white hover:text-lightGold"><i class="fa fa-instagram"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="flex flex-col h-full justify-end py-5 px-5">
                                <!--<h3 class="mb-2 group-hover:-translate-x-full translate-x-0 transition-all duration-1000"></h3>-->
                                <h2 class="mt-1 group-hover:opacity-0 opacity-100 transition-all duration-1000 bg-white text-darkMat uppercase px-3 py-2 text-[22px] text-center">
                                    <?php if($content['cn_12_short_designation'] != ''){ ?> 
                                    <span class="font-larken block"><?php echo $content['cn_12_short_designation'];?></span>
                                    <?php } ?>
                                    <?php if($content['cn_12_designation'] != ''){ ?>
                                    <span class="text-[16px] block"><?php echo $content['cn_12_designation'];?></span></h2>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Team Item -->
            <?php } }?>
        </div>
            
        </div>
    </div>
</section>