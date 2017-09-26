<?php
/**
 * Lv1080: Customizer
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lv1080_customize_register( $wp_customize ) {
	/**
	 * Theme options.
	 */
	$wp_customize->add_panel( 'theme_options', array(
		'title'    => __( 'Theme Options', 'lv1080' ),
		'priority' => 130, // Before Additional CSS.
	) );
	$wp_customize->add_section( 'lv1080_info', array(
		'title'    => __( 'Thông tin liên hệ', 'lv1080' ),
		'priority' => 1,
		'panel'	=> 'theme_options'
	) );
	// custom email
	$wp_customize->add_setting( 'lv1080_email', array(
		'default'           => 'lv1080@gmail.com',
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_control( 'lv1080_email', array(
		'label'       => __( 'Email', 'lv1080' ),
		'section'     => 'lv1080_info',
		'type'        => 'text',
		// 'description' => __( 'Display email on top navigation.', 'lv1080' )
	) );

	// custom hotline
	$wp_customize->add_setting( 'lv1080_phonenumber', array(
		'default'           => '0988552424',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'lv1080_phonenumber', array(
		'label'       => __( 'Hotline', 'lv1080' ),
		'section'     => 'lv1080_info',
		'type'        => 'text',
		// 'description' => __( 'Display phonenumber on top navigation.', 'lv1080' )
	) );

	// custom social
	$wp_customize->add_section( 'lv1080_social', array(
		'title'    => __( 'Liên kết mạng xã hội', 'lv1080' ),
		'priority' => 1,
		'panel'	=> 'theme_options'
	) );
	$wp_customize->add_setting( 'lv1080_facebook', array(
		'default'           => '#',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_setting( 'lv1080_googleplus', array(
		'default'           => '#',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_setting( 'lv1080_youtube', array(
		'default'           => '#',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'lv1080_facebook', array(
		'label'       => __( 'Facebook:', 'lv1080' ),
		'section'     => 'lv1080_social',
		'type'        => 'text',
		'description' => __( 'Tùy chỉnh các đường dẫn mạng xã hội phổ biến.', 'lv1080' )
	) );
	$wp_customize->add_control( 'lv1080_googleplus', array(
		'label'       => __( 'Google +:', 'lv1080' ),
		'section'     => 'lv1080_social',
		'type'        => 'text'
	) );
	$wp_customize->add_control( 'lv1080_youtube', array(
		'label'       => __( 'Youtube:', 'lv1080' ),
		'section'     => 'lv1080_social',
		'type'        => 'text'
	) );


	/**
	 * Filter number of front page sections in Lv1080
	 *
	 * @since lv1080 1.0
	 *
	 */
	$wp_customize->add_section( 'panel_core', array(
		'title'    => __( 'Section giá trị cốt lõi', 'lv1080' ),
		'priority' => 2,
		'panel'	=> 'theme_options'
	) );
	$wp_customize->add_setting( 'panel_core_title', array(
		'default'           => 'Viết thuê luận văn thạc sỹ số 1 VN',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'panel_core_title', array(
		'label'          => __( 'Tiêu đề section giá trị cốt lõi', 'lv1080' ),
		'section'        => 'panel_core',
		'type'           => 'text'
	) );

	$wp_customize->add_section( 'panel_service', array(
		'title'    => __( 'Section dịch vụ', 'lv1080' ),
		'priority' => 2,
		'panel'	=> 'theme_options'
	) );
	$wp_customize->add_setting( 'panel_service_title', array(
		'default'           => 'Các dịch vụ thuê viết luận văn',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'panel_service_title', array(
		'label'          => __( 'Tiêu đề section dịch vụ', 'lv1080' ),
		'section'        => 'panel_service',
		'type'           => 'text'
	) );

	$wp_customize->add_section( 'home_contact', array(
		'title'    => __( 'Form liên hệ', 'lv1080' ),
		'priority' => 1,
		'panel'	=> 'theme_options'
	) );
	// custom email
	$wp_customize->add_setting( 'home_contact_title', array(
		'default'           => 'Gửi thông tin cho chúng tôi',
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_control( 'home_contact_title', array(
		'label'       => __( 'Tiêu đề form', 'lv1080' ),
		'section'     => 'home_contact',
		'type'        => 'text',
		// 'description' => __( 'Display email on top navigation.', 'lv1080' )
	) );
	// custom email
	$wp_customize->add_setting( 'home_contact_form', array(
		'default'           => '[contact-form-7 id="62"]',
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_control( 'home_contact_form', array(
		'label'       => __( 'contact-form-7 shortcode', 'lv1080' ),
		'section'     => 'home_contact',
		'type'        => 'text',
		// 'description' => __( 'Display email on top navigation.', 'lv1080' )
	) );

	$wp_customize->add_section( 'panel_type', array(
		'title'    => __( 'Section các loại luận văn đồ án', 'lv1080' ),
		'priority' => 4,
		'panel'	=> 'theme_options'
	) );
	$wp_customize->add_setting( 'panel_type_title', array(
		'default'           => 'Các loại luận văn đồ án',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'panel_type_title', array(
		'label'          => sprintf( __( 'Tiêu đề section các loại luận văn', 'lv1080' )),
		'section'        => 'panel_type',
		'type'           => 'text'
	) );
}
add_action( 'customize_register', 'lv1080_customize_register' );


function lv1080_get_categories() {
	$cats = get_categories();
	$result = array(0=>'-- Chọn --');
	foreach ($cats as $cat) {
		$result[$cat->term_id] = $cat->name;
	}
	return $result;
}
/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function lv1080_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function lv1080_customize_preview_js() {
	wp_enqueue_script( 'lv1080-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'lv1080_customize_preview_js' );
