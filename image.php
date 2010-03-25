<?php get_header(); ?>

		<div id="container">
			<div id="content">

<?php the_post(); ?>

				<p class="page-title"><a href="<?php echo get_permalink($post->post_parent); ?>" title="<?php printf( esc_attr__( 'Return to %s', 'theme' ), esc_html( get_the_title($post->post_parent), 1 ) ); ?>" rel="gallery">&larr; <?php echo get_the_title($post->post_parent); ?></a></p>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><?php the_title(); ?></h2>

					<div class="entry-meta">
						<?php
							printf(__( '<span class="meta-prep meta-prep-author"> By </span> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>', 'theme'),
								get_author_posts_url( get_the_author_meta('ID') ),
								sprintf( esc_attr__( 'View all posts by %s', 'theme' ), get_the_author() ),
								get_the_author()
							);
						?>
						<span class="meta-sep"> | </span>
						<?php
							printf( __( '<span class="meta-prep meta-prep-entry-date">Posted on </span> <span class="entry-date"><a class="published" title="%1$s" href="%2$s">%3$s</a></span>', 'theme'),
								esc_attr(get_the_time()),
								wp_get_attachment_url(),
								get_the_date()
							);
						?>
						<?php edit_post_link( __( 'Edit', 'theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ); ?>
					</div><!-- .entry-meta -->

					<div class="entry-content">
						<div class="entry-attachment">
							<p class="attachment">
								<a href="<?php echo theme_get_next_attachment_url(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="attachment">
									<?php echo wp_get_attachment_image( $post->ID, array( theme_attachment_width(), theme_attachment_width() ) );?>
								</a>
							</p>
	
							<div id="nav-below" class="navigation">
								<div class="nav-previous"><?php previous_image_link( false ); ?></div> 
								<div class="nav-next"><?php next_image_link( false ); ?></div>
							</div><!-- #nav-below -->
						</div><!-- .entry-attachment -->
						<?php if ( !empty($post->post_excerpt) ) : ?>
						<div class="entry-caption"><?php the_excerpt(); ?></div>
						<?php endif; ?>

<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'theme' )  ); ?>
<?php wp_link_pages( 'before=<div class="page-link">' . __( 'Pages:', 'theme' ) . '&after=</div>' ); ?>

					</div><!-- .entry-content -->

					<div class="entry-utility">
					<?php
						$tag_list = get_the_tag_list();
						if ( '' != $tag_list ) {
							$utility_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'theme' );
						} else {
							$utility_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'theme' );
						}
						printf( 
							$utility_text,
							get_the_category_list(', '),
							$tag_list,
							get_permalink(),
							the_title_attribute('echo=0'),
							get_post_comments_feed_link() 
						); 
					?>

<?php if ( comments_open() && pings_open() ) : // Comments and trackbacks open ?>
						<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'theme' ), get_trackback_url() ); ?>
<?php elseif ( !comments_open() && pings_open() ) : // Only trackbacks open ?>
						<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'theme' ), get_trackback_url() ); ?>
<?php elseif ( comments_open() && !pings_open() ) : // Only comments open ?>
						<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'theme' ); ?>
<?php elseif ( !comments_open() && !pings_open() ) : // Comments and trackbacks closed ?>
						<?php _e( 'Both comments and trackbacks are currently closed.', 'theme' ); ?>
<?php endif; ?>
<?php edit_post_link( __( 'Edit', 'theme' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ); ?>
					</div><!-- .entry-utility -->
				</div><!-- #post-<?php the_ID(); ?> -->

<?php comments_template(); ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>