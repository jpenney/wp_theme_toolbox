<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

<?php get_header(); ?>

		<div id="primary">
			<div id="content">

<?php the_post(); ?>

<?php if ( is_day() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Daily Archives: <span>%s</span>', 'theme' ), get_the_date() ); ?></h1>
<?php elseif ( is_month() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Monthly Archives: <span>%s</span>', 'theme' ), get_the_date('F Y') ); ?></h1>
<?php elseif ( is_year() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Yearly Archives: <span>%s</span>', 'theme' ), get_the_date('Y') ); ?></h1>
<?php else : ?>
				<h1 class="page-title"><?php _e( 'Blog Archives', 'theme' ); ?></h1>
<?php endif; ?>

<?php rewind_posts(); ?>

<?php get_template_part( 'loop', 'archive' ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
