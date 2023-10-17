<section class="w-full lg:my-16 my-4 px-4 lg:px-0">
                    <div class="container mx-auto">
                    <!-- Row 1 -->
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4 lg:mx-0">
                            <div class="relative h-auto -mb-[20%] xl:-mb-[10%]">
                                <!-- Main Image -->
                                <div class="relative h-full block">
                                    <div class="xl:pr-6">
                                        <img src="<?php echo $data['cn_20_main_image']; ?>" alt="Main Image" class="w-full">
                                    </div>
                                    <!-- Overlay Image -->
                                    <div class="p-6 transform -translate-y-[40%] xl:translate-x-[12%]">
                                        <img src="<?php echo $data['cn_20_overlay_image']; ?>" alt="Overlay Image" class="w-full">
                                    </div>
                                </div>
                            </div>
                            <!-- Left Column: Title and Content -->
                            <div class="lg:p-16 lg:pt-20 text-center lg:text-left pb-8">
                                <h2 class="font-larken  text-[32px] md:text-[42px] font-light uppercase mb-4 leading-[36px] md:leading-[46px]"><?php echo $data['cn_20_title'];?></h2>
                                <div class="text-darkMat mb-6 pb-5"><?php echo $data['cn_20_content'];?></div>
                                <?php if($data['cn_20_cta'] != ''){ ?>
                                            <a href="<?php echo esc_url(get_permalink($data['cn_20_cta_link']));?>" class="rounded border border-darkMat uppercase text-[12px] px-5 py-4 mt-5 bg-transparent hover:bg-lightGold text-darkMat hover:text-darkMat hover:border-lightGold"><?php echo $data['cn_20_cta'];?></a>
                                        <?php } ?>
                            </div>
                            <!-- Right Column: Image Overlay -->
                            
                        </div>
                    </div>
                </section>