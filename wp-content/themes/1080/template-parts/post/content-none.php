<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link http://lv1080.com
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */
?>
<?php get_template_part ('template-parts/navigation/breadscrumb', ''); ?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="news-page bg-white border-grey p-1 mb-2">
        <div class="post-content">
          <h1 class="mt-0">Dữ liệu đang cập nhật ...</h1>
          <div class="clearfix mb-1">
            <div class="pull-right">
            </div>
          </div>
        </div>
        <?php get_template_part ('template-parts/post/related', 'posts'); ?>
      </div>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>