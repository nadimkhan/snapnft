 <section class="relative h-[230px] w-full overflow-hidden">
        <div class="relative h-full w-full group transition-transform transform-gpu overflow-hidden">
            <div class="absolute w-full h-full left-0 right-0  bg-center bg-cover transition-transform transform-gpu duration-700"
                style="background-image: url(<?php echo $data['hd_7_image_background'];?>);"></div>
            <div class="absolute w-full h-full bg-darkMat/60 transition-opacity"></div>
            <?php if($data['hd_7_title'] != '' || $data['hd_7_content'] != '') { ?>
            <div class="absolute w-full h-full flex items-center justify-between">
                <div class="container mx-auto">
                    <div class="flex w-full xl:w-1/4 flex-col bg-darkMat/60 md:p-6 p-3 xl:ml-32 mx-4">
                        <div class="text-white">
                            <?php if($data['hd_7_title'] != '') { ?>
                                <h2 class="font-larken text-[42px] font-normal mb-4 leading-[46px]"><?php echo $data['hd_7_title']; ?></h2>
                            <?php } ?>
                            <?php if($data['hd_7_content'] != '') { ?>
                                <div class="text-white"><?php echo $data['hd_7_content']; ?></div>
                            <?php } ?>
                            
                            
                        </div>

                    </div>
                </div>
                
            </div>
            <?php } ?>
        </div>
</section>