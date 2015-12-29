<?php
/**
 * Template Name: Catelog Template
 */
get_header();
?>

<!-- ================================================== --> 
<div class="content-area">
    <div class="container">  
 <div class="product-list">       
   <div class="col-sm-12">
   <header class="header">
                         <h1 class="entry-title" style="border-bottom:none;"><?php  the_title(); ?></h1>
                        </header>
    
   
                <?php
                            /*             * ***** To get all womens post start ** */

                            $args = array(
                                'post_type' => 'product',
                                'numberposts' => -1,
                              );
                            query_posts($args);
                            /*             * ***** To get all womens post end ** */
                            while (have_posts()) : the_post();
                                 global $woocommerce, $product;
                                 $_pf = new WC_Product_Factory();
                                 $_product = $_pf->get_product(get_the_ID());

                            ?>
         
                                <div class="col-md-3">
                                    <div class="product-box">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"></a>
                                        <a href="<?php the_permalink(); ?>" class="product-name"><?php the_title();?></a>
                                        <span class="price"><?php  echo $_product->get_price_html(); ?></span> 
                                        <a href="<?php the_permalink(); ?>" class="product-view">View More</a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();
                            ?>
                    
   


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