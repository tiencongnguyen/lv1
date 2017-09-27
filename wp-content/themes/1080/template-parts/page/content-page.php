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
<?php get_template_part ('template-parts/navigation/breadscrumb', ''); ?>
<div class="container">
  <div class="contact-page bg-white border-grey pl-1 pr-1 py-3 mb-2">
    <h1 class="header-line text-center">
      <?php the_title('<span>', '</span>'); ?>
    </h1>
    <div class="row">
      <div class="containter">
        <div class="col-md-12">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</div>