<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<div id="footer">
    	<div id="wrapper">
        	<div class="social">
				<?php dynamic_sidebar('socialicons'); ?>
				<?php //if (function_exists("DISPLAY_ACURAX_ICONS")) { DISPLAY_ACURAX_ICONS(); } ?>
            </div>
			
			<div class="foot_nav">
				<?php echo wp_nav_menu( array( 'menu' => 'footermenu', 'container' => '', 'items_wrap' => '<ul id="" class="%2$s">%3$s</ul>') );?>
            </div>
            
        </div>
        
		<?php dynamic_sidebar('Footer'); ?>
    </div>
<script>
	jQuery(document).ready(function(){
		jQuery('.wpuf_wesite_330').click(function(){
			jQuery('.web_text').toggle();
		});
		jQuery('.wpuf_blog_330').click(function(){
			jQuery('.blog_text').toggle();
		});
		jQuery('.wpuf_social_media_330').click(function(){
			jQuery('.social_text').toggle();
		});
		jQuery('.wpuf_app_330').click(function(){
			jQuery('.app_text').toggle();
		});
	});
</script>
<?php wp_footer(); ?>

</body>
</html>
