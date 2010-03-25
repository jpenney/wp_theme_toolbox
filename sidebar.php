<?php if ( is_active_sidebar('primary-widget-area') ) : // Nothing here by default and design ?>
		<div id="sidebar" class="widget-area">
			<ul class="xoxo">
			<?php dynamic_sidebar('primary-widget-area'); ?>
			</ul>
		</div><!-- #primary .widget-area -->
<?php endif; ?>