<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width = device-width, initial-scale = 1.0, minimum-scale = 1.0" />
	<title><?php
		global $page, $paged;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s', 'ds-framework' ), max( $paged, $page ) );
	?></title>
	<?php if(get_ds_option('custom_favicon')) { ?>
	<link rel="shortcut icon" href="<?php echo get_ds_option('custom_favicon'); ?>" /> 
	<?php } ?>
	<?php // Facebook stuff ?>
	<?php if(get_ds_option('fb_admin_id')) { ?>
	<meta property="fb:admins" content="<?php echo get_ds_option('fb_admin_id'); ?>" />
	<?php } ?>
	<?php if (is_single()) { ?>
	<meta property="og:url" content="<?php the_permalink() ?>"/>
	<meta property="og:title" content="<?php single_post_title(''); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php if (function_exists('ds_get_og_image')) { echo ds_get_og_image(); }?>" />
	<?php } else { ?>
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta property="og:description" content="José works with video and photography, trying to catch these feelings and using the image as a mirror or as a witness of the experimentation of this labour. He looks for a relationship between the body and the image recorded." />
	<meta property="description" content="José works with video and photography, trying to catch these feelings and using the image as a mirror or as a witness of the experimentation of this labour. He looks for a relationship between the body and the image recorded." />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<?php echo get_ds_option('main_logo'); ?>" /> <?php } ?>
	<?php 
	$ds_gcode = get_ds_option('google_fonts_code');
	if($ds_gcode) {
		echo $ds_gcode;
	}
	?>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<style type="text/css">
		#fb-like-home {
			position: fixed;
			top: 72%;
			overflow: visible
		}
		#twitter-home {
			position: fixed;
			top: 72%;
			overflow: visible;
			left: 120px;
		}
	</style>

<?php wp_head(); ?>
</head>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=164012860327465";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<body <?php body_class(); ?> style="">
<div id="main-wrap">
<div id="page" class="hfeed site">
	<?php global $data; ?>
	<header class="main-header">
		<section class="top-logo-group">
			<h1 class="logo">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php 
					$logo = get_ds_option( 'main_logo' );
					if( $logo ) {
						echo '<img alt="' . __( 'home', 'dsframework' ) . '" src="' . $logo . '" />';
					} else {
						echo get_bloginfo( 'name' );
					} 
					?>
				</a>
			</h1>
			<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		</section>
		<div class="menus-container">
			<span class="menu-sep">&mdash;</span>
			<nav id="main-menu" class="menu">
			<?php 
			if ( has_nav_menu( 'primary' ) ) {
				
				echo wp_nav_menu( array( 
					'theme_location' => 'primary',
					'container'      => false,
					'container_class' => 'menu-header',
					'menu_class' => false,
					'echo' => false
				)); 
				
			} else { 
			?>
				<p><?php _e('Primary menu is not selected and/or created. Please go to "Appearance &rarr; Menus" and setup menu.' ,'dsframework'); ?></p>
			<?php } ?>
			</nav>
			<span class="menu-sep">&mdash;</span>
			<?php if ( has_nav_menu( 'social' ) ) { ?>
				<nav class="social-menu menu">
					<?php
					echo wp_nav_menu( array( 
						'theme_location' => 'social',
						'container'      => false,
						'container_class' => '',
						'menu_class' => false
					));
					?>
				</nav>
			<?php }	?>
		</div>

<div id='fb-like-home' class="fb-like" data-href="http://josephart.me/" data-width="The pixel width of the plugin" data-height="The pixel height of the plugin" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
<div id='twitter-home'>
<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://josephart.me" data-text="Check out this site made of Visual arts, Photography and Films: ">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
 </div>

	</header>
	<div id="main">