<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php
	// Returns the title based on the type of page being viewed
		if ( is_single() ) {
			single_post_title(); echo ' | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); 
			if( get_bloginfo( 'description' ) ) 
				echo ' | ' ; bloginfo( 'description' ); 
			toolbox_the_page_number();
		} elseif ( is_page() ) {
			single_post_title( '' ); echo ' | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			printf( __( 'Search results for "%s"', 'theme' ), get_search_query() ); toolbox_the_page_number(); echo ' | '; bloginfo( 'name' );
		} elseif ( is_404() ) {
			_e( 'Not Found', 'theme' ); echo ' | '; bloginfo( 'name' );
		} else {
			wp_title( '' ); echo ' | '; bloginfo( 'name' ); toolbox_the_page_number();
		}
	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding">
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>			
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
	</header><!-- #branding -->
	
	<nav id="access">
		<h1 class="screen-reader-text"><?php _e( 'Main menu', 'theme' ); ?></h1>
		<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'theme' ); ?>"><?php _e( 'Skip to content', 'theme' ); ?></a></div>
		
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	</nav><!-- #access -->
	
	<div id="main">