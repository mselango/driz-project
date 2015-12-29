<div class="foot-carasule">
    <div class="container">
        <div id="owl-demo-1" class="owl-carousel">
        <?php
        /* * ***** To get all footerslider post start ** */
        $footerslider = array('post_type' => 'footerslider');
        query_posts($footerslider);

        while (have_posts()) : the_post();
            ?>
            <div class="item"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"></div>

            <?php
            endwhile;
            ?>
        </div>
    </div>
</div>
<div class="footer"><?php echo ot_get_option('footer_text'); ?></div>
<!-- End Footer -->
<!-- ================================================== --> 

<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script> 
<script src="<?php echo get_template_directory_uri();?>/js/vendor/holder.min.js"></script> 
<script src="<?php echo get_template_directory_uri();?>/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/owl.carousel.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
jQuery(document).ready(function($) {
	var owl = $("#owl-demo-1");
	
	owl.owlCarousel({
	
	items :7, //10 items above 1000px browser width
	itemsDesktop : [1024,5], //5 items between 1000px and 901px
	itemsDesktopSmall : [900,4], // 3 items betweem 900px and 601px
	itemsTablet: [640,2], //2 items between 600 and 0;
	itemsMobile :[320,1]// itemsMobile disabled - inherit from itemsTablet option
	
	});
	
	// Custom Navigation Events
	$(".next").click(function(){
	owl.trigger('owl.next');
	})
	$(".prev").click(function(){
	owl.trigger('owl.prev');
	})
        
});
</script>
<?php wp_footer(); ?>
</body>
</html>
