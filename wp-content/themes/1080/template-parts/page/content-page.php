<?php
/**
 * Template part for displaying page content in page.php
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
      <div class="title-line">
      <?php the_title('<h1>', '</h1>'); ?>
      </div>
      <div class="page-content text-justify">
        <?php the_content();?>
      </div>
      <?php get_template_part ('template-parts/post/related', 'posts'); ?>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div> <!-- Container -->
