<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
    <title><?php
        if ( is_single() ) {
			single_post_title(); echo ' | '; bloginfo('name');
		} elseif ( is_home() || is_front_page() ) {
			bloginfo('name'); echo ' | '; bloginfo('description'); theme_the_page_number();
		} elseif ( is_page() ) {
			single_post_title(''); echo ' | '; bloginfo('name');
		} elseif ( is_search() ) {
			printf(__('Search results for "%s"', 'theme'), esc_html($s)); theme_the_page_number(); echo ' | '; bloginfo('name'); 
		} elseif ( is_404() ) {
			_e('Not Found', 'theme'); echo ' | '; bloginfo('name');
		} else {
			wp_title(''); echo ' | '; bloginfo('name'); theme_the_page_number();
		}
    ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="site-title"><span><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></div>
		<?php if( is_home() || is_front_page() ) : ?>
		<h1 id="site-description"><?php bloginfo( 'description' ); ?></h1>
		<?php else : ?>
		<div id="site-description"><?php bloginfo( 'description' ); ?></div>
		<?php endif; ?>				
		
		<div id="access">
			<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'theme' ); ?>"><?php _e( 'Skip to content', 'theme' ); ?></a></div>
			<?php wp_nav_menu( 'sort_column=menu_order&container_class=menu-header' ); ?>
		</div><!-- #access -->
	</div><!-- #header -->
