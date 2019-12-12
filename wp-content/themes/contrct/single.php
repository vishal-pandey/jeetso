<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post(); 

$postID = get_the_ID();
?>
<style>
    .content p {
            margin-bottom: 20px;
    }
    .ulli {
            list-style-type: disc;
    padding: 5px 27px;
    line-height: 27px;
    }
</style>

 <div class="page-title parallax parallax1" style="background-image: url(https://jeetso.com/client-demo/contractor/wp-content/uploads/2018/07/Banner-for-Services-2.png);">             
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">                    
                            <div class="page-title-heading">
                                <h2 class="title"><?php the_title();?></h2>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="<?php echo home_url();?>">Home</a></li>
                                    <li><?php the_title();?></li>
                                </ul>                   
                            </div><!-- /.breadcrumbs --> 
                        </div><!-- /.col-md-12 -->  
                    </div><!-- /.row -->  
                </div><!-- /.container -->                      
            </div><!-- /.page-title -->
        </div> <!-- /.wrap-slider -->
<section class="main-content sidebar-left bg-sidebar services v2">
            <div class="container">
                <div class="row">
                    <div class="wrap-main-post">
                        <?php get_sidebar(); ?>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="flat-single">
                                        <div class="icon">
                                            <?php //the_post_thumbnail('full');?>
											
											<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($postID));?>" alt="image">
											
                                        </div><!-- /.feature-post -->
                                    </div><!-- /flat-single -->
                                </div><!-- /col-md-6 -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="flat-divider d20px"></div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="flat-single">
                                    <div class="content">
                                        

                                        <?php the_content();?>
										
									</div>
                                </div>

                               
                            </div><!-- /col-md-6 -->   

                            <div style="clear:both;"></div>
                            <div class="row">
                                 <div class="portfolio-wrap clearfix">
                             <div class="flat-gallery">
							
							
							<?php
							        $post = get_post($postID); 
                                    $slug = $post->post_name;
									$gargs = array('post_type' => 'portfolio', 'posts_per_page'=>8, 'orderby' => 'rand',
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
                            
                        </div><!-- / col-md-8 -->
                    </div><!-- /.wrap-main-post -->
                </div><!-- /.row -->
				
				
				    
				
				
            </div><!-- /.container -->   
        </section><!-- /main-content -->
<?php  endwhile;  ?>        



<?php get_footer();
