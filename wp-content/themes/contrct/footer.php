<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		 <!-- Footer -->
        <footer class="footer">
            <div class="title"><p>PLEASE CALL US ANYTIME</p></div>
            <h1>908-490-0101</h1>

            <div class="footer-widgets">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-3">  
						<div class="widget widget-categories">
                            <h4 class="widget-title">Overview</h4>
                                <p style="color: #8d8e92;">Wood-N-Dreams is New Jersey’s best contractor for beautiful kitchens, baths, additions and more. We can handle any home improvement project, from design through installation. Since 1990, owner Brian Fitzgerald has assembled a professional team of people capable of ensuring your project will be completed quickly, without hassle and within budget. Listening to your ideas and dreams, we work closely with you to develop the living space you want anywhere in New Jersey and surrounding areas. </p>
                        </div>
                        </div><!-- /.col-md-3 --> 

                         <div class="col-md-3">  
                            <div class="widget widget-categories">
                                <h4 class="widget-title">Quick Links</h4>
                                <ul class="unstyled">
                                    <li><a href="<?php echo home_url();?>">Home</a></li>
                                    <li><a href="<?php echo get_permalink(8);?>">About Us</a></li>
                                    <li><a href="<?php echo get_permalink(9);?>">Contact Us</a></li>
                                    <li><a href="<?php echo get_permalink(31);?>">Portfolio</a></li>
                                    <li><a href="<?php echo get_permalink(455);?>">Privacy Policy</a></li>
                                    
                                </ul>
                            </div>  
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">  
                            <div class="widget widget-categories">
                                <h4 class="widget-title">Services</h4>
                                <ul class="unstyled">
								<?php
									$args = array('post_type'=>'services', 'post_status'=>'publish', 'posts_per_page'=>8, 'order'=>'ASC');
									$post_list = get_posts($args);
									foreach($post_list as $post) {
									?>
                                    <li><a href="<?php echo get_permalink($post->ID);?>"><?php echo $post->post_title;?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>   
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="widget widget-text">
                                <h4 class="widget-title">Contact Info</h4>
                                <div class="textwidget">                                
                                    <p>New Jersey Kitchen & Bath Remodeling Specialist</p>
                                </div><!-- /.textwidget -->
                                <ul class="unstyled">
                                    <li class="address">411 Park Avenue, Scotch Plains, New Jersey 07076, United States</li>
                                    <li class="mail"><a href="mailto:woodnd2@aol.com">woodnd2@aol.com</a></li>
                                    <li class="phone"><a href="tel:9084900101">908-490-0101</a></li>  
                                </ul> 

                            </div><!-- /.widget --> 
                        </div><!-- /.col-md-4 -->
                    </div><!-- /.row -->    
                </div><!-- /.container -->
            </div><!-- /.footer-widgets -->
        </footer>

        <!-- Bottom -->
        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
<div class="col-md-4">
	<div class="copyright"> 
		<p>Copyright 2018. All Right Reserved.</p>
	</div>
	</div>
	<div class="col-md-5">
	<div class="copyright"> 
		<p>Design, Development and Marketing by ProSourceClicks</p>
	</div>
	</div>
<div class="col-md-3">
	<!-- Go Top -->
	<a class="go-top-v1"> <i class="fa fa-arrow-up"></i>  &nbsp;Back to Top</a>                   
</div><!-- /.col-md-12 -->
</div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
        
        <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-arrow-up" aria-hidden="true"></i>
        </a> 

        
        <!-- Javascript -->
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.min.js"></script> 
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.easing.js"></script>     
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/owl.carousel.js"></script> 
        
        <script>
            var owl = $('.owl-carousel-client');
owl.owlCarousel({
    items:5,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:4000,
    autoplayHoverPause:true
});
        </script>
        
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/imagesloaded.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.magnific-popup.min.js"></script> 
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.isotope.min.js"></script>
        <script type="text/javascript" src="<?php //bloginfo('template_url'); ?>/assets/js/imagesloaded.min.js"></script>    
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery-waypoints.js"></script>    
        <script type="text/javascript" src="<?php //bloginfo('template_url'); ?>/assets/js/jquery.tweet.min.js"></script>   
        <script type="text/javascript" src="<?php //bloginfo('template_url'); ?>/assets/js/jquery.cookie.js"></script>    
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.fitvids.js"></script>    
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/parallax.js"></script>        
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/main.js"></script>
        
     
		<script>
		jQuery( function( $ ) { 

$("nav.filters li:first a").css("display","none");

setTimeout(function() {
 $("nav.filters li:nth-child(2) a").addClass("filterSelected").click() }, 1000);

});
		</script>
			<!-- Revolution Slider -->
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/jquery.themepunch.revolution.min.js">
        </script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/slider.js"></script>
		
		<?php if(!is_page(8)) { ?>
		
		<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/assets/js/jquery.event.move.js'></script>
        <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/assets/js/jquery.move.js'></script>
        <script type='text/javascript' src='<?php bloginfo('template_url'); ?>/assets/js/public.js'></script>

<?php } if(is_page(8)) { ?>

<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/assets/js/jquery.touchSwipe.min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_url'); ?>/assets/js/timeline.js'></script>
<?php } ?>
    </div>
<?php wp_footer(); ?>

</body>
</html>
