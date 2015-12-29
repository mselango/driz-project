<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo get_template_directory_uri();?>/img/fav-icon.png" type="image/png" sizes="16x16">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<!-- Bootstrap core CSS -->
<link href="<?php echo get_template_directory_uri();?>/css/bootstrap.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="<?php echo get_template_directory_uri();?>/css/carousel.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/css/style.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/css/responsive.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/css/fontello.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/css/owl.carousel.css" rel="stylesheet">
<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="<?php echo get_template_directory_uri();?>/js/ie-emulation-modes-warning.js"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
   
<div class="navbar-wrapper">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="navbar-header">
         <div id="navbar" class="navbar-collapse collapse">
         	<div class="container">
                    <div class="call-us">Call Us : <?php echo ot_get_option('call_us'); ?></div>
              
                        <?php wp_nav_menu( array('menu' => 'Main', 'container' => '', 'items_wrap' => '<ul class="nav-menu nav navbar-nav">%3$s</ul>' )); ?>
               
          	</div>
         </div>
         <div class="container">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php echo ot_get_option('site_logo'); ?>"></a> 
          
              <?php get_search_form(); ?>
           
       	 </div>
       </div>
    </nav>
</div>