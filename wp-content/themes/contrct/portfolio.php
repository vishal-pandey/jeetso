<?php
/**
 * Template Name: Portfolio
 */

get_header(); ?>
<!-- Page title -->
<div class="page-title parallax parallax1" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(31));?>);">             
	<div class="container">
		<div class="row">
			<div class="col-md-12">                    
				<div class="page-title-heading">
					<h2 class="title">Portfolio</h2>
				</div><!-- /.page-title-captions -->
				<div class="breadcrumbs">
					<ul>
						<li><a href="<?php echo home_url();?>">Home</a></li>
						<li>Portfolio</li>
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
					<?php
						$args = array('post_type'=>'services', 'post_status'=>'publish', 'posts_per_page'=>8, 'order'=>'ASC');
						$post_list = get_posts($args);
						foreach($post_list as $post) {
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
						if( class_exists('Dynamic_Featured_Image') ) {
						global $dynamic_featured_image;

						$featured_images = $dynamic_featured_image->get_featured_images($post->ID);
						
					?>
                    <div class="col-md-4">
                        <div class="flat-gallery v3">
                            <div class="item">
                                <img src="<?php echo $url;?>" alt="<?php echo $post->post_title;?>">
                                <div class="hover">
                                </div><!-- /.hover -->
                                <div class="gallery-content">
								<a  href="<?php echo get_permalink(450);?>?id=<?php echo $post->ID;?>">
                                    <ul class="gallery-link">
                                        <li class="icon-s FromLeft">
										<?php 
											foreach($featured_images as $featured_image) {
												echo "<img style='width:85px;' src='".$featured_image['full']."'>";
											}
									}
										?>
										</li>
                                     </ul>
                                    <h3 style="color:#fff;"><?php echo $post->post_title;?></h3>
									</a>
                                </div><!-- /.gallery-content -->
                            </div>  <!-- /item -->      
                        </div><!-- /.portfolio-wrap --> 
                    </div><!-- /col-md-4 -->
					<?php } ?>
						
                </div>

                

            </div><!-- /.container -->   
        </section>
        		
	
<?php get_footer();?>
