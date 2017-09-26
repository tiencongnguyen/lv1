<?php
/**
 * Lv1080 back compat functionality
 *
 * Prevents Lv1080 from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since Lv1080 1.0
 */

/**
 * Prevent switching to Lv1080 on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Lv1080 1.0
 */
function lv1080_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'lv1080_upgrade_notice' );
}
add_action( 'after_switch_theme', 'lv1080_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Lv1080 on WordPress versions prior to 4.7.
 *
 * @since Lv1080 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lv1080_upgrade_notice() {
	$message = sprintf( __( 'Lv1080 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'lv1080' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Lv1080 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lv1080_customize() {
	wp_die( sprintf( __( 'Lv1080 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'lv1080' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'lv1080_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Lv1080 1.0
 *
 * @global string $wp_version WordPress version.
 */
function lv1080_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Lv1080 requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'lv1080' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'lv1080_preview' );
