<?php
/**
 * Template Name: Portfolio Details
 */

get_header(); ?>
<!-- Page title -->
<?php
	$postID = $_GET['id'];
	$post = get_post($postID); 
	$slug = $post->post_name;
?>
<div class="page-title parallax parallax1" style="background-image: url(https://jeetso.com/client-demo/contractor/wp-content/uploads/2018/07/Banner-for-Portfolio-pages2.png);">             
	<div class="container">
		<div class="row">
			<div class="col-md-12">                    
				<div class="page-title-heading">
				
					<h2 class="title"><?php echo get_the_title($postID);?> Portfolio</h2>
				</div><!-- /.page-title-captions -->
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo home_url();?>">Home</a></li>
						<li><?php echo get_the_title($postID);?> Portfolio</li>
					</ul>                   
				</div><!-- /.breadcrumbs --> 
			</div><!-- /.col-md-12 -->  
		</div><!-- /.row -->  
	</div><!-- /.container -->                      
</div><!-- /.page-title -->
</div> <!-- /.wrap-slider -->
<!-- Contact -->
        
<!-- Blog posts -->
        <section class="main-content services v1">
            <div class="container">
                <div class="row">
					 <div class="row">
                                 <div class="portfolio-wrap clearfix">
                             <div class="flat-gallery">
							
							
							<?php
									$postID = $_GET['id'];
							        $post = get_post($postID); 
                                    $slug = $post->post_name;
									$gargs = array('post_type' => 'portfolio', 'posts_per_page'=>100, 'orderby' => 'rand',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'nimble-portfolio-type',
                                                    'field' => 'slug',
                                                    'terms' => $slug,
                                                ),
                                            ),
                                         );
									
									
									$gpost_list = get_posts($gargs);
									
									$counter = 1;
									$i = 1;
									foreach($gpost_list as $gpost) {
									$gurl = wp_get_attachment_url( get_post_thumbnail_id($gpost->ID) );
									 if($counter==1 or $counter==2) {
									
								?>
											<div class="item v2">
											<div class="icon">
												<img src="<?php echo $gurl; ?>" alt="">
												<div class="hover">
												</div><!-- /.hover -->
											</div>
											<div class="gallery-content">
												<ul class="gallery-link">
													<li class="icon-s FromLeft"><a class="popup-gallery" href="<?php echo $gurl; ?>"><span><i class="search"></i></span></a></li>
												 </ul>
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
                   
                                
                            </div>	
                </div>

                

            </div><!-- /.container -->   
        </section>
        		
	
<?php get_footer();?>
