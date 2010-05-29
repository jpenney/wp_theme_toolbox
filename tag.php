<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * @subpackage Toolbox
 */
?>

<?php get_header(); ?>

		<div id="container">
			<div id="content">

<?php the_post(); ?>

				<h1 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'theme' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>

<?php rewind_posts(); ?>

<?php get_template_part( 'loop', 'tag' ); ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
