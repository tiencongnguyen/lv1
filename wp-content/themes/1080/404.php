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
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="news-page bg-white border-grey p-1 mb-2">
        <div class="post-content">
          <h1 class="mt-0"><?php _e( 'Trang không tồn tại ...', 'lv1080' ); ?></h1>
          <div class="clearfix mb-1">
          </div>
          <?php get_search_form(); ?>
        </div>
        <?php get_template_part ('template-parts/post/related', 'posts'); ?>
      </div>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer();
