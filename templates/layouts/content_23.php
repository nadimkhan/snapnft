<section class="lg:pb-[70px] lg:pt-[140px] py-8 px-4">
    <div class="container mx-auto max-w-screen-2xl">
        <div class="text-center lg:w-1/2 w-full mx-auto mb-10">
            <h2 class="font-larken text-[32px] md:text-[42px] font-light mb-5 leading-[36px] md:leading-[46px] text-center uppercase"><?php echo $data['cn_23_title']; ?></h2>
            <?php 
            if(isset($data['cn_23_content'])){
                echo $data['cn_23_content']; 
            }
            ?>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
            <?php display_recent_post_carousel(4, 3);?>
        </div>
    </div>
</section>
