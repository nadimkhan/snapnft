<section class="w-full flex items-center justify-center lg:mt-64 mb-8 lg:mb-64 bg-[#e9e9e9] lg:min-h-[500px] h-full px-4 lg:px-0">
                        <div class="container mx-auto py-8  lg:py-16">
                            <div class="grid grid-col-1 lg:grid-cols-2 gap-8 relative ">
                                <div class="lg:text-right text-center">
                                    <h2 class="font-larken text-[32px] md:text-[42px] font-light mb-4 leading-[36px] md:leading-[46px]"><?php echo $data['cn_8_title'];?></h2>
                                    <div class="lg:pl-16">
                                    <?php echo $data['cn_8_content'];?>
                                    <?php if($data['cn_8_cta'] != ''){ ?>
                                        <div class="pt-5">
                                        <a href="<?php echo esc_url(get_permalink($data['cn_8_cta_link']));?>" class="rounded border border-darkMat uppercase text-[12px] px-5 py-4 mt-5 bg-transparent hover:bg-lightGold text-darkMat hover:text-darkMat hover:border-lightGold"><?php echo $data['cn_8_cta'];?></a>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                                <div class="items-start md:items-center  w-[80%] mx-auto md:w-full md:mx-0">
                                    <img src="<?php echo $data['cn_8_main_image']; ?>" alt="Image" class="mx-auto lg:-translate-y-[160px] xl:-translate-y-[245px] relative lg:absolute lg:right-[4vw] xl:right-[12vw] right-0">
                                </div>
                            </div>
                        </div>
                                    </section>