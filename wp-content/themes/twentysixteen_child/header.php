<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/style2.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<?php wp_head(); ?>
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/dist/css/lightbox.min.css" rel = "stylesheet">
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/lightbox-plus-jquery.min.js"></script>
    
<style>
.foot_nav li a{text-transform:uppercase;}
.contact_form{width:750px; margin: 0px auto;}
.home_ads_slide{border:none;}
.wrapper_new{width:1366px;}
.chpcs_foo_content p {
font-weight: normal;
font-style: normal;
height: auto;
overflow: hidden;
margin-bottom: 6px;
font-size: 16px;
margin-top: 3px;
display: inline-block;
min-height: 44px;
}
.termandcondition p{margin-bottom:20px;}
.web_text{display:none;}
.blog_text{display:none;}
.social_text{display:none;}
.app_text{display:none;}
ul.wpuf-form li.web_text .wpuf-fields {
    float: right;
}
ul.wpuf-form li.blog_text .wpuf-fields {
    float: right;
}
ul.wpuf-form li.social_text .wpuf-fields {
    float: right;
}
ul.wpuf-form li.app_text .wpuf-fields {
    float: right;
}
.contactinfo p{
    font-size: 22px;
    background: #fa6c0b;
    padding: 15px 12px;
    text-align: center;
}
.contactinfo p strong {
    border-right: 1px solid #fff;
    margin-right: 14px;
    padding: 0px !important;
    color: #fff;
}
.contactinfo strong:last-child { border-right:0px; margin-right:0px;}
.thnk p {
    font-size: 22px;
    color: #0c0000;
    text-align: center;
    font-weight: 400;
    font-style: normal;
}
.page-id-453 article, .page-id-451 article {
    width: 500px;
    margin: 0px auto 40px;
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 28px 18px;
    box-shadow: 0 0 black;
    background: #fcfeff;
}
.page-id-451 article ul {
    margin-top: 25px;
}
.page-id-451 article li label {
    font-size: 14px;
}
.page-id-451 article p {
	text-align:center;
}
.koi_v input[type="text"] {
    width: 71%;
    margin-left: 15px;
    padding: 8px 5px;
}
.page-id-451 input[type="text"] {
    width: 69%;
    margin-left: 15px;
    padding: 8px 5px;
}
.koi_v button {
    float: right;
    font-size: 18px;
    line-height: 22px;
    margin-top: 13px;
    font-weight: 600;
    background: url(https://onlineadspaces.com/wp-content/themes/twentysixteen_child/images/reg_bg.jpg) repeat-y;
    box-shadow: 0px 10px 17px 1px #ffe6c4;
    -webkit-box-shadow: 0px 10px 17px 1px #ffe6c4;
    -moz-box-shadow: 0px 10px 17px 1px #ffe6c4;
    color: #ffffff;
    padding: 7px 0px 8px;
    border-radius: 5px !important;
    width: 120px;
    cursor: pointer;
    border: 0px;
}
.page-id-451 input[type="submit"] {
    float: right;
    font-size: 18px;
    line-height: 22px;
    margin-top: 13px;
    font-weight: 600;
    background: url(https://onlineadspaces.com/wp-content/themes/twentysixteen_child/images/reg_bg.jpg) repeat;
    box-shadow: 0px 10px 17px 1px #ffe6c4;
    -webkit-box-shadow: 0px 10px 17px 1px #ffe6c4;
    -moz-box-shadow: 0px 10px 17px 1px #ffe6c4;
    color: #ffffff;
    padding: 7px 8px 8px;
    border-radius: 5px !important;
    width: auto;
    cursor: pointer;
    border: 0px;
    background-size: cover;
}
/*----01-03-2017---*/
#header #wrapper .logo {
  width: 210px;
}
#header #wrapper {
  padding: 0 40px 0 20px;
  width: 100%;
}
@font-face {
  font-family: 'FranklinGothic-DemiCond';
  src: url('https://onlineadspaces.com/wp-content/themes/twentysixteen_child/fonts/FranklinGothic-DemiCond.eot?#iefix') format('embedded-opentype'),  url('https://onlineadspaces.com/wp-content/themes/twentysixteen_child/fonts/FranklinGothic-DemiCond.woff') format('woff'), url('https://onlineadspaces.com/wp-content/themes/twentysixteen_child/fonts/FranklinGothic-DemiCond.ttf')  format('truetype'), url('https://onlineadspaces.com/wp-content/themes/twentysixteen_child/fonts/FranklinGothic-DemiCond.svg#FranklinGothic-DemiCond') format('svg');
  font-weight: normal;
  font-style: normal;
}
#header #right_head li {
  line-height: 30px;
}
#header #right_head li a {
  background-size: cover;
  width: 135px;
}
#content .home_sec2 {
  background: #00a8ef none repeat scroll 0 0;
  padding-top:25px;
  padding-bottom:20px;
  margin-top:15px;
}
#content .home_sec2_left ul li a {
  color: #ffffff;
}
#content .home_sec2 .home_sec2_left h2.head {
  color: #ffffff;
  font-size: 30px;
  font-weight: 500;
  margin-bottom: 19px;
  position: relative;
  text-align: center;
}
#content .home_sec2 .home_sec2_left h2.head::after {
  background: #ffffff none repeat scroll 0 0;
}
#content .home_sec2_left ul {
  border-top: 1px solid #009ddf;
}
#header #right_head {
 margin-top: 38px;
}

