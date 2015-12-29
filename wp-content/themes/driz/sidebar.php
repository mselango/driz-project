<aside id="sidebar" role="complementary">
<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
<div id="primary" class="widget-area">
<ul class="xoxo">
<?php dynamic_sidebar( 'primary-widget-area' ); ?>
</ul>
</div>
    <ul>
                        <?php
                        $args = array(
    'orderby' => 'id',
    'order' => 'ASC',
    'hide_empty' => true
);
$product_categories = get_terms('productcategory', $args);

                        //print_r($product_categories);
                        if (!empty($product_categories) && !is_wp_error($product_categories)) {
                            foreach ($product_categories as $pcat) {
                                ?>
                                <li><a href="<?php echo get_term_link( $pcat);  ?>"><?php echo $pcat->name; ?></a></li>
                                
    <?php //print_r($pcat);
        }
    }
?>
                    </ul>
<?php endif; ?>
</aside>