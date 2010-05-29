<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

	</div><!-- #main -->

	<footer id="colophon">
			<div id="site-info">
				<a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			</div>

			<div id="site-generator">
				<a href="http://wordpress.org/" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'theme' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'theme' ), 'WordPress' ); ?></a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>
