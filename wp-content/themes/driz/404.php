<?php get_header(); ?>
<div class="content-area">
    <div class="container">  
        <div class="product-list">       
            <div class="col-sm-12 text-center">
                <h4><?php _e('Nothing found for the requested page.', 'drizz'); ?></h4>
                <img src="<?php echo get_template_directory_uri();?>/img/not-found.jpg" alt="Not found" style="margin-top: 50px;"/>

            </div>
        </div>
    </div>
</div>

        <?php get_footer(); ?>