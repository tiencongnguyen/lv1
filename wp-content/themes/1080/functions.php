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

	// add_image_size( 'lv1080-featured-image', 1600, 530, true );
	// add_image_size( 'lv1080-logo-image', 291, 50, true );
	add_image_size( 'lv1080-thumbnail-image', 220, 220, true );
	add_image_size( 'lv1080-thumbnail-sidebar', 90, 90, true );
	// add_image_size( 'lv1080-thumbnail-avatar', 100, 100, true );

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
		'width'       => 291,
		'height'      => 50,
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
      		'title' => _x('Dịch vụ', 'Theme starter content', 'luanvan24'),
      		'cat' => 0,
      		'num' => 5,
      		'thumb' => false
        )),
        'posts_by_category' => array ('posts_by_category_widget', array(
      		'title' => _x('Bài hướng dẫn', 'Theme starter content', 'luanvan24'),
      		'cat' => 0,
      		'num' => 5,
      		'thumb' => true
        )),
        'posts_by_category' => array ('posts_by_category_widget', array(
      		'title' => _x('Bài viết mới', 'Theme starter content', 'luanvan24'),
      		'cat' => 0,
      		'num' => 5,
      		'thumb' => true
        )),
				'text_quote' => array( 'text', array(
          'title' => _x( 'Tài khoản & liên hệ', 'Theme starter content', 'luanvan24' ),
          'text' => _x('<ul class="sidebar-list__contact list-default"> <li><i class="fa fa-phone" aria-hidden="true" style="color: #1988db"></i> 0946 88 33 50</li> <li><i class="fa fa-envelope" aria-hidden="true" style="color: #1988db"></i> lv1080.group@gmail.com</li> <li><i class="fa fa-skype" aria-hidden="true" style="color: #1988db"></i> lv1080.group</li> <li><i class="fa fa-yahoo" aria-hidden="true" style="color: #1988db"></i> trithuc_congdong</li> </ul>', 'Theme starter content', 'luanvan24' ),
          'filter' => true,
					'visual' => true,
	            ) )
			),
			'footer-info' => array(
        'lv1080_info' => array ('text', array(
      		'title' => _x('Thông tin công ty', 'Theme starter content', 'lv1080'),
      		'text' => _x('<p><a href="#">Nhận viết luận văn thuê</a> chuyên nghiệp Dịch vụ làm luận văn thuê UY TÍN của Tri thức cộng đồng, nhận viết thuê luận văn thạc sĩ, cao học, MBA, luận án tiến sĩ, khóa luận, đồ án tốt nghiệp, báo cáo thực tập, tốt nghiệp, luận văn tiếng anh tại Hà Nội, TP HCM</p>', 'Theme starter content', 'lv1080'),
        	'filter' => true,
					'visual' => true,
				))
			),
			'footer-1' => array(
        'news' => array ('text', array(
      		'title' => _x('Liên hệ với chúng tôi', 'Theme starter content', 'lv1080'),
      		'text' => _x('<ul class="list-default"><li><i class="fa fa-phone" aria-hidden="true"></i> 0946 88 33 50</li><li><i class="fa fa-envelope" aria-hidden="true"></i> lv1080.group@gmail.com</li><li><i class="fa fa-skype" aria-hidden="true"></i> lv1080.group</li><li><i class="fa fa-home" aria-hidden="true"></i> KĐT Nam Cường, Cổ Nhuế, Bắc Từ Liêm, Hà Nội</li>
              </ul>', 'Theme starter content', 'lv1080'),
      		'filter' => true,
					'visual' => true,
        ))
      ),
			'footer-2' => array(
        'lv1080_tag' => array ('text', array(
      		'title' => _x('Từ khóa', 'Theme starter content', 'lv1080'),
      		'text' => _x('<a href="#">Nulla</a>, <a href="#">vel</a>, <a href="#">metus</a>, <a href="#">scelerisque</a>, <a href="#">sollicitudin</a>, <a href="#">Nulla</a>, <a href="#">vel</a>, <a href="#">metus</a>, <a href="#">scelerisque</a>, <a href="#">sollicitudin</a>', 'Theme starter content', 'lv1080'),
      		'filter' => true,
					'visual' => true,
          ))
      ),
			'footer-3' => array(
          'brands' => array ('text', array(
        		'title' => _x('Chi nhánh', 'Theme starter content', 'lv1080'),
        		'text' => _x('<ul class="nav nav-tabs"> <li class="active"><h5><a href="#hanoi">Hà Nội</a></h5></li> <li><h5><a href="#hcm">TP HCM</a></h5></li> <li><h5><a href="#sing">Singapo</a></h5></li> </ul> <div class="tab-content"> <div id="hanoi" class="tab-pane fade in active"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d953726.9246343331!2d105.09065670049068!3d20.972753831676876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135008e13800a29%3A0x2987e416210b90d!2sHanoi%2C+Vietnam!5e0!3m2!1sen!2s!4v1505456054382" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe> </div> <div id="hcm" class="tab-pane fade"> <h3>HCM</h3> </div> <div id="sing" class="tab-pane fade"> <h3>Sing</h3> </div> </div>', 'Theme starter content', 'lv1080'),
        		'filter' => true,
						'visual' => true, 
          ))
      ),
			'footer-bottom' => array(
          'lv1080_info' => array ('text', array(
        		'title' => _x('Thông tin trang', 'Theme starter content', 'lv1080'),
        		'text' => _x('©2010 Bản quyền thuộc về nhóm Tri thức cộng đồng', 'Theme starter content', 'lv1080'), 
        		'filter' => true,
						'visual' => true,
				))
			),

			// Add the core-defined widget to the section-header.
			'section-header' => array(
				'lv1080_header_1' => array( 'text', array(
					'title' => _x( '', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="container"><div class="slider-caption text-center"><h2 class="text-uppercase"><a href="#">Tại sao nên chọn Tri thức cộng đồng?</a></h2><ul class="list-default hidden-xs"><li>Chúng tôi nhận dịch vụ làm thuê luận văn cao học.</li><li>Dịch vụ làm viết tiểu luận thuê</li><li>Dịch vụ làm dissertation, essay</li><li>Dịch vụ làm viết thuê luận văn bằng Tiếng Anh</li><li>Dịch vụ chuyên nghiệp nhất không mắc lỗi plagiarism</li></ul><a href="#" class="btn btn-lg btn-primary">Xem chi tiết</a></div></div><img src="%1s" alt="">', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/slider-1.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_header_2' => array( 'text', array(
					'title' => _x( '', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="container"><div class="slider-caption text-center"><h2 class="text-uppercase"><a href="#">Tại sao nên chọn Tri thức cộng đồng?</a></h2><ul class="list-default hidden-xs"><li>Chúng tôi nhận dịch vụ làm thuê luận văn cao học.</li><li>Dịch vụ làm viết tiểu luận thuê</li><li>Dịch vụ làm dissertation, essay</li><li>Dịch vụ làm viết thuê luận văn bằng Tiếng Anh</li><li>Dịch vụ chuyên nghiệp nhất không mắc lỗi plagiarism</li></ul><a href="#" class="btn btn-lg btn-primary">Xem chi tiết</a></div></div><img src="%1s" alt="">', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/slider-2.jpg')),
					'filter' => true,
					'visual' => true,
				) )
			),

			// Add the core-defined widget to the section-core.
			'section-core' => array(
				'lv1080_core_1' => array( 'text', array(
					'title' => _x( 'luận văn tốt nghiệp', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="service-icon"><img src="%1s" alt=""></div><h3 class="text-uppercase">BÀI CHẤT LƯỢNG</h3><p>Đã từng là sinh viên cùng với những kinh nghiệm thực tiễn, các bài viết của chúng tôi cam kết đúng số liệu, quy trình thực tế và chuẩn theo đề cương trường.</p><a class="btn btn-default text-uppercase" href="#">Liên hệ ngay</a>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/icon-baiviet.png')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_core_2' => array( 'text', array(
					'title' => _x( 'dịch vụ viết tiểu luận', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="service-icon"><img src="%1s" alt=""></div><h3 class="text-uppercase">đội ngũ chuyên nghiệp</h3><p>Chúng tôi nhận dịch vụ làm thuê luận văn cao học, thạc sĩ, viết thuê luận án tiến sĩ kinh tế, viết thuê báo cáo, chuyên đề tốt nghiệp hệ cao đẳng, tại chức, văn bằng 2.</p><a class="btn btn-default text-uppercase" href="#">Liên hệ ngay</a>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/icon-doinguchatluong.png')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_core_3' => array( 'text', array(
					'title' => _x( 'dịch vụ viết thuê', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="service-icon"><img src="%1s" alt=""></div><h3 class="text-uppercase">BẢO MẬT THÔNG TIN</h3><p>Việc bảo mật thông tin khách hàng và có đầy đủ các phương án dự phòng là điều kiện tiên quyết cũng như sự khác biệt hoàn toàn của chúng tôi so với các dịch vụ khác.</p><a class="btn btn-default text-uppercase" href="#">Liên hệ ngay</a>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/icon-baomat.png')),
					'filter' => true,
					'visual' => true,
				) )
			),

			// Add the core-defined widget to the section-services.
			'section-services' => array(
				'lv1080_services_1' => array( 'text', array(
					'title' => _x( 'luận văn tốt nghiệp', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="img-block"><h3 class="text-uppercase"><a href="#">Luận văn tiếng anh</a></h3><a href="#"><img src="%1s" alt=""></a></div><div class="description"><p>Nhận viết bài luận tiếng anh, assignment, dissertation, essay... làm luận văn tiếng anh thuê, cam kết đạt điểm cao, không mắc lỗi plagiarism</p><a class="btn btn-primary text-uppercase" href="#">Xem thêm</a></div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/luanvan-tienganh.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_services_2' => array( 'text', array(
					'title' => _x( 'dịch vụ viết tiểu luận', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="img-block"><h3 class="text-uppercase"><a href="#">Luận văn tốt nghiệp</a></h3><a href="#"><img src="%1s" alt=""></a></div><div class="description"><p>Nhận viết luận văn thạc sĩ, cao học, MBA, luận án tiến sĩ, làm luận văn tốt nghiệp thuê các chuyên ngành kinh tế, tài chính... cam kết đạt điểm CAO</p><a class="btn btn-primary text-uppercase" href="#">Xem thêm</a></div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/luanvan-totnghiep.jpg')),
					'filter' => true,
					'visual' => true,
				) ),
				'lv1080_services_3' => array( 'text', array(
					'title' => _x( 'dịch vụ viết thuê', 'Theme starter content', 'lv1080' ),
					'text' => sprintf(_x( '<div class="img-block"><h3 class="text-uppercase"><a href="#">Phân tích định lượng</a></h3><a href="#"><img src="%1s" alt=""></a></div><div class="description"><p>Dịch vụ hỗ trợ số liệu luận văn: phân tích định lượng kinh tế, quản trị, phân tích dữ liệu định lượng, nhận chạy eview, SPSS, STATA...</p><a class="btn btn-primary text-uppercase" href="#">Xem thêm</a></div>', 'Theme starter content', 'lv1080' ), get_theme_file_uri('assets/images/phantich-dinhluong.jpg')),
					'filter' => true,
					'visual' => true,
				) )
			),

			// Add the core-defined widget to the section-about.
			'section-about' => array(
				'lv1080_about' => array( 'text', array(
					'title' => _x( 'về chúng tôi', 'Theme starter content', 'lv1080' ),
					'text' => _x( '<p.navbar-lv1080>Thành lập từ năm 2005 - với gần 10 năm kinh nghiệm, nhóm Luận Văn 24 là nơi hội tụ của hơn 200 thành viên ưu tú đã tốt nghiệp Đại học, Cao học loại Giỏi tại các trường hàng đầu như: ĐH Kinh Tế Quốc Dân, ĐH Ngoại Thương, Học viện Ngân Hàng, Học viện tài chính, ĐH Khoa học xã hội và nhân văn, ĐH Bách Khoa.. cũng như các trường đại học nước ngoài và các trường liên kết.</p><ul class="about list-default"><li.navbar-lv1080>Bạn cần tìm người viết thuê luận văn nhiều chuyên ngành?</li><li.navbar-lv1080>Bạn phân vân nơi nào làm luận văn chuyên nghiệp nhất, hãy liên hệ với chúng tôi.</li><li.navbar-lv1080>Chúng tôi chuyên nhận làm trọn gói dịch vụ viết thuê luận văn uy tín - chất lượng - giá rẻ nhất, làm chuyên đề tốt nghiệp, khóa luận, báo cáo thực tập, nhận viết hộ luận văn thạc sỹ, cao học, nhận làm luận án tiến sĩ, NCS, tại chức, vb2, chất lượng uy tín tại Hà Nội, Đà Nẵng, Vinh, Nghệ An, Huế, Tây Nguyên, Cần Thơ...</li><li.navbar-lv1080>Với sự chuyên nghiệp và trợ giúp của các thành viên tốt nghiệp cao, thạc sỹ,tiến sỹ MBA loại giỏi tại các trường đại học, chúng tôi tin tưởng rằng có thể làm hộ luận văn giúp các bạn trong việc hoàn thiện luận văn, tiểu luận, báo cáo thực tập, chuyên đề tốt nghiệp MBA, bằng Tiếng Anh và Tiếng Việt,...</li></ul>', 'Theme starter content', 'lv1080' ),
					'filter' => true,
					'visual' => true,
				) )
			),

			// Add the core-defined customer's comment widget to the section-why.
			'section-why' => array(
				'lv1080_why_1' => array( 'text', array(
					'title' => _x( 'Vì sao bạn nên chọn chúng tôi', 'Theme starter content', 'lv1080' ),
					'text' => _x( '<div class="choose-us__item"><div class="title clearfix"><div class="title-icon pull-left"><i class="fa fa-user" aria-hidden="true"></i></div><h3 class="text-uppercase">Thành viên giàu kinh nghiệm</h3></div><div class="description">Được thành lập bởi những thành viên giàu kinh nghiệm trong lĩnh vực viết thuê luận văn thạc sỹ, tiến sĩ, luận văn tốt nghiệp ở các trường đại học và cao đẳng thời gian hơn 5 năm đi vào hoạt động đã cho chúng tôi nhiều đúc kết ổn định trong lĩnh vực viết luận văn.</div></div><div class="choose-us__item"><div class="title clearfix"><div class="title-icon pull-left"><i class="fa fa-check" aria-hidden="true"></i></div><h3 class="text-uppercase">Đảm bảo chất lượng, tiến độ</h3></div><div class="description">Hiện tại chúng tôi đã khẳng định được vai trò và vị thế là một trong những đợ vị viết thuê luận văn hàng đầu có kiến thức sâu rộng trong những lĩnh vực như: luận văn cao học, luận văn kinh tế, luận văn tốt nghiệp và luận văn tiến sỹ</div></div><div class="choose-us__item"><div class="title clearfix"><div class="title-icon pull-left"><i class="fa fa-dollar" aria-hidden="true"></i></div><h3 class="text-uppercase">Giá cả hợp lý và cạnh tranh</h3></div><div class="description">Chi phí luôn là vấn đề mà mọi người quan tâm dù ở đâu đi chăng nữa khi bạn đã đến với trithuccongdong.net bạn sẽ yên tâm về chi phí chúng tôi luôn đưa ra chi phí thấp nhất hướng tới từng mục tiêu cụ thể của khách hàng.</div></div>', 'Theme starter content', 'lv1080' ),
					'filter' => true,
					'visual' => true,
				) )
			),

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
		'name'          => __( 'Section header', 'lv1080' ),
		'id'            => 'section-header',
		'description'   => __( 'Widget xuất hiện trong phần header.', 'lv1080' ),
		'before_widget' => '<div class="item background-opacity">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="hidden" >',
		'after_title'   => '</span>',
	) );
	// Section core value
	register_sidebar( array(
		'name'          => __( 'Section Giá trị cốt lõi', 'lv1080' ),
		'id'            => 'section-core',
		'description'   => __( 'Widget xuất hiện trong phần giá trị cốt lõi.', 'lv1080' ),
		'before_widget' => '<div class="col-sm-4 col-md-4"><div class="item text-center">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );
	// Section services
	register_sidebar( array(
		'name'          => __( 'Section Service', 'lv1080' ),
		'id'            => 'section-services',
		'description'   => __( 'Widget xuất hiện trong phần dịch vụ nổi bật.', 'lv1080' ),
		'before_widget' => '<div class="col-sm-4 col-md-4"><div class="item text-center">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );

	// Section about
	register_sidebar( array(
		'name'          => __( 'Section về chúng tôi', 'lv1080' ),
		'id'            => 'section-about',
		'description'   => __( 'Widget xuất hiện trong phần giới thiệu.', 'lv1080' ),
		'before_widget' => '<div class="choose-us">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="heading-line"><h2>',
		'after_title'   => '</h2></div><div class="content">', 
	) );

	// Section why
	register_sidebar( array(
		'name'          => __( 'Section bạn cần làm luận văn', 'lv1080' ),
		'id'            => 'section-why',
		'description'   => __( 'Widget xuất hiện trong phần bạn cần làm luận văn.', 'lv1080' ),
		'before_widget' => '<div class="choose-us">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="heading-line green"><h2>',
		'after_title'   => '</h2></div><div class="content">',
	) );
	// Section comment
	register_sidebar( array(
		'name'          => __( 'Section comment', 'lv1080' ),
		'id'            => 'section-comment',
		'description'   => __( 'Widget xuất hiện trong phần Ý kiến khách hàng.', 'lv1080' ),
		'before_widget' => '<div class="feedback">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<h2 class="text-center text-uppercase">',
		'after_title'   => '</h2><div class="slider-talk-about-us"><div class="people-item">',
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
		'before_widget' => '<div class="sidebar">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<div class="sidebar-heading"><h2>',
		'after_title'   => '</h2></div><div class="sidebar-content">',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Info', 'lv1080' ),
		'id'            => 'footer-info',
		'description'   => __( 'Widget xuất hiện ở phía dưới footer logo.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'lv1080' ),
		'id'            => 'footer-1',
		'description'   => __( 'Widget xuất hiện ở footer.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="footer-link widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'lv1080' ),
		'id'            => 'footer-2',
		'description'   => __( 'Widget xuất hiện ở footer.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="footer-link widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'lv1080' ),
		'id'            => 'footer-3',
		'description'   => __( 'Widget xuất hiện ở footer.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="footer-link widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => __( 'Site info', 'lv1080' ),
		'id'            => 'footer-bottom',
		'description'   => __( 'Widget xuất hiện ở cuối trang.', 'lv1080' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
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
	return '<div class="alert alert-success">' . $content . '</div>';
}
add_shortcode( 'related_news', 'lv1080_related_news_shortcode' );

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