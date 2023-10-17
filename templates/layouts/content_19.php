<?php 
$icon_content = $data['cn_19_repeater_field'];
?>

<!-- Layout 1: 4 Boxes in a Row -->
<section class="container mx-auto my-16 px-4 lg:px-0">
    <?php if(isset($data['cn_19_grids']) && $data['cn_19_grids'] != ''){ ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-<?php echo $data['cn_19_grids'];?> gap-8">
    <?php } else { ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
   <?php } ?>
    
        <!-- Box 1 -->
        <?php if($data['cn_19_arrangement'] == 'option1' && isset($icon_content) && is_array($icon_content) && !empty($icon_content)){ 
            foreach($icon_content as $ic){    
        ?>
        <div class="bg-white p-4 border border-slate-100 rounded">
            <div class="flex items-center">
                <img src="<?php echo $ic['cn_19_image'];?>" alt="<?php echo $ic['cn_19_title'];?>" class=" mr-4">
                <?php if ($ic['cn_19_title'] != '') {?>
                    <h3 class="font-inter text-lg font-semibold uppercase text-darkMat"><?php echo $ic['cn_19_title'];?></h3>
                <?php } ?>
            </div>
            <p class="mt-2 text-gray-700"><?php echo $ic['cn_19_content'];?></p>
        </div>
        <?php } } ?>

        <!-- Box 1 -->
        <?php if($data['cn_19_arrangement'] == 'option3' && isset($icon_content) && is_array($icon_content) && !empty($icon_content)){ 
            foreach($icon_content as $ic){      
        ?>
        <div class="bg-white p-4 border border-slate-100 rounded text-center">
            <img src="<?php echo $ic['cn_19_image'];?>" alt="<?php echo $ic['cn_19_title'];?>" class=" mx-auto mb-2">
            <?php if ($ic['cn_19_title'] != '') {?>
                <h3 class="font-inter text-lg font-semibold uppercase text-darkMat my-4"><?php echo $ic['cn_19_title'];?></h3>
            <?php } ?>
            <p class="text-gray-700"><?php echo $ic['cn_19_content'];?></p>
        </div>
        <?php } } ?>

        <?php if($data['cn_19_arrangement'] == 'option2' && isset($icon_content) && is_array($icon_content) && !empty($icon_content)){ 
            foreach($icon_content as $ic){      
        ?>
        <div class="bg-white p-4 border border-slate-100 rounded text-center">
            <?php if ($ic['cn_19_title'] != '') {?>
                <h3 class="font-inter text-lg font-semibold uppercase text-darkMat"><?php echo $ic['cn_19_title'];?></h3>
            <?php } ?>
            <img src="<?php echo $ic['cn_19_image'];?>" alt="<?php echo $ic['cn_19_title'];?>" class=" mx-auto my-4">            
            <p class="text-gray-700"><?php echo $ic['cn_19_content'];?></p>
        </div>
        <?php } } ?>

       

        
    </div>
</section>
