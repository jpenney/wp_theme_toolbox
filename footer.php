
	<div id="footer">
		<div id="site-info">
			<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div>

		<div id="site-generator">
			<?php printf( __('Proudly powered by <span id="generator-link">%s</span>.', 'theme'), '<a href="http://wordpress.org/" title="' . esc_attr__( 'A Semantic Personal Publishing Platform', 'theme' ) . '" rel="generator">' . __( 'WordPress', 'theme' ) . '</a>' ); ?>
		</div>
	</div><!-- #footer -->
</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>
