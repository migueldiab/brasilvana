<?php
/**
 * @package WordPress
 * @subpackage Ocean Mist
 */

$content_width = 500;

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '4b5d67',
	'link' => '7f1d1d',
	'border' => 'e7eef6',
	'url' => '526a74',
);

function ocean_mist_body_classes( $classes ) {
	// Remove body classes that conflict with legacy CSS
	$classes = array_merge( array_diff( $classes, array( 'archive', 'page' ) ) );

	return $classes;
}
add_filter( 'body_class', 'ocean_mist_body_classes' );

register_sidebar( array(
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="title"> <h2>',
	'after_title' => '</h2> </div>',
) );

add_theme_support( 'automatic-feed-links' );

function widget_oceanmist_browse() {
?>
	<div class="widget">
	<div class="title"><h2><?php _e('Browse'); ?></h2></div>
		<select name="archivemenu" onchange="document.location.href=this.options[this.selectedIndex].value;">
		<option value=""><?php _e('Monthly Archives'); ?></option>
<?php get_archives('monthly','','option','','',''); ?>
		</select>
<?php get_search_form(); ?>
	</div>
<?php
}

function oceanmist_widgets_init() {
	wp_register_sidebar_widget('oceanmist_browse', __('Ocean Mist Browse'), 'widget_oceanmist_browse');
}
add_action('widgets_init', 'oceanmist_widgets_init');

define('HEADER_TEXTCOLOR', '');
define('HEADER_IMAGE', '%s/images/mainpic01.jpg'); // %s is theme dir uri
define('HEADER_IMAGE_WIDTH', 736);
define('HEADER_IMAGE_HEIGHT', 229);
define( 'NO_HEADER_TEXT', true );

add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

function oceanmist_admin_header_style() {
?>
<style type="text/css">
#headimg {
	background: url(<?php header_image() ?>) no-repeat;
}
#headimg {
	height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg h1, #headimg #desc {
	display: none;
}
</style>
<?php
}
function oceanmist_header_style() {
?>
<style type="text/css">
#mainpic {
	background: url(<?php header_image() ?>) no-repeat;
}
</style>
<?php
}
if ( function_exists('add_custom_image_header') ) {
	add_custom_image_header('oceanmist_header_style', 'oceanmist_admin_header_style');
}

function oceanmist_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
		<li <?php comment_class('archive'); ?> id="comment-<?php comment_ID() ?>">
			    <div class="entry">
				<?php echo get_avatar( $comment, 48 ); ?>
			      <?php comment_text() ?>
				  <ul class="buttons">
				    <li><?php edit_comment_link(__('Edit Comment'),'',''); ?></li>
				  </ul>
		        </div>
			    <div class="postinfo">
				  <p><?php printf(__('By: %1$s on %2$s <br /> at %3$s'), '<strong>'.get_comment_author_link().'</strong>', get_comment_date(), get_comment_time()); ?></p>
				<p><?php echo comment_reply_link(array('depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => '')) ?></p>
			      <p><?php if ($comment->comment_approved == '0') : ?>
				  <em><?php _e('Your comment is awaiting moderation.'); ?></em>
			      <?php endif; ?></p>
			    </div>
<?php }

// Header navigation menu
register_nav_menus( array(
	'primary' => __( 'Primary Navigation' ),
) );

function oceanmist_page_menu() { // fallback for primary navigation ?>
<ul class="pagetabs" id="pagetabs">
	<?php wp_list_pages( 'depth=1&title_li=' ); ?>
</ul>

<?php } ?>
