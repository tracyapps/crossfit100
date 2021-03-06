<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="content">
 * @package cf100
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,700|Roboto:300,900,300italic,900italic,500,500italic' rel='stylesheet' type='text/css'>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
	$(document).ready(function() {
		$("#successTabs .tabs li a").click(function(){ 
			var id = $(this).attr("data-href"); 
			$("#successTabs .tabcontents > div").hide();
			$(id).show();
			
			return false;
		}) 
		$("#trainersTabs .tabs li a").click(function(){ 
			var id = $(this).attr("data-href"); 
			$("#trainersTabs .tabcontents > div").hide();
			$(id).show();
			
			return false;
		}) 
	});
	$(".tabbthat a").click(function(event){
	  event.preventDefault();
	});
	$(".ui-tabs-anchor").click(function(event){
		event.preventDefault();
	});
	</script>
	<style type="text/css">
		#successTabs {
			height:620px!important;
		} 
	</style>
<?php wp_head(); ?>
	<script>
		//fb audience pixel
		(function() {
			var _fbq = window._fbq || (window._fbq = []);
			if (!_fbq.loaded) {
				var fbds = document.createElement('script');
				fbds.async = true;
				fbds.src = '//connect.facebook.net/en_US/fbds.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(fbds, s);
				_fbq.loaded = true;
			}
			_fbq.push(['addPixelId', '1591063397808993']);
		})();
		window._fbq = window._fbq || [];
		window._fbq.push(['track', 'PixelInitialized', {}]);
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1591063397808993&amp;ev=PixelInitialized" /></noscript>
</head>

<body <?php body_class(); ?>>
<div id="top" class="hfeed site">
<?php if( is_front_page() ) { //only load the sticky header on the home page ?>
	<div id="stickyHeaderContainer">
		<div id="headerSlideContent" class="container">
			<div class="smallerLogo">
				<div class="bull"></div>
				<a href="/#top"><h1 class="site-title word_split"><?php bloginfo( 'name' ); ?></h1></a>
			</div>
			<nav id="site-navigation-sticky" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'cf100' ); ?></h1>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu'  ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!--/headerSlideContent-->
	</div><!--/stickyHeaderContainer-->
<?php } //end if is front page  ?>
	<?php do_action( 'before' ); ?>
	<header id="mainHeader" class="site-header">
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="site-title word_split"><?php bloginfo( 'name' ); ?></h1></a>
			<div class="bull"></div>
		</div>
		<div class="header-contact-info">
			<address>
				4927 N Lydell Ave<br />
				Glendale, WI 53217
			</address>
			414-313-1427
		</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'cf100' ); ?></h1>
				<?php if ( is_front_page() ) {
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
				} else {
					wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'nav-menu' ) );
				}
				?>
			</nav><!-- #site-navigation -->
	</header><!-- #mainHeader -->

	<div id="content" class="site-content">
