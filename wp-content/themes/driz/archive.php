<?php get_header(); ?>
<!-- ================================================== --> 
<div class="content-area">
    <div class="container">  
 <div class="product-list">       
   <div class="col-sm-12">
    <?php if(is_tax()){ 
                           		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                           			
                           	?>
                           	<div class="term-data">
                            	<h1 class="entry-title" style="border-bottom:none;"><?php echo $term->name; ?></h1>
                            	<div class="term-desc"><?php echo $term->description; ?></div>
                            </div>	
                           <?php  }

                            ?>
     <ul>
   

                <?php
                            /*             * ***** To get all womens post start ** */


                            /*             * ***** To get all womens post end ** */
                            while (have_posts()) : the_post();

                          ?>

               <div class="col-md-3">
                                    <div class="product-box">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"></a>
                                        <a href="<?php the_permalink(); ?>" class="product-name"><?php the_title();?></a>
                                        <span class="price">Price $<?php  the_field("product_price",get_the_ID()); ?></span>
                                        <a href="<?php the_permalink(); ?>" class="product-view">View More</a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            if(function_exists("wp_pagenavi")){
                            	 wp_pagenavi();
                            }
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