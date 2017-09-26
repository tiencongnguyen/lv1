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
<?php get_template_part ('template-parts/navigation/breadscrumb', ''); ?><!-- Breadcrumb -->
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="page-content text-justify">
        <?php the_title('<h1>', '</h1>'); ?>
        <div class="clearfix">
          <div class="block-timer pull-left">
            <div class="text-muted">
              <?php echo lv1080_posted_on(); ?>
            </div>
          </div>
          <div class="social-button pull-right">
                <?php get_template_part ('template-parts/navigation/navigation', 'social-link'); ?>
          </div>
        </div>
        <?php the_content();?>
      </div>
      <?php get_template_part ('template-parts/post/related', 'posts'); ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div> <!-- Container -->