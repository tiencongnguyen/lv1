<?php
/**
 * Lv1080 functions and definitions
 *
 * @link https://lv1080.com
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 */

/**
 * Lv1080 only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Cài đặt các tính năng mặc định
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lv1080_setup() {
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'lv1080' );

	/*
	 * Điều chỉnh thẻ title theo tiêu đề bài viết.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*remove default size*/
	function lv1080_remove_default_image_sizes( $sizes) {
	    unset( $sizes['thumbnail']);
	    unset( $sizes['medium']);
	    unset( $sizes['large']);
	     
	    return $sizes;
	}
	add_filter('intermediate_image_sizes_advanced', 'lv1080_remove_default_image_sizes');

	add_image_size( 'lv1080-thumbnail-image', 220, 220, true );
	add_image_size( 'lv1080-thumbnail-sidebar', 90, 90, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'lv1080' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
	) );

	// Tùy chỉnh logo
	add_theme_support( 'custom-logo', array(
		'width'       => 136,
		'height'      => 67,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', lv1080_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
        'service catetory' => array ('posts_by_category_widget', array(
      		'title' => _x('Dịch vụ', 'Theme starter content', 'lv1080'),
      		'cat' => 0,
      		'num' => 5,
      		'thumb' => false
        )),
        'posts_by_category' => array ('posts_by_category_widget', array(
      		'title' => _x('Bài hướng dẫn', 'Theme starter content', 'lv1080'),
      		'cat' => 0,
      		'num' => 5,
      		'thumb' => true
        )),
        'posts_by_category' => array ('posts_by_category_widget', array(
      		'title' => _x('Bài viết mới', 'Theme starter content', 'lv1080'),
      		'cat' => 0,
      		'num' => 5,
      		'thumb' => true
        ))
			),
			'footer-info' => array(
        'lv1080_info' => array ('text', array(
      		'title' => _x('Thông tin công ty', 'Theme starter content', 'lv1080'),
      		'text' => _x('<p>Chúng tôi là tập hợp những chuyên gia, giảng viên giỏi, nhà nghiên cứu, những sinh viên tốt nghiệp khá giỏi trở lên… Tất cả chúng tôi đều có chung một đam mê, đó là nghiên cứu khoa học</p>', 'Theme starter content', 'lv1080'),
        	'filter' => true,
					'visual' => true,
				))
			),
			'footer-1' => array(
        'news' => array ('text', array(
      		'title' => _x('Liên hệ với chúng tôi', 'Theme starter content', 'lv1080'),
      		'text' => _x('<ul class="contact-list list-default"> <li class="phone">0946 88 33 50</li> <li class="envelope">ttcd.group@gmail.com</li> <li class="skype">ttcd.group</li> <li class="address">Hà Nội: Tô Hiệu, quận Cầu Giấy, HN</li> <li class="address">TP.HCM: KĐT Nam Cường, Cổ Nhuế, HN</li> </ul>', 'Theme starter content', 'lv1080'),
      		'filter' => true,
					'visual' => true,
        ))
      ),
			'footer-2' => array(
        'lv1080_tag' => array ('text', array(
      		'title' => _x('Dịch vụ', 'Theme starter content', 'lv1080'),
      		'text' => _x('<ul class="link-list list-default"> <li><a class="text-black" href="#">Tư vấn luận văn</a></li> <li><a class="text-black" href="#">Viết báo cáo, khóa luận tốt nghiệp</a></li> <li><a class="text-black" href="#">Viết luận văn cao học, thạc sĩ</a></li> <li><a class="text-black" href="#">Chắp bút luận văn tiến sĩ</a></li> </ul>', 'Theme starter content', 'lv1080'),
      		'filter' => true,
					'visual' => true,
          ))
      ),
			'footer-3' => array(
          'brands' => array ('text', array(
        		'title' => _x('Tin tức', 'Theme starter content', 'lv1080'),
        		'text' => _x('<ul class="link-list list-default"> <li><a class="text-black" href="#">Tư vấn luận văn</a></li> <li><a class="text-black" href="#">Viết báo cáo, khóa luận tốt nghiệp</a></li> <li><a class="text-black" href="#">Viết luận văn cao học, thạc sĩ</a></li> <li><a class="text-black" href="#">Chắp bút luận văn tiến sĩ</a></li> </ul>', 'Theme starter content', 'lv1080'),
        		'filter' => true,
						'visual' => true, 
          ))
      ),
			'footer-bottom' => array(
          'lv1080_info' => array ('text', array(
        		'title' => _x('Thông tin trang', 'Theme starter content', 'lv1080'),
        		'text' => _x('©2010 Bản quyền thuộc về nhóm luận văn 1080', 'Theme starter content', 'lv1080'), 
        		'filter' => true,
						'visual' => true,
				))
			),

			// Add the core-defined widget to the section-header.
			'section-header' => array(
				'lv1080_header_1' => array( 'text', array(
					'title' => _x( 'header image 1', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="slider-caption text-center"><h2 class="text-uppercase">Dịch vụ tư vấn luận văn</h2> <p class="font-16">Chọn đề tài, tìm hướng nghiên cứu miễn phí với đội ngũ chuyên gia hơn 10 năm kinh nghiệm chúng tôi  sẽ tư vấn chuyên sâu về đề tài, luận án... đảm bảo hài lòng 100</p></div><img src="%1s" alt="">', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/slider-1.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_header_2' => array( 'text', array(
					'title' => _x( 'header image 2', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="slider-caption text-center"><h2 class="text-uppercase">Dịch vụ tư vấn luận văn</h2> <p class="font-16">Chọn đề tài, tìm hướng nghiên cứu miễn phí với đội ngũ chuyên gia hơn 10 năm kinh nghiệm chúng tôi  sẽ tư vấn chuyên sâu về đề tài, luận án... đảm bảo hài lòng 100</p></div><img src="%1s" alt="">', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/slider-2.jpg')),
					'filter' => true,
					'visual' => true,
				) )
			),

			// Add the core-defined widget to the section-core.
			'section-banner' => array(
				'lv1080_banner_1' => array( 'text', array(
					'title' => _x( 'banner 1', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="col-sm-4 col-md-12"><div class="banner-post mb-2"><a class="banner-post__img aspect-ratio background-opacity" href="#"><h4 class="text-center text-uppercase">luận văn 1080 là ai?</h4><img src="%1s" alt=""></a></div></div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/banner-post-1.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_banner_2' => array( 'text', array(
					'title' => _x( 'banner 2', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="col-sm-4 col-md-12"><div class="banner-post mb-2"><a class="banner-post__img aspect-ratio background-opacity" href="#"><h4 class="text-center text-uppercase">Cam kết của chúng tôi</h4><img src="%1s" alt=""></a></div></div>>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/banner-post-2.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_banner_3' => array( 'text', array(
					'title' => _x( 'banner 3', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="col-sm-4 col-md-12"><div class="banner-post mb-2"><a class="banner-post__img aspect-ratio background-opacity" href="#"><h4 class="text-center text-uppercase">Như thế nào là 1 bài luận văn chuẩn</h4><img src="%1s" alt=""></a></div></div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/banner-post-3.jpg')),
					'filter' => true,
					'visual' => true,
				) )
			),

			// Add the core-defined widget to the section-services.
			'section-service-left' => array (
				'lv1080_service_left' => array( 'text', array (
					'title' => _x( 'Dịch vụ chính - bên trái', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="thumb-big"> <a class="aspect-ratio" href="#"> <img src="%1s" alt=""> </a> </div> <div class="post-info"> <h3><a class="text-black" href="#">Dịch vụ nhận viết đồ án, làm thuê đồ án tốt nghiệp uy tín toàn quốc</a></h3> <p>Nhóm chúng tôi chuyên nhận làm thuê slide PowerPoint uy tín và chất lượng nhất. Bạn đang rất nản chí với các bài thuyết trình bằng PowerPoint? Bạn muốn có một bài thuyết trình PowerPoint cực kỳ ấn tượng và đẹp mắt nhưng lại chưa có đủ khả năng để làm như thế? Thời gian hạn hẹp do vừa học vừa làm nên bạn không thể đầu tư kỹ lưỡng cho bài thuyết trình PowerPoint?</p> </div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/1.jpg')),
				),
				'filter' => true,
				'visual' => true
			)),
			'section-service-right' => array(
				'lv1080_service_right_1' => array( 'text', array(
					'title' => _x( 'Dịch vụ phải 1', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="media-left"> <a class="aspect-ratio" href="#"><img class="media-object" src="%1s" alt=""></a> </div> <div class="media-body"> <h4 class="media-heading"><a class="text-black" href="#">Dịch vụ làm thuê slide PowerPoint chất lượng hoàn hảo trên toàn quốc</a></h4> <span>Nhóm chúng tôi chuyên nhận làm thuê slide PowerPoint uy tín và chất lượng nhất. Bạn đang rất nản chí với các bài thuyết trình bằng PowerPoint?</span> </div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/our-service-1.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_service_right_2' => array( 'text', array(
					'title' => _x( 'Dịch vụ phải 2', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="media-left"> <a class="aspect-ratio" href="#"><img class="media-object" src="%1s" alt=""></a> </div> <div class="media-body"> <h4 class="media-heading"><a class="text-black" href="#">Viết thuê luận văn thạc sỹ, cao học</a></h4> <span>Nhóm chúng tôi chuyên nhận làm thuê slide PowerPoint uy tín và chất lượng nhất. Bạn đang rất nản chí với các bài thuyết trình bằng PowerPoint?</span> </div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/our-service-2.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_service_right_3' => array( 'text', array(
					'title' => _x( 'Dịch vụ phải 3', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="media-left"> <a class="aspect-ratio" href="#"><img class="media-object" src="%1s" alt=""></a> </div> <div class="media-body"> <h4 class="media-heading"><a class="text-black" href="#">Viết báo cáo các khóa luận tốt nghiệp</a></h4> <span>Nhóm chúng tôi chuyên nhận làm thuê slide PowerPoint uy tín và chất lượng nhất. Bạn đang rất nản chí với các bài thuyết trình bằng PowerPoint?</span> </div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/temp/our-service-3.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
			),

			// Add the core-defined widget to the section-about.
			'section-faq' => array(
				'lv1080_faq' => array( 'text', array(
					'title' => _x( 'về chúng tôi', 'Theme starter content', 'lv1080' ),
					'text' => _x( '[lv1080_accordion][faq id="1" title="Như thế nào là một bài luận văn chuẩn?"]Luận Văn 1080 sẽ đồng hành cùng bạn để từng bước khắc phục những rắc rối xảy ra trong quá trình thực hiện luận văn tốt nghiệp, làm báo cáo nghiên cứu cho doanh nghiệp….[/faq][faq id="2" title="Như thế nào là phân tích nhân tố khám phá efa trong spss?"] Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam sequi ut iure, soluta vero quasi assumenda harum molestiae aspernatur amet. Eum aut aliquid molestias, quisquam doloribus a reiciendis odit deserunt. [/faq][faq id="3" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, ipsa. "] Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error odit ducimus rerum architecto est vel, culpa quod ipsa voluptatibus hic provident magni nam, sunt veritatis perferendis iste sint inventore molestiae. [/faq][/lv1080_accordion]', 'Theme starter content', 'lv1080' ),
					'filter' => true,
					'visual' => true,
				) )
			),

			// Add the core-defined customer's comment widget to the section-why.
			'section-why-left' => array(
				'lv1080_why_left_1' => array( 'text', array(
					'title' => _x( 'Vì sao 1', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="media-left"> <img class="media-object" src="%1s" alt=""> </div> <div class="media-body"> <h4 class="media-heading font-16 text-uppercase">Chất lượng hoàn hảo</h4> <span>Với dịch vụ viết luận văn chuyên nghiệp, uy tín của đội ngũ giảng viên hùng hậu, không có khó khăn trở ngại nào có thể làm bạn áp lực, hoang mang thêm nữa.</span> </div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/thumbs-up.png')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_why_left_2' => array( 'text', array(
					'title' => _x( 'Vì sao 2', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="media-left"> <img class="media-object" src="%1s" alt=""> </div> <div class="media-body"> <h4 class="media-heading font-16 text-uppercase">Bàn giao đúng tiến độ</h4> <span>Với dịch vụ viết luận văn chuyên nghiệp, uy tín của đội ngũ giảng viên hùng hậu, không có khó khăn trở ngại nào có thể làm bạn áp lực, hoang mang thêm nữa.</span> </div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/calendar-ok.png')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_why_left_3' => array( 'text', array(
					'title' => _x( 'Vì sao 3', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="media-left"> <img class="media-object" src="%1s" alt=""> </div> <div class="media-body"> <h4 class="media-heading font-16 text-uppercase">Đảm bảo thông tin khách hàng</h4> <span>Với dịch vụ viết luận văn chuyên nghiệp, uy tín của đội ngũ giảng viên hùng hậu, không có khó khăn trở ngại nào có thể làm bạn áp lực, hoang mang thêm nữa.</span> </div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/protection.png')),
					'filter' => true,
					'visual' => true,
				) ),
			),
			'section-why-right' => array (
				'lv1080_why_right_1' => array( 'text', array (
					'title' => _x( 'Video', 'Theme starter content', 'lv1080' ),
					'text' => _x( '<iframe width="100%" height="450" src="https://www.youtube.com/embed/cFJHV2LbQvU" frameborder="0" allowfullscreen></iframe>', 'Theme starter content', 'lv1080' ),
				),
				'filter' => true,
				'visual' => true
			)),

			// Add the core-defined customer's comment widget to the section-comment.
			'section-comment' => array(
				'lv1080_comment_1' => array( 'text', array(
					'title' => _x( 'Cảm nhận khách hàng', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="people-comment"> “ Vướng đi làm không có thời gian để đi thực tập, thiết nghĩ đi thực tập cũng chỉ làm các việc vặt mất thời gian nên mình tìm hiểu dịch vụ thực tập. Khi đăng ký ở đây ấn tượng nhất là anh chị rất nhiệt tình, hướng dẫn làm bài rất chu đáo. Bài báo cáo thực tập mình làm rất tốt nên đạt điểm rất cao, mình rất vui. ” </div><div class="group-peole-info"><div class="people-avatar"><img src="%1s" alt=""></div><div class="people-name text-uppercase">Trần Hùng Dũng</div><div class="people-job">- Luật sư -</div></div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/user.png')),
					'filter' => true,
					'visual' => true,
				) )
			),

			// Add the core-defined widget to the section-type.
			'section-type' => array(
				'lv1080_type_1' => array( 'text', array(
					'title' => _x( 'TÀI CHÍNH KẾ TOÁN', 'Theme starter content', 'lv1080' ),
					'text' => _x( '<ul class="list-default"><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li></ul>', 'Theme starter content', 'lv1080' ),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_type_2' => array( 'text', array(
					'title' => _x( 'LUẬN VĂN NGÀNH XÃ HỘI', 'Theme starter content', 'lv1080' ),
					'text' => _x( '<ul class="list-default"><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li></ul>', 'Theme starter content', 'lv1080' ),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_type_3' => array( 'text', array(
					'title' => _x( 'QUẢN TRỊ MARKETING', 'Theme starter content', 'lv1080' ),
					'text' => _x( '<ul class="list-default"><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li><li><a href="#">Luận Văn Kiểm Toán</a></li></ul>', 'Theme starter content', 'lv1080' ),
					'filter' => true,
					'visual' => true,
				) )
			)
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about',
			'contact',
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'lv1080' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'lv1080' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'lv1080' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_about' => '{{panel_about}}'
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'lv1080' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_contact',
				),
			)
		),
	);

	/**
	 * Filters Lv1080 array of starter content.
	 *
	 * @since Lv1080 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'lv1080_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'lv1080_setup' );

/**
 * Register custom fonts.
 */
function lv1080_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'lv1080' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Lv1080 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function lv1080_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'lv1080-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'lv1080_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lv1080_widgets_init() {

	// Section header
	register_sidebar( array(
		'name'          => __( 'Slideshow header', 'lv1080' ),
		'id'            => 'section-header',
		'description'   => __( 'Widget gồm slider lớn xuất hiện trong phần header.', 'lv1080' ),
		'before_widget' => '<div class="item background-opacity">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="hidden" >',
		'after_title'   => '</span>',
	) );
	// Section core value
	register_sidebar( array(
		'name'          => __( 'Banner header', 'lv1080' ),
		'id'            => 'section-banner',
		'description'   => __( 'Widget banner nhỏ xuất hiện bên phải slider.', 'lv1080' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );
	// Section services
	register_sidebar( array(
		'name'          => __( 'Section Service left', 'lv1080' ),
		'id'            => 'section-service-left',
		'description'   => __( 'Widget xuất hiện trong phần dịch vụ bên trái.', 'lv1080' ),
		'before_widget' => '<div class="our-service__post">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => __( 'Section Service right', 'lv1080' ),
		'id'            => 'section-service-right',
		'description'   => __( 'Widget xuất hiện trong phần dịch vụ bên phải.', 'lv1080' ),
		'before_widget' => '<div class="media">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );

	// Section why
	register_sidebar( array(
		'name'          => __( 'Cột trái vì sao bạn cần làm luận văn', 'lv1080' ),
		'id'            => 'section-why-left',
		'description'   => __( 'Widget xuất hiện trong phần Vì sao bạn chọ chúng tôi bên trái.', 'lv1080' ),
		'before_widget' => '<div class="media">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );
	register_sidebar( array(
		'name'          => __( 'Cột phải vì sao bạn cần làm luận văn', 'lv1080' ),
		'id'            => 'section-why-right',
		'description'   => __( 'Widget xuất hiện trong phần Vì sao bạn chọ chúng tôi bên phải.', 'lv1080' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );
	// Section comment
	register_sidebar( array(
		'name'          => __( 'Section hỏi đáp', 'lv1080' ),
		'id'            => 'section-faq',
		'description'   => __( 'Widget cho nội dung phần hỏi đáp.', 'lv1080' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );

	// Section type
	register_sidebar( array(
		'name'          => __( 'Section các thể loại luận văn', 'lv1080' ),
		'id'            => 'section-type',
		'description'   => __( 'Widget xuất hiện trong phần các loại luận văn.', 'lv1080' ),
		'before_widget' => '<div class="col-md-4"><div class="item">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="heading-line"><h3>',
		'after_title'   => '</h3></div>', 
	) );

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'lv1080' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'lv1080' ),
		'before_widget' => '<div class="sidebar p-1 mb-2 bg-white">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="header-line__orange font-16"> <span>',
		'after_title'   => '</span></h2><div class="sidebar-content">',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Info', 'lv1080' ),
		'id'            => 'footer-info',
		'description'   => __( 'Widget xuất hiện ở phía dưới footer logo.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="footer-item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'lv1080' ),
		'id'            => 'footer-1',
		'description'   => __( 'Widget xuất hiện ở footer.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="text-uppercase">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'lv1080' ),
		'id'            => 'footer-2',
		'description'   => __( 'Widget xuất hiện ở footer.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="text-uppercase">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'lv1080' ),
		'id'            => 'footer-3',
		'description'   => __( 'Widget xuất hiện ở footer.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="text-uppercase">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Site info', 'lv1080' ),
		'id'            => 'footer-bottom',
		'description'   => __( 'Widget xuất hiện ở cuối trang.', 'lv1080' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );
    register_widget( 'Lv1080_Posts_By_Category_Widget' );
}
add_action( 'widgets_init', 'lv1080_widgets_init' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Lv1080 1.0
 */
function lv1080_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'lv1080_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function lv1080_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'lv1080_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
function lv1080_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'lv1080-style', get_stylesheet_uri() );

    wp_enqueue_style( 'lv1080-bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array( 'lv1080-style' ), '1.0' );
    wp_enqueue_style( 'lv1080-fonts', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array( 'lv1080-style' ), '1.0' );
    wp_enqueue_style( 'lv1080-slick', get_theme_file_uri( '/assets/css/slick.css' ), array( 'lv1080-style' ), '1.0' );
    wp_enqueue_style( 'lv1080-slick-theme', get_theme_file_uri( '/assets/css/slick-theme.css' ), array( 'lv1080-style' ), '1.0' );
    wp_enqueue_style( 'lv1080', get_theme_file_uri( '/assets/css/app.css' ), array( 'lv1080-style' ), '1.0' );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'lv1080-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'lv1080-style' ), '1.0' );
		wp_style_add_data( 'lv1080-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'lv1080-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'lv1080-style' ), '1.0' );
	wp_style_add_data( 'lv1080-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'lv1080-jquery', get_theme_file_uri( '/assets/js/jquery.min.js' ), array(), '3.1.1', true );
	wp_enqueue_script( 'respond', get_theme_file_uri( '/assets/js/respond.min.js' ), array(), '1.4.2', true );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	// if (is_home() || is_front_page()) {
		wp_enqueue_script( 'lv1080-slick', get_theme_file_uri( '/assets/js/slick.min.js' ), array(), '1.0', true );
	// }
	wp_enqueue_script( 'lv1080-bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array(), '3.3.7', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'lv1080-customize', get_theme_file_uri('/assets/js/lv1080.js'), array(), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'lv1080_scripts' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Lv1080 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function lv1080_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'lv1080_front_page_template' );

/**
 * Generator sign form post
 */
function lv1080_sign($pid) {
	return $pid . md5($pid . 'lv1080_sign');
}

/**
 * Verify form sign
 */
function lv1080_verify_sign ($sign, $pid) {
	return ($sign === $pid.md5($pid.'lv1080_sign')) ? true : false;
}
/*
 * custom pagination with bootstrap .pagination class
 * source: http://www.ordinarycoder.com/paginate_links-class-ul-li-bootstrap/
 */
function bootstrap_pagination( $echo = true ) {
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	$pages = paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type'  => 'array',
			'prev_next'   => true,
			'prev_text'    => __('« '),
			'next_text'    => __(' »'),
		)
	);

	if( is_array( $pages ) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');

		$pagination = '<ul class="pagination">';

		foreach ( $pages as $page ) {
			$pagination .= "<li>$page</li>";
		}

		$pagination .= '</ul>';

		if ( $echo ) {
			echo $pagination;
		} else {
			return $pagination;
		}
	}
}

/**
 * Short code
 */
function lv1080_related_news_shortcode( $atts, $content = null ) {
	return '<div class="related-post p-1 mb-1">' . $content . '</div>';
}
add_shortcode( 'related_news', 'lv1080_related_news_shortcode' );
//accordion
function lv1080_accordion_shortcode( $atts, $content = null ) {
	return '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'lv1080_accordion', 'lv1080_accordion_shortcode' );

function lv1080_process_shortcode( $atts, $content = null ) {
	return '<div class="panel panel-default border-0"> <div class="panel-heading" role="tab" id="heading' . $atts['id'] . '"> <h4 class="panel-title"> <a class="font-16" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse' . $atts['id'] . '" aria-expanded="true" aria-controls="collapseOne"> <strong>'. $atts['title'] . '</strong> </a> </h4> </div> <div id="collapse' . $atts['id'] . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $atts['id'] . '"> <div class="panel-body"> <p>' . $content . '</p> </div> </div> </div>';
}
add_shortcode( 'faq', 'lv1080_process_shortcode' );
// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');
add_filter('widget_custom_html','do_shortcode');

/**
 * The post thumbnail
 */
function lv1080_get_post_thumbnail ( $post = null, $size = 'post-thumbnail', $attr = '') {
	if ( has_post_thumbnail( $post, $size, $attr) ) {
		return get_the_post_thumbnail( $post, $size, $attr);
	} else {
		return '<img class="' . $attr['class'] . '" src="' . get_theme_file_uri('assets/images/default-thumbnail.png') .'" alt="'. get_the_title() .'" />';
	}
}
add_filter( 'get_the_archive_title', function ( $title ) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});

function lv1080_the_custom_logo () {
	if (has_custom_logo()) {
		the_custom_logo();
	} else {
		echo '<a href="#"><img class="img-responsive" src="' . get_theme_file_uri('assets/images/logo.png') . '" alt=""></a>';
	}
}
/*remove auto add paragrap to widget*/
add_filter( 'widget_display_callback', 'clean_widget_display_callback', 10, 3 );
function clean_widget_display_callback( $instance, $widget, $args ) {
    $instance['filter'] = false;
    return $instance;
}
/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Breadcrumb.
 */
require get_parent_theme_file_path( '/inc/breadcrumbs.php' );

/**
 * Menu
 */
require get_parent_theme_file_path( '/inc/wp-bootstrap-navwalker.php' );

/**
 * Widget.
 */
require get_parent_theme_file_path( '/inc/post-by-category.php' );
require get_parent_theme_file_path( '/inc/category-dropdown-custom-control.php' );