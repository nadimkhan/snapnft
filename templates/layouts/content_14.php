<?php 
if(isset($data['cn_14_repeater_field']) && is_array($data['cn_14_repeater_field']) && !empty($data['cn_14_repeater_field'])){ 
    $count = count($data['cn_14_repeater_field']);
    $i=1;
?>
    <section class="lg:h-[700px] md:h-[500px] h-[300px] w-full  overflow-hidden">
    <div class="relative overflow-hidden h-full">
        <div class="absolute bg-darkMat/70 w-full h-full left-0 top-0 z-10"></div>
        
        <div class="grid md:grid-cols-4 grid-cols-1 gap-0 h-full tabbed-nav">
        <?php foreach($data['cn_14_repeater_field'] as $content){ 
            if($i == $count){
            ?>        
        <div class="relative z-20 flex-grow border-l-0 border-t-0 border-b-0 border-r-0 border-gray-300/10 text-center group font-larken">
            <?php }  else { ?>
                <div class="relative z-20 flex-grow border-l-0 border-t-0 border-b-0 border-r border-gray-300/30 text-center group font-larken">
            <?php } ?>                                                       
            <span class="block relative z-20 py-6 text-white text-[28px] group-hover:text-darkMat capitalize"><?php echo $content['cn_14_title'];?></span>
            <div class="absolute top-0 left-0 w-full bg-white h-0 group-hover:h-24 translate-y-0 group-hover:-translate-y-0 group-hover:transition-all z-0 group-hover:duration-300 duration-300"></div>
        </div>
        <?php $i++; } ?>      
        </div>
        <div class="flex ">
        <?php foreach($data['cn_14_repeater_field'] as $content){ ?>
            <div class="absolute top-0 left-0 bg-cover bg-no-repeat w-full lg:h-[820px] md:h-[500px] h-[300px] z-0 duration-700 transition-all bg-active bg-image" style="background-image:url('<?php echo $content['cn_14_image']; ?>')"></div>
        <?php } ?>        
        </div>
    </div>
    </section>
<?php }  ?>
