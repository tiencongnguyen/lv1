<?php
/**
 * Template part for displaying posts
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
          <?php the_title('<h1 class="mt-0">', '</h1>'); ?>
          <div class="clearfix mb-1">
            <?php echo lv1080_posted_on(); ?>
            <div class="pull-right">
            </div>
          </div>
          <?php the_content(); ?>
        </div>
        <?php get_template_part ('template-parts/post/related', 'posts'); ?>
      </div>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>