#header .tagline {
  font-family: FranklinGothic-DemiCond;
  font-size: 37px;
  margin-left: 45px;
  margin-top: 44px;
  font-weight:normal;
}
div#footer {
 margin-top: 0;
}
#content .home_ads_slide {
 margin: 18px 0 0;
  padding: 0;
  width: 100%;
}
/*----08-03-2017---*/
.head::after {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
}
.home_ads_slide .chpcs_foo_content > p {
  font-size: 15px;
  margin-bottom: 11px;
}
.home_ads_slide .chpcs_title {
  display: inline;
}
.home_ads_slide .chpcs_title > a {
  font-size: 23px;
  color: #000000;
}
.home_ads_slide .chpcs_more > a {
    font-size: 14px;
    background: #00a8ef;
    padding: 8px;
    color: #fff !important;
    text-decoration: none;
    border-radius: 5px;
}
.home_slide {
 margin-top: 15px;
}
.home_slide h2.head {
  margin-bottom: 0 !important;
}
#header #wrapper .logo, .tagline_head, .navbar-wrap {
  display: inline-block;
}
.navbar-wrap {
  float:right;
}
#header #wrapper .logo{
	width:16%;
}
.tagline_head{
	width:60%;
}
.navbar-wrap {
	width:24%;
}
#header .tagline {
    font-family: FranklinGothic-DemiCond;
    font-size: 37px;
    margin-left: 15px;
    margin-top: 44px;
    font-weight: normal;
	float:none;
	text-align:center;
}
.chpcs_image_carousel {
 padding: 15px 10px 0 10px;
}
@media screen and (min-width:1400px){
	#header #wrapper{
		width:1408px;
	}
}
@media screen and (max-width:1310px){
#header #right_head li a {
   width: 110px;
}	
}
@media screen and (max-width:1225px){
#header #right_head li a {
 width: 110px;
}	
}
@media screen and (max-width:1199px){
#wrapper {
 width: 970px;
 margin:0 auto;
}
#header #wrapper {
 width: 970px;
 margin:0 auto;
 padding:0;
}
#header .tagline {
  font-size: 29px;
  margin-left: 29px;
}
#header #right_head li a {
  width: 100px;
}
#header #right_head li {
  line-height: 20px;
}
#header #right_head {
  margin-top: 35px;
}
#header .tagline {
  margin-top: 38px;
}	
}
@media screen and (max-width:991px){
 #header #wrapper {
 width: 750px;
 margin:0 auto;
 padding:0;
}
 #wrapper {
 width: 750px;
 margin:0 auto;
}	
#header #wrapper .logo {
  text-align: center;
  width: 100%;
}
#header .logo img {
  width: 200px !important;
}
#header .tagline {
 margin-top:14px;
  margin-left: 15px;
}
#header #right_head {
  display: inline-block;
  float: none;
  margin-top: 10px;
}
.tagline_head{
	width:auto;
}
.navbar-wrap {
	width:auto;
}
}
@media screen and (max-width:767px){
#header #wrapper {
 width: 96%;
 margin:0 auto;
 padding:0;
}
 #wrapper {
 width: 96%;
 margin:0 auto;
}
#header .tagline {
 margin-left: 0;
  text-align: center;
  width: 100%;
   
}
#header .navbar-wrap {
  display: inline-block;
  text-align: center;
  width: 100%;
}
#header  #right_head {
  float: none;
  margin-top:20px;
}
#right_head li {
  display: inline-block;
  float: none;
}
.home_sec2_left ul li {
 width: 50%;
}
#header .slide .inner_slide {
 width: 100%;
}
#header .inner_slide ul li a {
 float: none;
  margin: auto 0;
  display: inline-block;
  
}
#header .inner_slide ul li {
  float: none;
  display: inline-block;
  width: 100%;
  text-align: center;
  margin-bottom:20px;
}
#content .home_ads_slide {
  margin: 0 !important;
  padding: 0 !important;
}
#header .tagline {
 margin-top: 0;
}
#header .slide .inner_slide .in_slide {
 padding: 30px;
}
.tagline_head{
	width:100%;
}	
}
@media screen and (max-width:480px){
#header .slide .inner_slide .in_slide {
 padding: 23px 15px !important;
}	
.home_sec2_left ul li {
 width: 100%;
}
#header .inner_slide ul li a {
  width:100%;
}
}
/*----01-03-2017--end-*/
</style>
</head>
 

<body <?php body_class(); ?>>
<?php if(is_user_logged_in()){?>
	<div class="my_account">
		<?php echo wp_nav_menu( array( 'menu' => 'myaccountmenu') );?>
	</div>
<?php } ?>
<!--header start-->
	<div id="header">
    	<div id="wrapper">
        	<div class="logo">
            	<?php lm_display_logo(); ?>
			</div>
            
			<?php dynamic_sidebar('Top Header'); ?>
            <div class="navbar-wrap">
			<?php echo wp_nav_menu( array( 'menu' => 'topmenu', 'id' => 'right_head','container' => '', 'items_wrap' => '<ul id="right_head" class="%2$s">%3$s</ul>') );?>
        </div>
		</div>
        
		<?php if( is_front_page()){?>
        <div class="slide">
            <div class="inner_slide">
            	<div class="in_slide">
					<?php dynamic_sidebar('Banner Header');?>
                	<?php echo wp_nav_menu( array( 'menu' => 'bannermenu', 'id' => 'right_head','container' => '', 'items_wrap' => '<ul class="%2$s">%3$s</ul>') );?>
					<?php dynamic_sidebar('Banner Header1');?>
                </div>
            </div>
    	</div>
		<?php } ?>
    </div>
<!--header end-->    

		<div id="content">
        
        <?php if(!is_front_page()) { ?>
        	<header class="entry-header">
            	<h2 class="entry-title"><?php the_title(); ?></h2>
        	</header>
		<?php } ?>
			