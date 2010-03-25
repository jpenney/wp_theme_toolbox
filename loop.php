<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&larr;</span> Older posts', 'theme' )); ?></div>
		<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'theme' )); ?></div>
	</div><!-- #nav-above -->
<?php endif; ?>

<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'theme' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested Archive. Perhaps searching will help find a related post.', 'theme' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__('Permalink to %s', 'theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<div class="entry-meta">
			<?php
				printf(__( '<span class="meta-prep meta-prep-author">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a> <span class="meta-sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s">%6$s</a></span>', 'theme'),
					get_permalink(),
					esc_attr( get_the_time() ),
					get_the_date(),
					get_author_posts_url( get_the_author_meta('ID') ),
					sprintf( esc_attr__( 'View all posts by %s', 'theme' ), get_the_author() ),
					get_the_author()
				);
			?>
		</div><!-- .entry-meta -->

	<?php if ( is_archive() || is_search() ) : //Only display Excerpts for archives & search ?>
		<div class="entry-summary">
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'theme' ) ); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue&nbsp;reading&nbsp;<span class="meta-nav">&rarr;</span>', 'theme' ) ); ?>
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'theme' ) . '&after=</div>'); ?>
		</div><!-- .entry-content -->
	<?php endif; ?>

		<div class="entry-utility">
			<span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php echo theme_cat_list(); ?></span></span>
			<span class="meta-sep"> | </span>
			<?php $tags_text = theme_tag_list(); ?>
			<?php if ( !empty($tags_text) ) : ?>
			<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links"><?php echo $tags_text; ?></span></span>
			<span class="meta-sep"> | </span>
			<?php endif; //$tags_text ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'theme' ), __( '1 Comment', 'theme' ), __( '% Comments', 'theme' ) ); ?></span>
			<?php edit_post_link( __( 'Edit', 'theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ); ?>
		</div><!-- #entry-utility -->
	</div><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&larr;</span> Older posts', 'theme' )); ?></div>
					<div class="nav-next"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'theme' )); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>