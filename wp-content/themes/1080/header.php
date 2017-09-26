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
      <div class="top-header" id="top-header">
        <div class="container">
          <div class="hot-link pull-left">
            <span class="hotline"><i class="fa fa-phone"></i> <strong><a href="tel:<?php echo get_theme_mod( 'lv1080_phonenumber', '098.855.2424' ); ?>" title="hotlline"><?php echo get_theme_mod( 'lv1080_phonenumber', '098.855.2424' ); ?></a></strong></span>
            <a class="mail" href="mailto:<?php echo get_theme_mod( 'lv1080_email', 'lv1080.group@gmail.com' ); ?>"><i class="fa fa-envelope"></i> <?php echo get_theme_mod( 'lv1080_email', 'lv1080.group@gmail.com' ); ?></a>
          </div>
          <div class="social pull-right">
            <a href="<?php echo get_theme_mod('lv1080_facebook', 'http://fb.com/'); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            <a href="<?php echo get_theme_mod('lv1080_googleplus', 'http://google.com/'); ?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
            <a href="<?php echo get_theme_mod('lv1080_youtube', 'http://youtube.com/'); ?>"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
          </div>
        </div>
      </div> <!-- Top Header -->
      <div class="content-header hidden-xs" id="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <?php lv1080_the_custom_logo(); ?>
            </div>
            <div class="col-md-offset-3 col-md-6">
              <?php echo get_search_form() ?>
            </div>
          </div>
        </div>
      </div> <!-- Content Header -->
      <?php if ( has_nav_menu( 'top' ) ) : ?>
          <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
      <?php endif; ?>
    </div> <!-- Header -->

    <?php (is_home() || is_front_page())?get_template_part( 'template-parts/header/header', 'slider' ):''; ?>