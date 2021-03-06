<?php
/**
 * @package WordPress
 * @subpackage Bueno
 */
/*
Template Name: Full Width
*/
$content_width = 810;
?>

<?php get_header(); ?>

    <div id="content" class="col-full">
		<div id="main" class="fullwidth">

            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>

                <div class="post">

                    <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

                    <div class="entry">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<p class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</p>' ) ); ?>
						<?php edit_post_link( __( 'Edit This', 'woothemes' ), '<p>', '</p>' ); ?>
	               	</div><!-- /.entry -->

                </div><!-- /.post -->

			<?php comments_template('', true); ?>

			<?php endwhile; else: ?>
				<div class="post">
                	<p><?php _e('Sorry, no posts matched your criteria.', 'woothemes') ?></p>
                </div><!-- /.post -->
            <?php endif; ?>

		</div><!-- /#main -->

    </div><!-- /#content -->

<?php get_footer(); ?>