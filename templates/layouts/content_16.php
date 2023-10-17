<section class="w-screen lg:mt-16 mb-32 bg-[#e9e9e9] px-4 lg:px-0" style="background-color:<?php echo $data['cn_16_color'];?>">
                    <div class="container mx-auto">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4 lg:mx-0">                            
                            <!-- Right Column: Text -->
                            <div class="flex items-center lg:py-16 py-8 md:px-0">
                                <div class="lg:text-right text-center">
                                    <h2 class="font-larken  text-[32px] md:text-[42px] font-light uppercase mb-4 leading-[36px] md:leading-[46px]"><?php echo $data['cn_16_title'];?></h2>
                                    <div class="text-darkMat mb-6 pb-5"><?php echo $data['cn_16_content'];?></div>
                                    <?php if($data['cn_16_cta'] != ''){ ?>
                                        <a href="<?php echo esc_url(get_permalink($data['cn_16_cta_link']));?>" class="rounded border border-darkMat uppercase text-[12px] px-5 py-4 mt-5 bg-transparent hover:bg-lightGold text-darkMat hover:text-darkMat hover:border-lightGold"><?php echo $data['cn_16_cta'];?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- Left Column: Image -->
                            <div class="relative group">
                                <figure class="w-full lg:w-[47vw] float-none lg:float-left ml-0 lg:ml-[3vw] flex flex-wrap relative h-80 md:h-auto">
                                    <img src="<?php echo $data['cn_16_main_image']; ?>" alt="<?php echo $data['cn_16_title'];?>" class="w-full h-full max-h-screen bg-cover bg-no-repeat translate-y-16">
                                </figure>
                            </div>
                        </div>
                    </div>
                </section>