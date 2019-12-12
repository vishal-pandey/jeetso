<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */


 //if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	//return;
//}
?>

<!--<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'twentyseventeen' ); ?>">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
</aside> #secondary -->



<div class="col-md-4">
	<div class="sidebar">
		<div class="widget widget-dowload services-single">
			<h4 class="widget-title">All services</h4>
			<ul class="dowload">
			
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
		</div><!-- /.widget-categories -->

		
		
		<div class="widget widget-text">
			<h4 class="widget-title">Our Office</h4>
			<div class="textwidget">                                
			<p>New Jersey Kitchen & Bath Remodeling Specialist</p>
		</div><!-- /.textwidget -->
		<ul class="unstyled">
			<li class="address">411 Park Avenue, Scotch Plains, New Jersey 07076, United States</li>
			<li class="mail"><a href="#">Support2@domain.com</a></li>
			<li class="phone"><a href="tel:9083982495">(908) 398-2495</a></li>  
		</ul> 
		</div><!-- /.widget-text -->  
	</div><!-- /sidebar -->
</div><!-- /col-md-4 -->