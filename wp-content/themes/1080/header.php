<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link http://goki.vn/template/#template-partials
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="header" id="header">
      <div class="content-header hidden-xs">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-4">
              <?php lv1080_the_custom_logo(); ?>
            </div>
            <div class="col-sm-5 col-md-5">
              <?php echo get_search_form() ?>
            </div>
            <div class="col-sm-4 col-md-3">
              <div class="text-right mt-1">
                <p class="hotline mb-0">
                  <i class="fa fa-phone text-warning"></i> <span class="text-muted">Hotline:</span>
                  <strong class="text-warning"><a href="tel:<?php echo get_theme_mod( 'lv1080_phonenumber', '098.855.2424' ); ?>" title="hotlline"><?php echo get_theme_mod( 'lv1080_phonenumber', '098.855.2424' ); ?></a></strong>
                </p>
                <p class="mb-0">
                  <a href="#">
                    <i class="fa fa-envelope-o text-warning"></i> <span class="text-muted">Email:</span>
                    <span class="text-black"><a class="mail" href="mailto:<?php echo get_theme_mod( 'lv1080_email', 'lv1080.group@gmail.com' ); ?>"><?php echo get_theme_mod( 'lv1080_email', 'lv1080.group@gmail.com' ); ?></a></span>
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- Content Header -->
      <?php if ( has_nav_menu( 'top' ) ) : ?>
          <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
      <?php endif; ?>
    </div> <!-- Header -->