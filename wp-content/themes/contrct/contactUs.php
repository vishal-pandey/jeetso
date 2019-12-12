<?php
/**
 * Template Name: Contact Us
 */

get_header(); ?>
<!-- Page title -->
            <div class="page-title parallax parallax1" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(9));?>);">             
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">                    
                            <div class="page-title-heading">
                                <h2 class="title">Contact Us</h2>
                            </div><!-- /.page-title-captions -->
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="<?php echo home_url();?>">Home</a></li>
                                    <li>Contact us</li>
                                </ul>                   
                            </div><!-- /.breadcrumbs --> 
                        </div><!-- /.col-md-12 -->  
                    </div><!-- /.row -->  
                </div><!-- /.container -->                      
            </div><!-- /.page-title -->
        </div> <!-- /.wrap-slider -->
		<!-- Contact -->
        
		<section class="flat-row pad-top120px">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-content">
                            <div class="contact-address">
                                <div class="style1">                                    
                                   <img src="<?php bloginfo('template_url'); ?>/assets/images/icon/c1.png" alt="image">
                                </div> 
                                <div class="details">
                                    <h5>Our Location</h5>
                                    <p>411 Park Avenue, <br>Scotch Plains, NJ<br> 07076
BY APPOINTMENT ONLY</p>
                                 </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-content">
                            <div class="contact-address">
                                <div class="style1">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/icon/c2.png" alt="image">
                                </div>
                                <div class="details">
                                    <h5>Contact us Anytime</h5>
                                    <p>Mobile: 908-490-0101 </p>
                                    <p>Email: woodnd2@aol.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-content">
                            <div class="contact-address">
                                <div class="style1">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/icon/c3.png" alt="image">
                                </div>
                                <div class="details">
                                    <h5>Contact Person</h5>
                                    <p>Brian Fitzgerald</p>
                                    <p>&nbsp;</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="flat-divider d70px"></div>
                </div>
				<?php
					if(isset($_POST['Submit'])) {
						$fname = $_POST['fname'];
						$email = $_POST['email'];
						$subject = $_POST['subject'];
						$message = $_POST['message'];
						
						$table = "jscontra1_contact_details";
						$data = array('name'=>$fname, 'email'=>$email, 'subject'=>$subject, 'message'=>$message);
						global $wpdb;
						$insert = $wpdb->insert($table, $data);
						if($insert) {
							$to = "jasbeer.singh1990@gmail.com";
						$headers = "From:Yoga Team<".$to.">\r\n";
						$headers .= 'MIME-Version: 1.0' . "\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1";
						$subject = $subject;
						$body = '<p style="margin-left:20px;"><b>Hello Team,</b></p>
						<p style="margin-left:20px;">A new contact us request from the website.</p>';
						$body .= '<p style="margin-left:20px;"><label>Client Name: <b>'.$fname.'</b></label></p>';
						$body .= '<p style="margin-left:20px;"><label>Email: <b>'.$email.'</b></label></p>';
						$body .= '<p style="margin-left:20px;"><label>Message: <b>'.$message.'</b></label></p>';
						
						$body .="<p style='margin-left:20px;font-weight:bold;'>Best Regards, </p>
						<p style='margin-left:20px;font-weight:bold;'>Team</p></br>";
					$body .="<p style='font-size:10px;'>Please consider your environmental responsibility before printing this e-mail</p>";
							
							$usrmsg ="<p style='margin-left:20px;'><b>Dear $fname,</b></p></br>
					<p style='margin-left:20px;'>Thank you for contacting us. We will get in touch with you shortly.</p></br>";
					$usrmsg .="<p style='margin-left:20px;font-weight:bold;'>Best Regards,</p>
					<p style='margin-left:20px;font-weight:bold;'>Team</p></br>";
					$usrmsg .="<p style='font-size:10px;'>Please consider your environmental responsibility before printing this e-mail</p>";
							
							
							wp_mail( $to, $subject, $body, $headers);
							wp_mail( $email, $subject, $usrmsg, $headers);
							ob_flush();
							echo '<p style="color:green;font-weight:bold;">Your request has been successfully submitted.</p>';
							
						
						}
						
						
					}
						?>
                <h4 class="title comment-title">Leave a Message</h4>
                    <form  id="contactus" class="flat-contact-form style2 bg-dark height-small" method="post" action="">
                        <div class="field clearfix">      
                            <div class="wrap-type-input">                    
                                <div class="input-wrap name">
                                    <input type="text" value="" tabindex="1" placeholder="Name" name="fname" id="name" required>
                                </div>
                                <div class="input-wrap email">
                                    <input type="email" value="" tabindex="2" placeholder="Email" name="email" id="email" required>
                                </div>
                                <div class="input-wrap last Subject">
                                    <input type="text" value="" placeholder="Subject (Optinal)" name="subject" id="subject" >
                                </div>  
                            </div>
                            <div class="textarea-wrap">
                                <textarea class="type-input" tabindex="3" placeholder="Message" name="message" id="message-contact" required></textarea>
                            </div>
                        </div>
                        <div class="submit-wrap">
                            <input type="submit" name="Submit" class="flat-button bg-theme" value="Send Your Message" />
                        </div>
                    </form><!-- /.comment-form -->       
            </div><!-- /.container -->   
        </section>
<section class="row-map">
            <div class="container-fluid">
                <div class="row">
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3027.0718953689884!2d-74.39985358480307!3d40.650345549322346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3b0869ad8b797%3A0x9cb217f7884b17d7!2s411+Park+Ave%2C+Scotch+Plains%2C+NJ+07076%2C+USA!5e0!3m2!1sen!2sin!4v1523462287051" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe> 
                </div>
            </div><!-- /.container -->
        </section>
        
		
<?php get_footer();
