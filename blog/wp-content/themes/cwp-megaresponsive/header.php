<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package MegaResponsive Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php wp_head(); ?>    
</head>

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
	
    	<div class="site-branding">
            <?php if ( get_theme_mod( 'megaresponsive_lite_logo' ) ) : ?>
                <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'megaresponsive_lite_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
            <?php else: ?>
			     <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			     <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            <?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary','menu_id' => 'menu-testing-menu' ) ); ?>
		</nav><!-- #site-navigation -->
        
		</div><!-- .container -->
    </header><!-- #masthead -->

	<div id="main" class="site-main">
    	<div class="container">
			