<?php get_header(); ?>
<!-- ================================================== --> 
<div class="content-area">
    <div class="container">  
 <div class="product-list">       
   <div class="col-sm-12">
     <ul>
   
                <?php
                            /*             * ***** To get all womens post start ** */

                            $args = array(
                                'post_type' => 'product',
                                'numberposts' => -1,
                              );
                            query_posts($args);
                            /*             * ***** To get all womens post end ** */
                            while (have_posts()) : the_post();

                             
                            ?>
         			
                                <div class="col-md-3">
                                    <div class="product-box">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"></a>
                                        <a href="<?php the_permalink(); ?>" style="border:none;"> <h2 class="text-center"><?php the_title();?></h2></a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();
                            ?>
                    
   

	</ul>
    <div class="clearfix"></div>
               <?php wp_reset_postdata(); ?>
        </div>
 </div>
<?php //} ?>
        <div class="col-sm-4">
            <?php //get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>