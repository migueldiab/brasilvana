<?php
/**
 * @package Enterprise
 */
?>
<?php get_header(); ?>

<div id="content">

	<div id="content-left">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div <?php post_class(); ?>>

				<div class="entry">

					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

					<div class="post-info">
						<p>
							<span class="time"><?php the_time( get_option( 'date_format' ) ); ?></span>
							<?php if ( is_multi_author() && ! is_author() ) { ?>
								<span class="author"><?php _e( 'by', 'enterprise' ); ?> <?php the_author_posts_link(); ?></span>
							<?php } ?>
							<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
								<span class="post-comments"><?php comments_popup_link( __( 'Leave a comment', 'enterprise' ), __( '1 Comment', 'enterprise' ), __( '% Comments', 'enterprise' ) ); ?></span>
							<?php endif; ?>
							<?php edit_post_link( __( '(Edit)', 'enterprise' ), '', '' ); ?>
						</p>
					</div>

					<?php the_content( __( 'Read more of this post', 'enterprise' ) );?><div class="clear"></div>

				</div>

				<div class="post-meta">
					<p>
						<span class="categories"><?php _e( 'Filed under', 'enterprise' ); ?> <?php the_category( ', ' ) ?></span>
						<?php the_tags( '<span class="tags">' . __( 'Tagged with', 'enterprise' ) . ' ', ', ', '</span>' ) ?>
					</p>
				</div>

			</div>

		<?php endwhile; else: ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.', 'enterprise' ); ?></p><?php endif; ?>
		
		<div class="navlink">
			<div class="nav-previous"><p><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'enterprise' ) ); ?></p></div>
			<div class="nav-next"><p><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'enterprise' ) ); ?></p></div>
		</div>

	</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>