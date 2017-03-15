<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

            <div class="home_slide">
			<div id="wrapper_new"> 
            	<h2 class="head">Newest Ads</h2>
                <div class="home_ads_slide">
					<?php  //dynamic_sidebar('content bottom 1'); ?>
					<?php echo do_shortcode('[carousel-horizontal-posts-content-slider]'); ?>
                </div>
            </div>
			</div>
            
            <div class="home_sec2">
			
            	<div class="home_sec2_left">
                	<h2 class="head">Categories</h2>
					
					<ul>
					<?php
						$categories = get_categories( array(
							'hide_empty' => 0,
							'orderby' => 'name',
							'order'   => 'ASC'
						) );
						 
						foreach( $categories as $category ) {
							$category_link = sprintf( 
								'<li><a href="%1$s" alt="%2$s">%3$s</a></li>',
								esc_url( get_category_link( $category->term_id ) ),
								esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
								esc_html( $category->name )
							);
							 
							echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link );
						}
					?>	
                                            
                    </ul>
	
                </div>
                
            
            
            
        </div>
<?php get_footer(); ?>
