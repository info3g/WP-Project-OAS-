<?php
/* add_action( 'wp_enqueue_scripts', 'my_child_theme_scripts' );
function my_child_theme_scripts() {
    wp_enqueue_style( 'tweetysixteen-style', get_template_directory_uri() . '/style.css' );
} */

	register_sidebar( array(
        'name' => __( 'Top Header', 'theme-slug' ),
        'id' => 'sidebar-4',
        'before_widget' => '<div class="tagline_head">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="tagline">',
		'after_title'   => '</h3>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Footer', 'theme-slug' ),
        'id' => 'sidebar-5',
        'before_widget' => '<div id="copyright">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Banner Header', 'theme-slug' ),
        'id' => 'sidebar-6',
        'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Category', 'theme-slug' ),
        'id' => 'sidebar-7',
        'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
    ) );
	
	register_sidebar( array(
        'name' => __( 'Banner Header1', 'theme-slug' ),
        'id' => 'sidebar-8',
        'before_widget' => '<div class="description">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
    ) );	
register_sidebar( array(
        'name' => __( 'Socialicons', 'theme-slug' ),
        'id' => 'sidebar-10',
        'before_widget' => '<div class="description">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
    ) );
	
	remove_action('acx_fsmi_icons_option_field','acx_fsmi_social_media_feed_field',700);
	function acx_fsmi_social_media_feed_fields()
	{
		global $acx_si_feed;
		echo "<span class='label' style='width:50%;'>". __('Tumbler:','floating-social-media-icon')."</span>";
		echo "<input type='text' name='acx_si_feed' style='width:49%;' value='".esc_url($acx_si_feed)."'  placeholder='".__('http://www.yourwebsite.com/feed','floating-social-media-icon')."'>";
		echo "<span class='acx_fsmi_q_sep'></span>";
	}
	add_action( 'acx_fsmi_icons_option_field','acx_fsmi_social_media_feed_fields', 700 );
	
	
	function renew_password( $atts ) 
	{
		$username = $_GET['username'];
		if( !empty($username ) )
		{
			global $wpdb, $wp_hasher;
			if( isset( $_POST['submit'] ) )
			{
				$user_pass = $_POST['reset_new_password'];
				if( empty( $user_pass ) )
				{
					echo "Please Enter New Password!";
				}else{
					$usernames = $_POST['username'];
					$wpdb->get_results('update wp_3081323q7w_users set user_pass="'.wp_hash_password($user_pass).'" where user_login="'.$usernames.'" or user_email="'.$usernames.'"');
					$url = 'https://onlineadspaces.com/log-in';
					wp_redirect( $url );
				}
			}
			?>
			<div class="koi_v">
			<form action="" method="post" name="new">
				<label>New Password</label>
				<input type="text" name="reset_new_password" value="" id="new_passwords">
				<input type="hidden" name="username" value="<?php echo $username; ?>" id="username">
				<button name="submit">Reset</button>
			</form>
			</div> 
			<?php 
		}
	}
	add_shortcode( 'new_password', 'renew_password' );
	
	add_filter('retrieve_password_message', 'wpse103299_reset_msg', 10, 2);
	function wpse103299_reset_msg($message, $key, $user_login)
	{
	 // the $message below is taken exactly from wp-login.php
		$message = __('Someone has requested a password reset for the following account:') . "\r\n\r\n";
		$message .= network_home_url( '/' ) . "\r\n\r\n";
		$message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
		$message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
		$message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
		$message .= '<' . network_site_url("new-password?action=rp&key=$key&username=" . rawurlencode($user_login), 'login') . ">\r\n";
		return $message;
	}
	
	
	add_filter('wppb_login_form_bottom', 'add_forgot_password_link', 20);
	function add_forgot_password_link()
	{
		$forgot  = '<p>';
		$forgot  .= '<a href="'.site_url().'/forgot-password">Lost Your Password ?</a>';
		$forgot  .= '</p>';
		return $forgot;
	}
	
	function xyz_filter_wp_mail_from($email){
		return "contact@onlineadspaces.com";
	}
	add_filter("wp_mail_from", "xyz_filter_wp_mail_from");
	function xyz_filter_wp_mail_from_name($from_name){
		return "Onlineadspaces";
	}
	add_filter("wp_mail_from_name", "xyz_filter_wp_mail_from_name");
	
	function authorNotification($post_id) {
		$post = get_post($post_id);
		$author = get_userdata($post->post_author);

		$message = "
			Hi ".$author->display_name.",
			Your ad, ".$post->post_title." has just been published at ".get_permalink( $post_id ).". Well done!";
		wp_mail($author->user_email, "Your ad is online", $message);
	}
	add_action('publish_post', 'authorNotification');	
	
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer ";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );