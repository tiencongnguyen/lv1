<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link http://goki.vn/template/#template-partials
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */

?>
    <div class="footer bg-white py-3">
      <div class="container">
        <div class="row">
          <?php get_template_part( 'template-parts/footer/footer', 'widgets'); ?>
        </div>
      </div>
      <div class="copyright text-center">
        <?php get_template_part( 'template-parts/footer/site', 'info' );?>
      </div>
    </div> <!-- Footer -->
    <div class="action-fixed visible-xs">
      <a class="phone" href="tel:<?php echo get_theme_mod ('lv1080_phonenumber', '0988552424'); ?>"><i class="fa fa-phone"></i></a>
    </div>

    <?php wp_footer(); ?>
  </body>
</html>
