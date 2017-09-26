<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link http:/goki.vn/Creating_an_Error_404_Page
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="sec-pad">
      <div class="container">
        <h2 class="heading-graphic"><?php _e( 'Trang không tồn tại ...', 'lv1080' ); ?></h2>
        <?php get_search_form(); ?>
      </div>
</div>
<?php get_footer();
