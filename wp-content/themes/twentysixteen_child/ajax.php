<?php
	require_once('../../../wp-load.php');
	$ad 	= stripslashes( $_POST['ad'] );
	$postID = stripslashes( $_POST['postID'] );
	$web 	= stripslashes( $_POST['web'] );
	$blog 	= stripslashes( $_POST['blog'] );
	$social = stripslashes( $_POST['social'] );
	$apps 	= stripslashes( $_POST['apps'] );
	$cat 	= stripslashes( $_POST['cat'] );
	
	$selling 	= stripslashes( $_POST['selling'] );
	$buying 	= stripslashes( $_POST['buying'] );
	
	
	/*===	
	SELECT DISTINCT(`post_id`) FROM `wp_3081323q7w_postmeta` WHERE meta_key='ad' and meta_value IN ('selling') union SELECT  DISTINCT(`post_id`) FROM `wp_3081323q7w_postmeta` WHERE meta_key='website_url' and meta_value !='' 
	===*/
	
	$sql = "SELECT ";
	$from = "";
	$query = "";
	$dist =  "";
	
	if( $ad != "" ){
		$dist  .= "DISTINCT(i.post_id)";
		$from .= "wp_3081323q7w_postmeta i";
		$query .= "i.`meta_key` ='ad' AND i.`meta_value` IN ($ad)";
	}
	if( $web != "" ){
		
		if($ad!=''){
			$dist  .= ", (u.post_id)";
			$from .= ", wp_3081323q7w_postmeta u";
			$query .= "and u.`meta_key` ='website_url' AND u.`meta_value` != '' and u.post_id IN ($selling,$buying)"; 
		}else if( $blog !='' || $social !='' || $apps !='' ){
			$dist  .= ", (u.post_id)";
			$from .= ", wp_3081323q7w_postmeta u";
			$query .= "and u.`meta_key` ='website_url' AND u.`meta_value` != ''"; 
		}else{
			$dist  .= "DISTINCT(u.post_id)";
			$from .= "wp_3081323q7w_postmeta u";
			$query .= "u.`meta_key` ='website_url' AND u.`meta_value` != ''"; 
		}
	}
	if( $blog != "" ){
		
		if($ad!=''){
			$dist  .= ", (a.post_id)";
			$from .= ", wp_3081323q7w_postmeta a";
			$query .= "and a.`meta_key` ='blog_url' AND a.`meta_value` != '' and a.post_id IN ($postID)";
		}else if( $web!='' || $social !='' || $apps !='' ){
			$dist  .= ", (a.post_id)";
			$from .= ", wp_3081323q7w_postmeta a";
			$query .= "and a.`meta_key` ='blog_url' AND a.`meta_value` != ''";
		}else{
			$dist  .= "DISTINCT(a.post_id)";
			$from .= "wp_3081323q7w_postmeta a";
			$query .= "a.`meta_key` ='blog_url' AND a.`meta_value` != ''";
		}
	}
	if( $social != "" ){
		
		if($ad!=''){
			$dist  .= ", (b.post_id)";
			$from .= ", wp_3081323q7w_postmeta b";
			$query .= "and b.`meta_key` ='website_url' AND b.`meta_value` != '' and b.post_id IN ($postID)"; 
		}else if( $web!='' || $blog !='' || $apps !='' ){
			$dist  .= ", (b.post_id)";
			$from .= ", wp_3081323q7w_postmeta b";
			$query .= "and b.`meta_key` ='social' AND b.`meta_value` != ''";
		}else{
			$dist  .= "DISTINCT(b.post_id)";
			$from .= "wp_3081323q7w_postmeta b";
			$query .= "b.`meta_key` ='social' AND b.`meta_value` != ''";
		}
	}
	if( $apps != "" ){
		
		if($ad!=''){
			$dist  .= ", (c.post_id)";
			$from .= ", wp_3081323q7w_postmeta c";
			$query .= "and c.`meta_key` ='apps' AND c.`meta_value` != '' and c.post_id IN ($postID)"; 
		}else if( $web!='' || $blog !='' || $social !='' ){
			$dist  .= ", (c.post_id)";
			$from .= ", wp_3081323q7w_postmeta c";
			$query .= "and c.`meta_key` ='apps' AND c.`meta_value` != ''";
		}else{
			$dist  .= "DISTINCT(c.post_id)";
			$from .= "wp_3081323q7w_postmeta c";
			$query .= "c.`meta_key` ='apps' AND c.`meta_value` != ''";
		}
	}
	if( $cat != "" ){
		
		if( $web!='' || $blog !='' || $social !='' || $ad !='' || $apps !='' ){
			$dist  .= ", (rl.object_id)";
			$from .= ", wp_3081323q7w_term_relationships rl";
			$query .= "and rl.`term_taxonomy_id` IN($cat)";
		}else{
			$dist  .= "DISTINCT(rl.object_id)";
			$from .= "wp_3081323q7w_term_relationships rl";
			$query .= "rl.`term_taxonomy_id` IN($cat)";
		}
	}
	
	$r = $wpdb->get_results($sql.' '.$dist.' from '.$from.' where '.$query , ARRAY_N );
		

/* SELECT * FROM `wp_3081323q7w_postmeta` a,`wp_3081323q7w_postmeta` e WHERE a.meta_key='ad' and a.meta_value='selling' and e.meta_key='website_url' and e.meta_value !='' and e.post_id IN (361,348) */

	
	if( !empty( $ad ) || !empty( $web ) || !empty( $blog )|| !empty( $social )|| !empty( $apps )|| !empty( $cat ) )
	{
		if( !empty($r) )
		{
			/* echo "<pre>";print_R($r); */
			/* $rd = array_unique($r);
			echo "<pre>";print_R($rd); */
			
        foreach($r as $user) {
		
            $states[] = $user[0]; // Grabing their state from their profile page
        }
        $states = array_unique($states);
			foreach( $states as $display )
			{
				
				$post = get_post( $display ); 
				if( $post->post_status == 'publish' )
				{
				?>
					<div class="main">
						<div class="category-posts">
							<div class="img">
								<?php if(!empty(get_the_post_thumbnail( $post->ID, 'thumbnail' ))){ ?>
									<a href="<?php echo get_permalink();?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?></a>
								<?php }else{ ?>
									<a href="<?php echo get_permalink();?>"><img src="<?php echo site_url(); ?>/wp-content/plugins/carousel-horizontal-posts-content-slider/assets/images/default-image.jpg"></a>
								<?php } ?>
							</div>
							<div class="inner_right">
								<h3><a href="<?php echo get_permalink();?>"><?php echo $post->post_title;?></a></h3>
								<p><?php echo strip_tags(substr( $post->post_content, 0, 100 ));?></p>
							</div>
							</div>
						</div>
						<?php if( !empty( $ad )){?>
						<input type="hidden" name="post_id" class="get_post_id" value="<?php echo $post->ID;?>">
						<?php } ?>
					</div>
				<?php 
				}
			}
		}else{
			echo "No Ads Found!";
		}
	}
 ?>