<?php
/**
 * Custom header implementation
 *
 * @link http:/goki.vn/Custom_Headers
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 */
function lv1080_custom_header_setup() {

	/**
	 * Filter Lv1080 custom-header support arguments.
	 *
	 * @since Lv1080 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image     		Default image of the header.
	 *     @type string $default_text_color     Default color of the header text.
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 *     @type string $flex-height     		Flex support for height of header.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'lv1080_custom_header_args', array(
		'default-image'      => get_parent_theme_file_uri( '/assets/images/slider-1.jpg' ),
		'width'              => 1600,
		'height'             => 530,
		'flex-height'        => false,
		'video'              => false,
		'wp-head-callback'   => '',
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/slider-1.jpg',
			'thumbnail_url' => '%s/assets/images/slider-1.jpg',
			'description'   => __( 'Default Header Slider', 'lv1080' ),
		),
	) );
}
add_action( 'after_setup_theme', 'lv1080_custom_header_setup' );