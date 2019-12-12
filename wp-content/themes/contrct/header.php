<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/bootstrap.css" >
<!--<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/style.css">-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/colors/color1.css" id="colors">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/move-style.css">
<?php if(is_page(8)) { ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/step-style.css">
<?php } ?>

<?php wp_head(); ?>
</head>

<body class="header_sticky home">
    <div class="boxed">
    <div class="loader">
        <span class="loader1 block-loader"></span>
        <span class="loader2 block-loader"></span>
        <span class="loader3 block-loader"></span>
    </div>    
        <!-- Wrap-slide -->
        <div class="wrap-slider">

            <!-- Header -->            
            <header id="header" class="header clearfix"> 
                <div class="header-wrap clearfix">
                    <div id="logo" class="logo">
                        <a href="<?php echo home_url();?>">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/Wood-N-Dreams-Logo-vectorized-name-only-4-23-18.png" alt="Logo">
                            <!--<div style="background-image:url('<?php bloginfo('template_url'); ?>/assets/images/Wood-N-Dreams-Logo.png');"></div>-->
						</a>
                    </div><!-- /.logo -->

                    <div class="nav-wrap">
                        <div class="btn-menu">
                            <span></span>
                        </div><!-- //mobile menu button -->

                        <nav id="mainnav" class="mainnav">
                            <ul class="menu"> 
                                <li class="home"><a href="<?php echo home_url();?>">Home</a></li>
								<li><a href="<?php echo get_permalink(31);?>">Portfolio</a>
								
									<ul class="submenu">
									
										<?php
						$pargs = array('post_type'=>'services', 'post_status'=>'publish', 'posts_per_page'=>8, 'order'=>'ASC');
						$ppost_list = get_posts($pargs);
						foreach($ppost_list as $ppost) {
							
							?>
							<li><a href="<?php echo get_permalink(450);?>?id=<?php echo $ppost->ID;?>"><?php echo $ppost->post_title;?> Portfolio</a></li>
						<?php } ?>
									</ul>
								</li>
                                <li><a href="#">Services</a>
                                    <ul class="submenu">
									<?php
										$args = array('post_type'=>'services', 'post_status'=>'publish', 'posts_per_page'=>8, 'order'=>'ASC');
										$post_list = get_posts($args);
										foreach($post_list as $post) {
										$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
										if( class_exists('Dynamic_Featured_Image') ) {
										global $dynamic_featured_image;

										$featured_images = $dynamic_featured_image->get_featured_images($post->ID);
									?>
                                        <li><a href="<?php the_permalink();?>"><?php foreach($featured_images as $featured_image) {
												echo "<img style='width:27px;' src='".$featured_image['full']."'>";
											}
									} ?> &nbsp;&nbsp; <?php echo $post->post_title;?></a></li>
                                        <?php } ?>
                                        
                                    </ul>
                                </li> 
                               
                                <li><a href="<?php echo get_permalink(8);?>">About Us</a>
                                    <ul class="submenu">
                                        <li><a href="<?php// echo get_permalink(8);?>#estimate">Estimates</a></li>
                                         <li><a href="<?php //echo get_permalink(8);?>#contract">Contract</a></li>
                                          <li><a href="<?php //echo get_permalink(8);?>#aboutus">About Us</a></li>
                                    </ul>
                                </li>
								<li><a href="<?php echo get_permalink(9);?>">Contact Us</a></li>
                            </ul><!-- /.menu -->
                        </nav><!-- /.mainnav -->
                    </div><!-- /.nav-wrap -->                                     
                </div><!-- /.header-wrap --> 
            </header><!-- /.header -->
			<?php if(is_front_page()) { ?>
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <ul>
                        <?php
							$sargs = array('categorye'=>12, 'post_status'=>'publish', 'posts_per_page'=>4, 'order'=>'ASC', 'post_type'=>'post');
							$spost_list = get_posts($sargs);
							foreach($spost_list as $spost) {
							$surl = wp_get_attachment_url( get_post_thumbnail_id($spost->ID) );
							?>
            
                        <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                        <img src="<?php echo $surl; ?>" alt="" />

                           <div class="tp-caption sft" data-x="410" data-y="235" data-speed="1000" data-start="500" data-easing="Power3.easeInOut">
                                <img style="width:450px;height:100%" src="<?php bloginfo('template_url'); ?>/assets/images/card.png" alt="Logo" data-easing="Power3.easeInOut">
                            </div>

                        </li>
                        <?php } ?>
                      </ul>
                </div>
            </div>
			</div> <!-- /.wrap-slider -->
			<?php } ?>