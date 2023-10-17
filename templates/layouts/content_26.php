<section class="xl:pt-20 pt-4 lg:pt-10 -mb-[50px] xl:-mb-[100px] px-4 lg:px-0">
        <div class="container mx-auto lg:my-8 ">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-8 accordion">
                <div class="w-full lg:px-16">
            <?php 
                $odd_content = array_filter($data['cn_26_repeater_field'], function($key) {
                    return $key % 2 == 0; // Keep odd indexes
                }, ARRAY_FILTER_USE_KEY);
            
            foreach($odd_content as $content){ ?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <span class="accordion-button">
                        <?php echo $content['cn_26_title']; ?>
                        </span>
                    </h2>
                    <div class="accordion-content hidden">
                        <?php echo $content['cn_26_content']; ?>
                    </div>
                </div>
            <?php } ?> 
            </div>
            <div class="w-full lg:px-16">
            <?php 
                $even_content = array_filter($data['cn_26_repeater_field'], function($key) {
                    return $key % 2 != 0; // Keep odd indexes
                }, ARRAY_FILTER_USE_KEY);
            
            foreach($even_content as $content){ ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <span class="accordion-button">
                    <?php echo $content['cn_26_title']; ?>
                    </span>
                </h2>
                <div class="accordion-content hidden">
                    <?php echo $content['cn_26_content']; ?>
                </div>
            </div>
            <?php } ?> 

            </div>
        
            <!-- Add more accordion items as needed -->
        </div>
        </div>

        </section>