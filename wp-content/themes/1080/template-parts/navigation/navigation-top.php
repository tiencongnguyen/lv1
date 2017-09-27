<?php
/**
 * Displays top navigation
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */

?>
<?php 
$class = '';
if (!is_home() && !is_front_page()) {
  $class = 'mb-0';
}
?>
<nav class="navbar navbar-lv1080 navbar-default navbar-static-top <?=$class?>" data-toggle="sticky-onscroll">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand visible-xs" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse">
      <?php wp_nav_menu( array(
        'theme_location' => 'top',
        'menu_id'        => 'top-menu',
        'menu_class' => 'nav navbar-nav', 
        'depth' => 2,
        'container' => false,
        'walker' => new wp_bootstrap_navwalker()
      ) ); ?>
    </div> <!-- Navbar Collapse -->
  </div> <!-- Container -->
</nav> <!-- Navbar -->