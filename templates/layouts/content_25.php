<section class="w-full lg:py-20 py-8 text-center md:text-left">
                        <div class="container mx-auto px-4 lg:px-0">
                            <div class="flex flex-col lg:flex-row lg:gap-14 gap-4">
                                <div class="lg:basis-2/5 lg:pl-8 basis-full">
                                    <h2 class="font-larken text-[32px] md:text-[42px] font-light mb-4 leading-[36px] md:leading-[46px]">
                                        <?php
                                       
                                        if(isset($data['cn_25_title']) && $data['cn_25_title'] != ''){ 
                                            echo $data['cn_25_title'];
                                        }
                                        ?>
                                    </h2>                                    
                                </div>
                                <div class=" lg:basis-3/5 lg:pr-16">
                                    <?php 
                                      
                                        if(isset($data['cn_25_content']) && $data['cn_25_content'] != ''){ 
                                            echo $data['cn_25_content'];
                                        }
                                    ?>
                                   
                                    <?php // if($data['_call_to_action'] != ''){ ?>
                                    <!--<div class="pt-5">
                                        <a href="<?php // echo esc_url(get_permalink($data['_cta_link']));?>" class="rounded border border-darkMat uppercase text-[12px] px-5 py-4 mt-5 bg-transparent hover:bg-lightGold text-darkMat hover:text-darkMat hover:border-lightGold"><?php //echo $data['_call_to_action'];?></a>
                                        </div> -->
                                    <?php //} ?>
                                </div>
                            </div>
                        </div>
                            
                        
                        
                    </section>
