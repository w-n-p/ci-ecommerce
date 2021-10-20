<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h3>Feature Products</h3>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-5 justify-content-center">
            <?php
            foreach ($all_featured_products as $single_feature_product) {
                ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="<?php echo base_url('single/' . $single_feature_product->product_id); ?>"><img style="width:250px;height:250px" src="<?php echo base_url('uploads/' . $single_feature_product->product_image) ?>" alt="" /></a>
                    <h2><?php echo $single_feature_product->product_title; ?> </h2>
                    <p><?php echo word_limiter($single_feature_product->product_short_description, 10) ?></p>
                    <p><span class="price">Rp.<?php echo $this->cart->format_number($single_feature_product->product_price); ?></span></p>
                    <div class="button"><span><a href="<?php echo base_url('single/' . $single_feature_product->product_id); ?>" class="details">Details</a></span></div>
                </div>
                <!-- <div class="col-md-3 col-lg-4">  </div> -->

            <?php } ?>
        </div>
        <h3>New Products</h3>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            foreach ($all_new_products as $single_new_product) {
                ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="<?php echo base_url('single/' . $single_new_product->product_id); ?>"><img style="width:250px;height:250px" src="<?php echo base_url('uploads/' . $single_new_product->product_image) ?>" alt="" /></a>
                    <h2><?php echo $single_new_product->product_title; ?> </h2>
                    <p><?php echo word_limiter($single_new_product->product_short_description, 10) ?></p>
                    <p><span class="price">Rp.<?php echo $this->cart->format_number($single_new_product->product_price); ?></span></p>
                    <div class="button"><span><a href="<?php echo base_url('single/' . $single_new_product->product_id); ?>" class="details">Details</a></span></div>
                </div>
                <!-- <div class="col-md-3 col-lg-4">  </div> -->

            <?php } ?>
        </div>
    </div>
</section>