<?php /* Template Name: Shop Template */
 get_header(); ?>
<style>
.main_wrapper {
    float: left;
    width: 100%;
    margin-top: 30px;
}
.left {
    float: left;
    width: 27%;
}
.leftinner {
  border: 1px solid rgb(204, 204, 204);
  float: left;
  padding: 20px;
  width: 100%;
}
.left h3{
	margin-bottom:30px;
}
.right {
    float: right;
    width: 70%;
    margin-left: 10px;	
}
.rightinner {
  border: 1px solid rgb(204, 204, 204);
  float: left;
  padding: 10px;
  width: 100%;
}
.right .main {
  float: left;
  margin-bottom: 10px;
  padding: 0;
  width: 100%;
}
.right .main:last-child {
  margin-bottom: 0;
}
.category-posts {
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.15);
  float: left;
  padding: 10px;
  width: 100%;
}
/*11-2-17*/
.right .category-posts .img {
  border: 1px solid rgb(204, 204, 204);
  float: left;
  padding: 7px;
  transition: all 1s ease 0s;
  width: 25%;
}
.right .category-posts .img:hover {
  padding: 0;
}
.right .category-posts .img img {
  float: left;
  height: auto;
  width: 100%;
}
.right .category-posts .inner_right {
  float: left;
  padding: 0 0 0 10px;
  width: 75%;
}
.right h2, .left h2 {
  background: rgb(251, 109, 11) none repeat scroll 0 0;
  color: rgb(255, 255, 255);
  float: left;
  font-size: 20px;
  padding: 10px;
  margin-bottom: 20px;
  text-decoration: none;
  width: 100%;
}
.right .category-posts .inner_right h3 a {
  border-bottom: 1px solid rgb(204, 204, 204);
  color: rgb(69, 69, 69);
  float: left;
  font-size: 18px;
  padding: 10px 0;
  text-decoration: none;
}
.right .category-posts .inner_right h3 {
  padding: 0 5px;
}
.right .category-posts .inner_right p {
  color: rgb(82, 82, 82);
  float: left;
  font-size: 14px;
  margin: 5px 0 0;
  padding: 0 10px;
  width: 100%;
}
.right nav {
  float: left;
  padding: 10px;
  width: 100%;
}
.right nav a {
  border: 1px solid rgb(251, 109, 11);
  color: rgb(251, 109, 11);
  display: inline-block;
  font-size: 14px;
  padding: 4px 10px;
  text-align: center;
  text-decoration: none;
}
.right nav a:hover {
  background: rgb(251, 109, 11) none repeat scroll 0 0;
  color: rgb(255, 255, 255);
}
.ve-cat-widget-div ul.ve-cat-widget-listing li a {
  text-decoration: none;
}
.ve-cat-widget-listing {
  float: left;
  margin-bottom: 15px;
  position: relative;
  width: 100%;
}
.left .leftinner h3 {
  border-bottom: 1px solid rgb(204, 204, 204);
  float: left;
  margin: 15px 0;
  padding-bottom: 15px;
  width: 100%;
}
.left .leftinner span {
  float: left;
  margin: 5px 0;
  width: 100%;
}
.left .leftinner span input[type="checkbox"] {
  margin-right: 5px;
}
/*11.2.17 end*/
</style>
	
	<script>
		jQuery(document).ready(function(){
			jQuery('.ad_type').change(function(){
				/*====adtype=====*/
				var finals = '';
				$('#ad_type:checked').each(function(){        
					var values = $(this).val();
					finals += "'"+values+"', ";
				});
				var ad = finals.slice(",",-2);
				/*====marketing p=====*/
				var web 	= $('#w_ad_type:checked').val();
				var blog 	= $('#b_ad_type:checked').val();
				var social 	= $('#s_ad_type:checked').val();
				var apps 	= $('#a_ad_type:checked').val();
				/*===Catering==*/
				var cats = '';
				$('#cat:checked').each(function(){        
					var values = $(this).val();
					cats += "'"+values+"', ";
				});
				var cat = cats.slice(",",-2);
				/*==For ads======*/
				var id = '';
				$('.get_post_id').each(function(){
					var values = $(this).val();
					id += "'"+values+"', ";
				});
				var postID = id.slice(",",-2);
				/*==For ads======*/	
				if($(".sell").prop('checked') == true){
					var selling = $('.sell').attr('data-id');
				}else{
					var selling = '';
				}
				
				if($(".buy").prop('checked') == true){
					var buying = $('.buy').attr('data-id');
				}else{
					var buying = '';
				}
				
				
				var path = '<?php echo get_stylesheet_directory_uri(); ?>/ajax.php';
				jQuery.ajax({
					type: "POST",
                    url: path,
                    data: {ad:ad, postID:postID, selling:selling, buying:buying, web:web, blog:blog, social:social, apps:apps, cat:cat},
					success: function(result){
						console.log(result);
						if( result != "" )
						{
							jQuery('.rightinners').show();
							jQuery('.rightinners').html(result);
							jQuery('.rightinner').hide();
						}else{
							jQuery('.rightinner').show();
							jQuery('.rightinners').hide();
						}
					}
				});
			});
			
		});
	</script>
	<div id="wrapper">
		<?php sb_view_breadcrumb(); ?>
		<div class="main_wrapper">
			<div class="left">
			<h2>Categories</h2>
			<div class="leftinner">			
				<?php //dynamic_sidebar('Category'); 
				/*=======Get All selling posts=========*/
				$sel = $wpdb->get_results("SELECT post_id FROM `wp_3081323q7w_postmeta` WHERE `meta_key` = 'ad' AND `meta_value` = 'selling'");
				foreach( $sel as $selling ){
					$sellings .= "'".$selling->post_id."', ";
				}				
				$sell = rtrim( $sellings, ', ');
				/*=======Get All buying posts=========*/
				$bu = $wpdb->get_results("SELECT post_id FROM `wp_3081323q7w_postmeta` WHERE `meta_key` = 'ad' AND `meta_value` = 'buying'");
				foreach( $bu as $buying ){
					$buyings .= "'".$buying->post_id."', ";
				}				
				$buy = rtrim( $buyings, ', ');
				
				$current_cats = $_SERVER['REQUEST_URI'];
				$ex = explode('-', $current_cats);
				$current_cat = $ex[2];
				?>
				
					<div class="type_ad">	
						<h3>Type of Ad</h3>
						<span><input type="checkbox" name="ad_type[]" id="ad_type" <?php if($current_cat == 'sell/' ){echo "checked";}else{echo'';} ?> class="ad_type sell" data-id="<?php echo $sell;?>" value="selling">Selling Online Ad Space</span>
						<span><input type="checkbox" name="ad_type[]" id="ad_type" <?php if($current_cat == 'buy/' ){echo "checked";}else{echo '';}?> class="ad_type buy" data-id="<?php echo $buy;?>"  value="buying">Buying Online Ad Space</span>
					</div>
					<div class="marketing_ad">
						<h3>Marketing Platform</h3>
						<span><input type="checkbox" name="marketing_ad_type[]" id="w_ad_type" class="ad_type" value="website">Website</span>
						<span><input type="checkbox" name="marketing_ad_type[]" id="b_ad_type" class="ad_type" value="blog">Blog</span>
						<span><input type="checkbox" name="marketing_ad_type[]" id="s_ad_type" class="ad_type" value="social_media">Social Media</span>
						<span><input type="checkbox" name="marketing_ad_type[]" id="a_ad_type" class="ad_type" value="apps">Apps</span>
					</div>
					<div class="categories">
						<h3>Categories</h3>
						<?php 
							$args = array(
								'type'                 	   => 'post',
								'child_of'                 => 0,
								'parent'                   => '',
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => 0,
								'hierarchical'             => 1,
								'taxonomy'                 => 'category',
								'pad_counts'               => false 
							); 
							$categories = get_categories( $args ); 
							foreach ($categories as $category) {
								$option = '<span><input type="checkbox" name="post_cat[]" id="cat" class="cat_type ad_type" value="'.$category->term_id.'">'.$category->cat_name.'</span>';
								echo $option;
							}
						?>
					</div>
				</div>
			</div>
			
			<div class="right">
			<h2>Ads Listing</h2>
			<div class="rightinner">
				<?php 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$the_query = $wp_query->query( 'post_type=post&posts_per_page=10&paged=' . $paged ); 
					
					foreach( $the_query as $the_querys )
					{ ?>
						<div class="main">
							<div class="category-posts">
								<div class="img">
									<?php if(!empty(get_the_post_thumbnail( $the_querys->ID, 'thumbnail' ))){ ?>
									<a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail( $the_querys->ID, 'thumbnail' ); ?></a>
									<?php }else{ ?>
										<a href="<?php echo get_permalink();?>"><img src="<?php echo site_url(); ?>/wp-content/plugins/carousel-horizontal-posts-content-slider/assets/images/default-image.jpg"></a>
									<?php } ?>
								</div>
								<div class="inner_right">
									<h3><a href="<?php echo get_permalink();?>"><?php echo $the_querys->post_title;?></a></h3>
									<p><?php echo strip_tags(substr( $the_querys->post_content, 0, 100 ));?></p>
								</div>
							</div>
						</div>
						
					<?php }
				?>
				
				<!-- pagination -->
				<?php if( $wp_query->max_num_pages > 1 ){ ?>
						<nav>
							<?php previous_posts_link('&laquo; Older',$wp_query->max_num_pages); ?>
							<?php next_posts_link('Newer &raquo;',$wp_query->max_num_pages); ?>
						</nav>
					<?php }
					?>
			</div>
			<div class="rightinners" style="display:none;"></div>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>
