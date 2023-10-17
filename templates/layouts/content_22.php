
<section class="pb-20 w-full">
         
         <div class="max-w-screen-2xl mx-auto my-8">
             <div class="grid grid-cols-1 xl:grid-cols-2 xl:my-20 my-8">
                 <div class="w-full px-4 text-center lg:text-left">
                     <h1 class=" font-larken text-[32px] md:text-[42px] font-light mb-4 leading-[36px] md:leading-[46px] capitalize"><?php echo $data['cn_22_title'];?></h1>
                     <div class="grid grid-cols-3 gap-4 md:gap-8 mt-10">
                         <?php foreach($data['cn_22_repeater_field'] as $exp){ ?>
                             <div class="text-center mb-5">
                                 <h3 class="text-[23px] md:text-[28px] lg:text-[32px] xl:text-[42px] font-semibold"><?php echo $exp['cn_22_title']; ?></h3>
                                 <div class="text-darkMat px-0 md:px-6 mt-2 text-[14px] md:text-[17px]"><?php echo $exp['cn_22_content']; ?></div>
                             </div>
                         <?php } ?>
                     </div>
                 </div>
                 <div class="w-full">
                     <div class="xl:pt-20 xl:pr-16 px-4 py-8 text-darkMat text-center lg:text-left"><?php echo $data['cn_22_content'];?></div>
                 </div>
             </div>
                           
         </div> 
      </section>