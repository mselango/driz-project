<?php get_header(); ?>
<div class="content-area">
    <div class="container">  
 <div class="product-list">       
   <div class="col-sm-12">
   <h1 class="entry-title" style="border-bottom:none;">Search Results : <?php if(isset($_GET['s'])){echo $_GET['s'];} ?> </h1>
    <?php if(is_tax()){ 
                           		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                           			
                           	?>
                           	<div class="term-data">
                            	<h1 class="term-name"><?php echo $term->name; ?></h1>
                            	<div class="term-desc"><?php echo $term->description; ?></div>
                            </div>	
                           <?php  }

                            ?>
     <ul>
   

                <?php
                            /*             * ***** To get all womens post start ** */


                            /*             * ***** To get all womens post end ** */
                            $args =array("post_type"=>"product");
                            query_posts($args);
                           if ( have_posts() ) : while ( have_posts() ) : the_post();
                            global $post;
                               if($post->post_type=="product"){ 
                                   global $woocommerce, $product;
                                 $_pf = new WC_Product_Factory();
                                 $_product = $_pf->get_product(get_the_ID());
                          ?>

         
                            <div class="col-md-3">
                                    <div class="product-box">
                                        <a href="<?php the_permalink(); ?>">
                                        <?php if(has_post_thumbnail()){ ?>
                                        <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>">
                                        <?PHP } ?>
                                        </a>
                                        <a href="<?php the_permalink(); ?>" class="product-name"><?php the_title();?></a>
                                        <?php if($post->post_type=="product"){ ?>
                                        <span class="price"><?php  echo $_product->get_price_html(); ?></span> 
                                        <a href="<?php the_permalink(); ?>" class="product-view">View More</a>
                                        <?php }else{ ?>
                                            <?php the_excerpt(); ?>
                                        <?php } ?>
                                       
                                    </div>
                                </div>
                                 <?php }else{ ?>
                                           <div class="col-md-12">
                                              <h4><?php the_title(); ?></h4>
                                              <?php the_excerpt(); ?>
                                              <a href="<?php the_permalink(); ?>">Read More</a>
                                           </div>

                                        <?php } ?>
                               
                           <?php endwhile;  wp_pagenavi(); 
                           else : ?>
                              <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                          <?php endif;
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