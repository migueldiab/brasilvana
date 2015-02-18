<?php
/**
 * @package Brand New Day
 */

require_once ( get_template_directory() . '/theme-options.php' );

add_action( 'wp_enqueue_scripts', 'bnd_print_styles' );

function bnd_print_styles() {

	$options = get_option('brandnewday_theme_options');

	$bnd_themestyle = $options['themestyle'];
	$bnd_customcss = $options['customcss'];

	if ( file_exists( get_template_directory() . '/nightlight.css' ) && 'nightlight' == $bnd_themestyle ) {
		wp_register_style( 'bnd_nightlight', get_template_directory_uri() . '/nightlight.css' );
		wp_enqueue_style( 'bnd_nightlight' );
	} else if ( file_exists( get_template_directory() . '/winterlight.css' ) && 'winterlight' == $bnd_themestyle ) {
		wp_register_style( 'bnd_winterlight', get_template_directory_uri() . '/winterlight.css' );
		wp_enqueue_style( 'bnd_winterlight' );
	} else if ( file_exists( get_template_directory() . '/autumnlight.css' ) && 'autumnlight' == $bnd_themestyle ) {
		wp_register_style( 'bnd_autumnlight', get_template_directory_uri() . '/autumnlight.css' );
		wp_enqueue_style( 'bnd_autumnlight' );
	} else if ( file_exists( get_template_directory() . '/daylight.css' ) ){
		wp_register_style( 'bnd_daylight', get_template_directory_uri() . '/daylight.css' );
		wp_enqueue_style( 'bnd_daylight' );
	}

	if ( $bnd_customcss ) {
		echo "<style type='text/css'>";
		echo $bnd_customcss;
		echo "</style>";
	}

}

add_action( 'widgets_init', 'bnd_sidebars' );

function bnd_sidebars() {

	register_sidebar( array(
		'id' => 'vertical-sidebar',
		'name' => __( 'Vertical Sidebar', 'brand-new-day' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
		) );

	register_sidebar( array(
		'id' => 'footer-sidebar1',
		'name' => __( 'Footer Sidebar 1', 'brand-new-day' ),
		'before_widget' => '<li id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="footer-widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'id' => 'footer-sidebar2',
		'name' => __( 'Footer Sidebar 2', 'brand-new-day' ),
		'before_widget' => '<li id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="footer-widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'id' => 'footer-sidebar3',
		'name' => __( 'Footer Sidebar 3', 'brand-new-day' ),
		'before_widget' => '<li id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="footer-widgettitle">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'id' => 'footer-sidebar4',
		'name' => __( 'Footer Sidebar 4', 'brand-new-day' ),
		'before_widget' => '<li id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="footer-widgettitle">',
		'after_title' => '</h3>',
	) );
}

function bnd_theme_setup() {

	if ( ! isset( $content_width ) ) $content_width = 630;

	add_theme_support('automatic-feed-links');

	add_editor_style();

	load_theme_textdomain( 'brand-new-day', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) ) {
		require_once( $locale_file );
	}

}

add_action( 'after_setup_theme', 'bnd_theme_setup' );

// Add .navmenu class to custom menu widget
function bnd_nav_menu_args( $args ) {
        $args['container_class'] = 'navmenu';
        return $args;
}
add_filter( 'wp_nav_menu_args', 'bnd_nav_menu_args' );

?>