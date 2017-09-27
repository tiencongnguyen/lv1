<?php
/**
 * Displays content for front page
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */
?>  
    <div class="container">
    <?php get_template_part( 'template-parts/header/header', 'slider' ); ?>
    <?php get_template_part( 'template-parts/page/section', 'why' );?>
    <?php get_template_part( 'template-parts/page/section', 'services' );?>
    <?php get_template_part( 'template-parts/page/section', 'tut' );?>
    </div> <!-- Container -->
    <div class="customer py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <?php get_template_part( 'template-parts/page/section', 'faq' ); ?>
          </div> <!-- FAQ -->
          <div class="col-md-6">
            <?php get_template_part( 'template-parts/page/section-customer', 'form' ); ?>
          </div> <!-- Customer Form -->
        </div> <!-- Row -->
      </div> <!-- Container -->
    </div> <!-- Customer -->

     