<section class="w-full xl:my-16 my-4 px-4 lg:px-0">
                    <div class="container mx-auto">
                        <div class="grid grid-cols-1 lg:grid-cols-2 mb-4">
                            <!-- Left Column: Image -->
                            <div class="relative group lg:mt-[10%] mt-8">
                                <div class="w-full xl:w-1/2 xl:ml-[40%] mr-0 mb-12 text-center lg:text-left">
                                    <h2 class="font-larken text-[32px] md:text-[42px] font-light mb-4 leading-[36px] md:leading-[46px]"><?php echo $data['cn_1_title'];?></h2>
                                </div>
                                
                                <?php if(isset($data['cn_1_video']) && $data['cn_1_video'] != '') { ?>
                                <div class="w-full h-full relative">
                                    <div class="w-full xl:w-[44vw] float-none md:float-right mr-0 xl:mr-[6vw] flex flex-wrap relative xl:pb-[400px] bg-left-bottom bg-no-repeat" style="background-image:url('<?php echo $data['cn_1_underlay_image']; ?>')">
                                    <video class="w-full h-full max-h-screen" poster="<?php echo $data['cn_1_main_image'];?>" preload="none" playsinline loop autoplay muted>
                                            <source src="<?php echo $data['cn_1_video'];?>" type="video/mp4">
                                    </video>
                                
                                    </div>                                   
                                </div>
                            <?php } else { ?>
                                <figure class="w-full xl:w-[44vw] float-none md:float-right mr-0 xl:mr-[6vw] flex flex-wrap relative xl:pb-[400px] bg-left-bottom bg-no-repeat" style="background-image:url('<?php echo $data['cn_1_underlay_image']; ?>')">
                                    <img src="<?php echo $data['cn_1_main_image']; ?>" alt="<?php echo $data['cn_1_title'];?>" class="w-full h-full max-h-screen object-cover object-center ">
                                </figure>
                            <?php } ?>
                            </div>
                            <!-- Right Column: Text style="background-image:url('<?php //echo $data['_background_image']['url']; ?>')-->
                            <div class="flex items-center lg:py-16 py-6">
                                <div class="text-center lg:text-left">
                                    <div class="text-darkMat mb-6 lg:pb-10 lg:pl-12 lg:pr-16"><?php echo $data['cn_1_content'];?></div>
                                    <div class="w-full xl:-translate-x-[10vw]">
                                        <img src="<?php echo $data['cn_1_overlay_image']; ?>" alt="" class="w-full h-auto">                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>