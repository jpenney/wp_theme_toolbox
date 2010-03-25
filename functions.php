<?php

// Set an attachment width for photo galleries
if ( ! function_exists( 'theme_attachment_width' ) ) :
function theme_attachment_width() {
	return '960';
}
endif;

// Get the URL of the next image in the gallery
if ( ! function_exists( 'theme_get_next_attachment_url' ) ) :
function theme_get_next_attachment_url() {
	global $post;
	$post = get_post($post);
	$attachments = array_values(get_children( array('post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') ));
 
	foreach ( $attachments as $k => $attachment )
		if ( $attachment->ID == $post->ID )
			break;

		$k = $k + 1;
  
		if ( isset($attachments[$k]) ) {
			return get_attachment_link($attachments[$k]->ID);		
		} else {
			return get_permalink($post->post_parent);
		}
}
endif;

// Set the content width based on the Theme CSS
if ( ! isset( $content_width ) )
	$content_width = 640;

if ( ! function_exists( 'theme_init' ) ) :
function theme_init() {
	// This theme uses wp_nav_menu()
	add_theme_support( 'nav-menus' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'theme', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}
endif;
add_action( 'after_setup_theme', 'theme_init' );

// Get the page number
if ( ! function_exists( 'theme_get_page_number' ) ) :
function theme_get_page_number() {
	if ( get_query_var('paged') )
		return ' | ' . __( 'Page ' , 'theme') . get_query_var('paged');
}
endif;

// Echo the page number
if ( ! function_exists( 'theme_the_page_number' ) ) :
function theme_the_page_number() {
	echo theme_get_page_number();
}
endif;

// Control excerpt length
if ( ! function_exists( 'theme_excerpt_length' ) ) :
function theme_excerpt_length( $length ) {
	return 40;
}
endif;
add_filter( 'excerpt_length', 'theme_excerpt_length' );

// Make a nice read more link on excerpts
if ( ! function_exists( 'theme_excerpt_more' ) ) :
function theme_excerpt_more($more) {
	return '&nbsp;&hellip; <a href="'. get_permalink() . '">' . 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>' . '</a>';
}
endif;
add_filter( 'excerpt_more', 'theme_excerpt_more' );

if ( ! function_exists( 'theme_cat_list' ) ) :
function theme_cat_list() {
	return theme_term_list('category', ', ', __('Posted in %s', 'theme'), __('Also posted in %s', 'theme') );
}
endif;

if ( ! function_exists( 'theme_tag_list' ) ) :
function theme_tag_list() {
	return theme_term_list('post_tag', ', ', __('Tagged %s', 'theme'), __('Also tagged %s', 'theme') );
}
endif;

if ( ! function_exists( 'theme_term_list' ) ) :
function theme_term_list($taxonomy, $glue = ', ', $text = '', $also_text = '') {
	global $wp_query, $post;
	$current_term = $wp_query->get_queried_object();
	$terms = wp_get_object_terms($post->ID, $taxonomy);
	// If we're viewing a Taxonomy page.. 
	if ( isset($current_term->taxonomy) && $taxonomy == $current_term->taxonomy ) {
		// Remove the term from display.
		foreach ( (array)$terms as $key => $term ) {
			if ( $term->term_id == $current_term->term_id ) {
				unset($terms[$key]);
				break;
			}
		}
		// Change to Also text as we've now removed something from the terms list.
		$text = $also_text;
	}
	$tlist = array();
	$rel = 'category' == $taxonomy ? 'rel="category"' : 'rel="tag"';
	foreach ( (array)$terms as $term ) {
		$tlist[] = '<a href="' . get_term_link( $term, $taxonomy ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s', 'theme' ), $term->name ) ) . '" ' . $rel . '>' . $term->name . '</a>';
	}
	if ( !empty($tlist) )
		return sprintf($text, join($glue, $tlist));
	return '';
}
endif;

// Register widgetized areas
if ( ! function_exists( 'theme_widgets_init' ) ) :
function theme_widgets_init() {
	$current_theme = get_option( 'template' ); // variable stores the current theme
	$target_theme = 'toolbox'; // variable stores the theme we want to target
	
	global $pagenow;
	
	if ( 'themes.php' == $pagenow ) {
		if ( isset( $_GET['activated'] ) && $current_theme == $target_theme ) {
			
			// Setup some instances of the default widgets:
			update_option( 'widget_search', array( 2 => array( 'title' => '' ), '_multiwidget' => 1 ) );
			update_option( 'widget_archives', array( 2 => array( 'title' => '', 'count' => 0, 'dropdown' => 0 ), '_multiwidget' => 1 ) );
			update_option( 'widget_meta', array( 2 => array( 'title' => '' ), '_multiwidget' => 1 ) );
	
			// Update the sidebars with those widgets
			update_option( 'sidebars_widgets', array(
				'primary-widget-area' => array(
					'search-2',
					'archives-2',
					'meta-2',
				),
			));
		}
	}
	
	register_sidebar( array (
		'name' => 'Primary Widget Area',
		'id' => 'primary-widget-area',
		'description' => __( 'Your site sidebar' , 'theme' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
endif;
add_action( 'init', 'theme_widgets_init' );