    <form id="searchform" name="searchform" method="get" action="<?php echo home_url(); ?>">
		<div>
			<label for="s"><?php _e( 'Search', 'themename' ); ?></label>
			<input type="search" id="s" name="s" />
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'themename' ); ?>" />
		</div>
    </form>