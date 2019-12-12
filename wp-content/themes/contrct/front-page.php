<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- Flat-services -->
        <section class="flat-row pad-top0px mar-topam80px pad-bottom72px flat-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="flat-carousel">
                            <div class="row">
                                
                                
                                <div class="col-md-4">
                                    <div class="wrap-img">
                                        <!--<img src="<?php bloginfo('template_url'); ?>/assets/images/member/01-Home-v1.jpg" alt="images">-->
                                        <div class="jasbir" class="jasbir-container" style="display:none;width:100%;margin:0 auto;">
                                            <img style="width:100%;height:310px;" src="<?php bloginfo('template_url'); ?>/assets/images/Bathroom-before_preview.png"/>
                                            <img style="width:100%;height:310px;" src="<?php bloginfo('template_url'); ?>/assets/images/Bathroom-after_preview.png"/>
                                        </div>

                                    </div>
                                    <div class="content">
                                         <span>01</span>
                                         <h6>Bathrooms</h6>
                                     </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="wrap-img">
                                        <div class="jasbir" class="jasbir-container" style="display:none;width:100%;margin:0 auto;">
                                            <img style="height:310px;" src="<?php bloginfo('template_url'); ?>/assets/images/Deck-before_preview.png"/>
                                            <img style="height:310px;" src="<?php bloginfo('template_url'); ?>/assets/images/Deck-after_preview.png"/>
                                        </div>

                                    </div>
                                    <div class="content">
                                         <span>02</span>
                                         <h6>Decks</h6>
                                     </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="wrap-img">
                                        <div class="jasbir" class="jasbir-container" style="display:none;width:100%;margin:0 auto;">
                                            <img style="height:310px;" src="<?php bloginfo('template_url'); ?>/assets/images/KITCHEN-Before_preview.png"/>
                                            <img style="height:310px;" src="<?php bloginfo('template_url'); ?>/assets/images/KITCHEN-after_preview.png"/>
                                        </div>

                                    </div>
                                    <div class="content">
                                         <span>03</span>
                                         <h6>Kitchens</h6>
                                     </div>
                                </div>
                                

                                
                            </div>
                        </div><!-- /.flat-carousel -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>

        <!-- Flat-iconbox -->
        <section class="flat-row wrap-iconbox">
            <div class="container">
                <div class="row">
                	<div class="col-md-12">
	                    <div class="flat-title">
	                        <h3>Remodeling <span></span></h3>
	                        <div class="decs">
	                            From supply to install...we do it all!
	                        </div><!-- /.decs -->
	                    </div><!-- /.flat-title -->
	                </div>

	                <div class="col-md-12">
	                    <div class="flat-carousel">
	                        <div class="owl-carousel-iconbox">
								<?php
									$args = array('post_type'=>'services', 'post_status'=>'publish', 'posts_per_page'=>8, 'order'=>'ASC');
									$post_list = get_posts($args);
									foreach($post_list as $post) {
									$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
									if( class_exists('Dynamic_Featured_Image') ) {
									global $dynamic_featured_image;

									$featured_images = $dynamic_featured_image->get_featured_images($post->ID);
								?>
	                            <div class="flat-iconbox">
	                                <div class="box-icon">
	                                    <?php 
											foreach($featured_images as $featured_image) {
												echo "<img style='width:65px;' src='".$featured_image['full']."'>";
											}
									}
										?>
	                                </div>
	                                <div class="content">
	                                    <p><?php echo $post->post_title;?></p>
	                                    <a class="more" href="<?php the_permalink();?>">Read More <i class="fa fa-long-arrow-right"></i></a>
	                                </div>
	                                <div class="overlay">
	                                    <img src="<?php echo $url;?>"  alt="<?php echo $post->post_title;?>">
	                                </div>
	                            </div> <!-- /.flat-iconbox -->
								<?php } ?>
	                            
	                        </div><!-- /.owl-carousel -->
	                    </div><!-- /.flat-carousel -->
	                </div>
                </div><!-- /.row -->
            </div><!-- /.container -->        
        </section>

        <!-- Flat-gallery -->
        <section class="flat-row pad-top85px wrap-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-title mag-bottom40px">
                            <h3>The Gallery <span></span></h3>
                           <!-- <div class="decs">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                            </div> /.decs -->
                        </div><!-- /.flat-title -->
                    </div><!-- /col-md-12 -->
                    <div class="col-md-12">
                        <div class="portfolio-wrap clearfix">
                             <div class="flat-gallery">
							
							
							<?php
									$gargs = array('post_type'=>'portfolio', 'post_status'=>'publish', 'posts_per_page'=>8, 'orderby' => 'rand');
									$gpost_list = get_posts($gargs);
									
									$counter = 1;
									$i = 1;
									foreach($gpost_list as $gpost) {
									$gurl = wp_get_attachment_url( get_post_thumbnail_id($gpost->ID) );
									 if($counter==1 or $counter==2) {
									
								?>
											<div class="item v2">
											<div class="icon icon2">
												<img src="<?php echo $gurl; ?>" alt="">
												<div class="hover">
												</div><!-- /.hover -->
											</div>
											<div class="gallery-content">
												<ul class="gallery-link">
													<li class="icon-s FromLeft"><a class="popup-gallery" href="<?php echo $gurl; ?>"><span><i class="search"></i></span></a></li>
												 </ul>
												<h5>Build Design</h5>
											</div><!-- /.gallery-content -->
										</div>
										
										<?php } else { ?>
										<div class="item v1">
											<div class="icon">
												<img src="<?php echo $gurl; ?>" alt="">
												<div class="hover">
												</div><!-- /.hover -->
											</div>
											<div class="gallery-content">
												<ul class="gallery-link">
													<li class="icon-s FromLeft"><a class="popup-gallery" href="<?php echo $gurl; ?>"><span><i class="search"></i></span></a></li>
												 </ul>
												<h5>Build Design</h5>
											</div><!-- /.gallery-content -->
										</div>
										<?php }
										if($counter==4){
											  $counter=0;
											}

											$counter++;
											} ?>
							
                                
                                </div><!-- /flat-gallery -->
                        </div><!-- /portfolio-wrap -->
                    </div><!-- /col-md-12 -->
                    <div class="col-md-12" >
                        <div class="wrap-button-gallery text-center">
                            <button class="button button--isi button--text-thick button--text-upper button--size-s"><span><a style="color:#fff;" href="<?php echo get_permalink(31);?>">View all Gallery</a></span></button>
                        </div>
                    </div>
                </div><!-- /row -->
            </div> <!-- /container -->
        </section>

        <!-- Testimonials -->
        <section class="flat-row pad-top0px pad-bottom110px row-testimonilas-slider testimonial-bg" style="background-image:url(<?php bloginfo('template_url'); ?>/assets/images/Contractor.png);background-attachment: fixed; background-position: center;background-repeat: no-repeat;background-size: cover;">
            <div class="container">
                <div class="row">
				<div class="flat-title testimonials">
                            <h3>TESTIMONIALS <span></span></h3>
                          </div><!-- /.flat-title -->
                    <div class="col-md-5">
                        
                        <div class="flat-testimonials-images">
                            <div class="flat-testimonials-slider">
                                <div class="flat-title"></div>
                                <div id="flat-testimonials-flexslider">
                                    <ul class="slides">
									<?php
										$args = array('post_type'=>'testimonials', 'post_status'=>'publish', 'posts_per_page'=>6, 'order'=>'ASC');
										$post_list = get_posts($args);
										$i = 1;
										foreach($post_list as $post) {
											if($i == 1) {
									?>
                                        <li style="height:510px;overflow-y:scroll;">
                                           <p>
										   <b><?php echo $post->post_title;?></b><br/>
										   <?php echo $post->post_content;?>
										   </p>
                                        </li>

                                    <?php } else { ?>
										<li>
                                           <p>
										   <b><?php echo $post->post_title;?></b><br/>
										   <?php echo $post->post_content;?>
										   </p>
                                        </li>
										<?php } $i++; } ?>
                                </div>
                                
								<div id="flat-testimonials-carousel">
                                    <ul class="slides">
									<?php
										$args = array('post_type'=>'testimonials', 'post_status'=>'publish', 'posts_per_page'=>6, 'order'=>'ASC');
										$post_list = get_posts($args);
										foreach($post_list as $post) {
									?>
                                        <li style="">
                                            <img style="width:20px;height:20px;" src="<?php bloginfo('template_url'); ?>/assets/images/black-dot.png">
                                            <div class="overlay"></div>
                                        </li>
                                     <?php } ?>                    
                                    </ul>
                                </div>
								
                            </div><!-- /.flat-testimonials-slider -->
                        </div><!-- /.flat-testimonials -->
                    </div>

                    <div class="col-md-7">
                        <div class="flat-title"></div>

                        <div class="from-blog">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/foreground_preview.png" alt="">
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

        <!-- Team -->
        <section class="flat-row parallax parallax2 wrap-flat-team pad-top85px pad-bottom0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-title">
                            <h3>Connect with us <span></span></h3>
                            <!--<div class="decs">
                                Sed ut perspiciatis unde omnis iste voluptatem accusantium
                            </div> /.decs -->
                        </div><!-- /.flat-title -->
                    </div>

                    <div class="col-md-4">
                        <div class="flat-team"> 
                            <div class="avatar"> 
                                <!--<img src="<?php bloginfo('template_url'); ?>/assets/images/member/1t1.png" alt="image">
                                <div class="content">
                                    <h6 class="name">Danielle Reynolds</h6>  
                                    <span class="position">Project manager</span>  
                                    <ul class="flat-socials">
                                        <li class="facebook">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="instagram">
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li class="linkedin">
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>-->
                            </div>
                        </div> <!-- flat-team -->
                    </div><!--  /.col-md-4 -->

                    <div class="col-md-4">
                        <div class="flat-team"> 
                            <div class="avatar"> 
                                <img src="<?php bloginfo('template_url'); ?>/assets/images/card.png" alt="image" style="margin-bottom: 160px;">
                                <div class="content">
                                    <h6 class="name">Brian Fitzgerald</h6>  
                                    <span class="position">Owner</span>  
                                    <ul class="flat-socials">
                                        <li class="facebook">
                                            <a target="_blank" href="https://www.facebook.com/WoodNDreamsInc/"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="twitter">
                                            <a target="_blank" href="https://www.houzz.com/pro/brian-fitzgerald7198683/wood-n-dreams-inc"><img src="<?php bloginfo('template_url'); ?>/assets/images/houzz.png" style="width:21px;" /> </a>
                                        </li>
                                        <li class="linkedin">
                                            <a target="_blank" href="linkedin.com/in/brian-fitzgerald-a6a9003"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> <!-- flat-team -->
                    </div><!--  /.col-md-4 -->

                    <div class="col-md-4">
                        <div class="flat-team"> 
                            <div class="avatar"> 
                                <!--<img src="<?php bloginfo('template_url'); ?>/assets/images/member/3t1.png" alt="image">
                                <div class="content">
                                    <h6 class="name">Stephen Obrien</h6>  
                                    <span class="position">Web Designer</span>  
                                    <ul class="flat-socials">
                                        <li class="facebook">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="instagram">
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li class="linkedin">
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>-->
                            </div>
                        </div> <!-- flat-team -->
                    </div><!--  /.col-md-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        
        <!-- Client -->
        <section class="flat-row wrap-client pad-bottom90px pad-top85px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-title">
                            <h3>Our Suppliers <span></span></h3>
                            <div class="decs">
                               A few of the brands that we proudly supply
                            </div><!-- /.decs -->
                        </div><!-- /.flat-title -->
                    </div><!-- /col-md-12 -->

                    <div class="col-md-12">
                        <div class="flat-carousel">
                            <div class="owl-carousel-client">
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/caeserstone.png" alt="images">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/cambria-logo.jpg" alt="images">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/Decora Cabinetry.jpg" alt="images">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/Dynasty logo.png" alt="images">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/fabuwood logo.png" alt="images">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/nextstone logo.jpg" alt="images">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/silestone-logo.jpg" alt="images">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/Stikwood-company_logo_2.jpeg" alt="images">
                                </div>
                                <div class="item">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/Wolf Cabinets.jpg" alt="images">
                                </div>
                                
                            </div><!-- /owl-carousel-client -->
                        </div><!-- /flat-carousel -->     
                    </div><!-- /col-md-12 -->                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>


<?php get_footer();
