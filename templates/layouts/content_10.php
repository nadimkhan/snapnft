<section class="w-full lg:my-16 my-4 px-4 lg:px-0">
                    <div class="container mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-4 mb-4 lg:mx-0">
                            <!-- Left Column: Image -->
                            
                            <div class="relative group">
                                <?php if(isset($data['cn_10_video']) && $data['cn_10_video'] != ''){ ?>
                                    <div class="w-full lg:w-[47vw] float-none lg:float-right mr-0 lg:mr-[3vw] flex flex-wrap relative">
                                        <video class="w-full h-full max-h-screen" poster="<?php echo $data['cn_10_main_image'];?>" preload="none" playsinline loop autoplay muted>
                                            <source src="<?php echo $data['cn_10_video'];?>" type="video/mp4">
                                        </video>
                                    </div>
                                <?php } else { ?> 
                                <figure class="w-full lg:w-[47vw] float-none lg:float-right mr-0 lg:mr-[3vw] flex flex-wrap relative">
                                    <img src="<?php echo $data['cn_10_main_image']; ?>" alt="<?php echo $data['cn_10_title'];?>" class="w-full h-full max-h-screen object-cover object-center ">
                                </figure>
                                <?php } ?>                        
                            </div>
                            <!-- Right Column: Text -->
                            <div class="items-center lg:py-16 bg-no-repeat bg-right-bottom pb-10 lg:pb-0" style="background-image:url('<?php echo $data['cn_10_content_background']; ?>')">
                                <div class="pr-0 md:pr-16 text-center lg:text-left pt-5">
                                    <h2 class="font-larken text-[32px] md:text-[42px] font-light uppercase mb-4 leading-[36px] md:leading-[46px]"><?php echo $data['cn_10_title'];?></h2>
                                    <div class="text-darkMat mb-6 pb-5 pr-0 md:pr-10"><?php echo $data['cn_10_content'];?></div>
                                    <?php if($data['cn_10_cta'] != ''){ ?>
                                        <a href="<?php echo esc_url(get_permalink($data['cn_10_cta_link']));?>" class="rounded border border-darkMat uppercase text-[12px] px-5 py-4 mt-5 bg-transparent hover:bg-lightGold text-darkMat hover:text-darkMat hover:border-lightGold"><?php echo $data['cn_10_cta'];?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php //echo print_r($data); ?>
                        </div>
                    </div>
                </section>