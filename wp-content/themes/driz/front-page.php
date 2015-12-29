<?php
/**
 * Template Name: Front Page
 */
error_reporting(1);
ini_set("display_errors", 1);
get_header();

/* * ***** To get all product category start ** */

$args = array(
    'orderby' => 'id',
    'order' => 'ASC',
    'hide_empty' => true
);
$product_categories = get_terms('product_cat', $args);
/* * ***** To get all product category end  ** */

/* * ***** To get all silder post start ** */
$slider_args = array('post_type' => 'slider');
$sliders = new WP_Query($slider_args);
/* * ***** To get all silder post end ** */
   $term1=get_field('list_item1');
   $term2=get_field('list_item2');
   $term3=get_field('list_item3');
   
?>

   

<!-- ================================================== -->
<div class="banner">
    <div class="container">
        <div class="col-md-9">
            <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
                <!-- Indicators -->
                <div class="coutrols">
<!--                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="sr-only">Next</span> </a>-->
                    <ol class="carousel-indicators">
                        <?php
                        static $countx = 0;
                        while ($sliders->have_posts()) : $sliders->the_post();
                        
                            if (has_post_thumbnail()) {
                                ?>
                                <li data-target="#myCarousel" data-slide-to="<?php echo $countx; ?>" class=" <?php
                                if ($countx == 0) {
                                    echo "active";
                                }
                                ?>"></li>
                                    <?php
                                }
                                $countx++;
                            endwhile;
                            ?>
                    </ol>
                </div>
                <div class="carousel-inner" role="listbox">
                    <?php
                    static $count = 1;
                    while ($sliders->have_posts()) : $sliders->the_post();
                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                            ?>
                            <div class="item <?php
                    if ($count == 1) {
                        echo "active";
                    }
                    ?>"> 
                                <img class="first-slide" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($sliders->ID)); ?>" alt="">
                                <div class="container">
                                    <div class="carousel-caption">
                            <?php echo the_content(); ?>
                                         <?php  $knowmore = get_field('slider_link');?>
                                        <p class="text-left"><a  href="<?php echo $knowmore;?>">View More</a></p>
                                    </div>
                                 
                                </div>
                            </div>
                            <?php
                        }
                        $count++;
                    endwhile;
                    
                    ?>
                    <?php wp_reset_postdata(); ?>
                    <!-- End item -->
                   

                </div>
            </div>
        </div>
        <!-- End Col -->
        <div class="col-md-3">
            <div class="right-box">
                <div class="title-r"><img src="<?php echo get_template_directory_uri(); ?>/img/cat-icn.png"> Categories</div>
                <div class="cnt-part">
                    <ul>
                        <?php
                        if (!empty($product_categories) && !is_wp_error($product_categories)) {
                            foreach ($product_categories as $pcat) {
                                ?>
                                <li><a href="<?php echo get_term_link( $pcat);  ?>"><?php echo $pcat->name; ?></a></li>
                                
    <?php //print_r($pcat);
    }
}
?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Col -->
    </div>
</div>
<!-- End Banner -->

<!-- ================================================== --> 
<div class="content-area">
    <div class="container">    <?php 
    $terms12 = get_field('list_item1');

    //print_r($terms12);
    if($terms12){
   ?>
 <div class="product-list">       
    <ul>
    <?php foreach( $terms12 as $term ): 
            $term3 = get_term( $term, 'product_cat' ); ?>

		<h2><?php echo $term3->name; ?>
                <a href="<?php echo get_term_link( $term3); ?>">View all Items</a></h2>
                <?php
                            /*             * ***** To get all womens post start ** */

                            $args = array(
                                'post_type' => 'product',
                                'numberposts' => 4,
                                'tax_query' => array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field' => 'id',
                                        'terms' => $term3->term_id, // Where term_id of Term 1 is "1".
                                       
                                    )
                                )
                                );
                            query_posts($args);
                            /*             * ***** To get all womens post end ** */
                            $i = 1;
                            while (have_posts()) : the_post();

                            ?>
                                <div class="col-md-3 <?php if($i==1 or $i== 4){echo "nopad";}?> " >
                                    <div class="product-box">
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"></a>
                                    </div>
                                </div>
                                <?php
                                  $i++;
                            endwhile;
                          
                            wp_reset_query();
                            ?>
                    
    <?php endforeach; ?>

	</ul>
    <div class="clearfix"></div>
               <?php wp_reset_postdata(); ?>
        </div>
<?php } ?>
        
            

            
        <!-- End product List -->
        <?php
        /*         * ***** To get all homepageads post start ** */
        $homepageads = array('post_type' => 'homepageads');
        query_posts($homepageads);
        /*         * ***** To get all homepageads post end ** */
        ?>
        <div class="add-part">
            <?php
            $j = 1;
            
            while (have_posts()) : the_post();

            $s =  get_post_meta(get_the_ID(),"target_link",true);
            $term3 = get_term( $s, 'product_cat' );
           // $t_id=get_term(get_field("target_link",get_the_ID()),'productcategory');
            
            ?>
                            <div class="<?php if ($j == 3) echo "col-md-6";
                        else echo "col-md-3"; ?>">
                                <a href="<?php echo get_term_link($term3); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"></a>
                            </div>
                <?php
                $j++;
            endwhile;
            ?>
            <!-- End Col -->
            <div class="clearfix"></div>
        </div>
        <!-- End Add -->
    </div>
    <!-- End Container -->
</div>

<?php get_footer(); ?>
  
