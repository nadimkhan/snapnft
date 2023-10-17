<section class="w-full h-screen relative">
        <!-- Fullscreen Container -->
        <div class="flex h-screen w-full">
            <!-- Left Column - Image and Content -->
            <div class="w-full">
                <?php if(isset($data['hd_1_video_content']) &&  $data['hd_1_video_content'] != ''){ ?> 
                    <div class="tab-content h-screen w-full">
                <?php } else { ?> 
                    <div class="tab-content bg-cover bg-center h-screen w-full" style="background-image: url('<?php echo $data['hd_1_image_background'];?>');">
                <?php } ?>
                
                <?php if(isset($data['hd_1_video_content']) &&  $data['hd_1_video_content'] != ''){  ?> 
                    <div class="absolute top-0 left-0 h-full w-full">
                        <video class="screen-section__step-1__bg__video" poster="<?php echo $data['hd_1_image_background'];?>" preload="none" playsinline loop controls autoplay muted>
                            <source src="<?php echo $data['hd_1_video_content'];?>" type="video/mp4">
                        </video>
                    </div>
                <?php } ?>
                    <div class="absolute top-0 left-0 right-0 bg-black bg-opacity-60 text-white p-8 h-full w-full ">
                        <div class="xl:h-3/4 md:h-1/2 h-full max-w-screen-2xl mx-auto flex items-center justify-between py-4 px-4 md:px-0">
                        <?php if($data['hd_1_title_content'] != '' || $data['hd_1_sub_title_content'] != '') { ?>
                            <div class="flex w-full  xl:w-1/4 flex-col bg-darkMat/60 p-6 xl:ml-32">
                                <?php if(isset($data['hd_1_title_content']) && $data['hd_1_title_content'] != '') { ?>
                                <h2 class="font-larken text-[32px] md:text-[42px] font-normal leading-[46px] uppercase"><?php echo $data['hd_1_title_content']; ?></h2>
                                <?php } ?>
                                <?php if(isset($data['hd_1_sub_title_content']) && $data['hd_1_sub_title_content'] != '') { ?>
                                <div class="text-white font-light"><?php echo $data['hd_1_sub_title_content']; ?></div>
                                <?php } ?>
                                <?php if(isset($data['hd_1_cta_link']) && $data['hd_1_cta_link'] != ''){ ?>
                                    <div class="flex flex-col items-start mt-5">
                                        <a href="<?php echo esc_url(get_permalink($data['hd_1_cta_link']));?>" class="border border-white px-3 py-2 text-[17px] text-center text-white hover:text-lightGold rounded"><?php echo $data['hd_1_cta_text'];?></a>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                       
                    </div>
                </div>
                    
                <!-- Add more tab content sections as needed -->
            </div>   
        </div>
        </section>

