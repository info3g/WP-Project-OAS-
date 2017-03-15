<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<script>
		function captchaCode() {
			var Numb1, Numb2, Numb3, Numb4, Code;     
			Numb1 = (Math.ceil(Math.random() * 10)-1).toString();
			Numb2 = (Math.ceil(Math.random() * 10)-1).toString();
			Numb3 = (Math.ceil(Math.random() * 10)-1).toString();
			Numb4 = (Math.ceil(Math.random() * 10)-1).toString();
		  
			Code = Numb1 + Numb2 + Numb3 + Numb4;
			jQuery("#captcha span").remove();
			jQuery("#captcha input").remove();
			jQuery("#captcha").append("<span id='code'>" + Code + "</span><input type='button' class='cap' onclick='captchaCode();'>");
		}
		function validateEmail(email) 
		{
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
	jQuery(document).ready(function(){
		var img_url = jQuery('#full_image img').attr('src');
		jQuery('.main_thumb a').attr('href', img_url);
		jQuery('.thumb_nails').click(function(event){
			var thumb = jQuery(this).find('img').attr('src');
			jQuery('.main_thumb a').html('<img width="300" height="225" src="'+thumb+'">');
		});
		jQuery('.example-image-link').click(function(){
			var img = jQuery('.example-image-link img').attr('src');
			jQuery('.main_thumb a').attr('href', img);
		});
		
		/*===== Code for Contact form =====*/
		
		captchaCode();
		jQuery('.submit').click(function(){
			var urls = '<?php echo site_url();?>/wp-content/themes/twentysixteen_child';
			
			var captchaVal = jQuery("#code").text();
			var captchaCode = jQuery(".captcha").val();
			/*===== Captcha Validation =======*/
				/* if (captchaVal == captchaCode) {
					alert('valid');
				}else{
					alert('Invalid');
				} */
					
			/*======== Email Validation ==========*/	
			var email 	 = jQuery("#email").val();
			var name 	 = jQuery("#name").val();
			var message  = jQuery("#message").val();
			var attachment  = jQuery("#attachment").val();
			
			if( jQuery("#send_email").is(':checked') )
			{
				var checkbox = 1;
			}else{
				var checkbox = 0;
			}
			
			if ( email == '' || name == '' || message == '' || captchaCode == '' ) 
			{
				alert("Please Fill Required Fields");
			}else if( !validateEmail( email ) ){
				alert('Please Enter Valid Email Address');
			}else if ( captchaVal != captchaCode ) {
				alert('Please Enter Valid Captcha Number');
			}
			else
				{
					jQuery('#loaderr').show();
					var form_data = { 'email' : email, 'name': name, 'message': message, 'checkbox':checkbox, 'attachment':attachment }
					// Returns successful data submission message when the entered information is stored in database.
					jQuery.ajax({ 
						url : urls+'/contact_form.php',
						data: form_data,
						type: 'post',
						success: function(output) {
							//alert(output);
							jQuery('#thankyou').show();
							location.reload().delay('1000');
						}
					});
				}
			
					
		});
		
		
	});
</script>
<div id="post-<?php the_ID(); ?>" class="main_content" id="content">
	<?php $post_id = get_the_ID(); ?>
	
	<span class="add_fav"><?php wpfp_link() ?></span>
	<div class="left_content">
		<div id="full_image" style="display:none;"><?php echo get_the_post_thumbnail($post_id, 'full');?></div>
		<div class="main_thumb"><a class="example-image-link" data-lightbox="example-set"><?php if(get_the_post_thumbnail($post_id, 'medium') !='' ){ echo get_the_post_thumbnail($post_id, 'medium');}else{echo '<img src="'.site_url().'/wp-content/themes/twentysixteen_child/images/default-image.jpg" />';}?></a></div>
		<?php 
			$img = get_the_post_thumbnail_url( $post_id, 'medium' );
			$c= explode('wp-content', $img);
			$attachment =  $c['1'];
			$gal_id = get_post_meta( $post_id );
			$photo = $gal_id['photo']; 
			if(!empty($photo))
			{
				foreach( $photo as $photos )
				{
					$images[] = get_post_meta( $photos, '_wp_attached_file', true );				
				}
				if(!empty($images)){
		?>
			<div class="multiple_images">
				<ul>
				<?php $i =0;
				foreach( $images as $imagess ){?>
					<li><a href="javascript:void(0);" class="thumb_nails"><img id="<?php echo $i;?>" width="100" src="<?php echo site_url().'/wp-content/uploads/'.$imagess; ?>"></a></li>
				<?php $i++; } ?>
				</ul>
			</div>
			<?php }
			}	?>
	</div>
	<div class="right_content">
		<?php
			$post_data = get_post( $post_id );
			/* echo "<pre>";print_r($post_data); */
			$company_name = get_post_meta( $post_id, 'company_name', true );
			$website_url = '<a href="'.get_post_meta( $post_id, 'website_url', true ).'">'.get_post_meta( $post_id, 'website_url', true ).'</a>';
			$blog_url = '<a href="'.get_post_meta( $post_id, 'blog_url', true ).'">'.get_post_meta( $post_id, 'blog_url', true ).'</a>';
			$social = get_post_meta( $post_id, 'social', true );
			$apps = get_post_meta( $post_id, 'apps', true );
			if(empty($company_name)){$company_name = "N/A";}
			if(empty($website_url)){$website_url = "N/A";}
			if(empty($blog_url)){$blog_url = "N/A";}
			if(empty($social)){$social = "N/A";}
			if(empty($apps)){$apps = "N/A";}
			$categories = get_the_category(); 
			
			global $current_user;
			get_currentuserinfo();
		?>
		<div>
			<p><b>Date Listed : </b><?php echo date('F-j-Y', strtotime($post_data->post_date));?></p>
			<p><b>Company Name : </b><?php echo ucfirst( $company_name );?></p>
			<p><b>Website Url : </b><?php echo ucfirst( $website_url );?></p>
			<p><b>Blog Url : </b><?php echo ucfirst( $blog_url );?></p>
			<p><b>Social Media : </b><?php echo ucfirst( $social );?></p>
			<p><b>Apps : </b><?php echo ucfirst( $apps );?></p>
			<p><b>Category : </b><?php if ( ! empty( $categories ) ){echo esc_html( $categories[0]->name );}?></p>
			<p><?php do_shortcode('[post-views]');?></p>
			<br/>
			<p><b>Description:</b> <?php the_content();?></p>
			<p><?php echo do_shortcode('[simple-social-share]'); ?></p>
			<p>
				<form>
				<h3>Contact Poster</h3>
					<input type="text" name="email" value="<?php echo $current_user->user_email;?>" id="email" placeholder="Your Email">
					<input type="text" name="name" value="<?php echo $current_user->user_login;?>" id="name" placeholder="Your Name">
					<textarea name="message" id="message" placeholder="Message"></textarea>
					<input type="text" name="captcha" class="captcha" maxlength="4" size="4" placeholder="Enter captcha code" tabindex=3 /><span id="captcha"></span><br/>
					<input type="hidden" name="attachment" id="attachment" value="<?php echo $attachment;?>" >
					<input type="checkbox" name="send_email" value="" id="send_email"> Send me a copy of email<br/>
					<input type="button" name="submit" class="submit" value="Send Email">
					<span id="thankyou" style="display:none">Thank You For Your Request, We Will Contact You Soon.</span>
				</form>
			</p>
		</div>
	</div>
</div>
