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
<nav class="navbar navbar-lv1080 navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand visible-xs" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img class="img-responsive" src="<?php echo get_theme_file_uri('assets/images/logo-white.png') ?>" alt="<?php bloginfo('name'); ?>"></a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse">
      <?php wp_nav_menu( array(
        'theme_location' => 'top',
        'menu_id'        => 'top-menu',
        'menu_class' => 'nav navbar-nav', 
        // 'walker' => new Lv1080_Walker_Nav_Menu(),
        // 'menu' => 'top_menu',
        'depth' => 2,
        'container' => false,
        //Process nav menu using our custom nav walker
        'walker' => new wp_bootstrap_navwalker()
      ) ); ?>
    </div> <!-- Navbar Collapse -->
  </div> <!-- Container -->
</nav> <!-- Navbar -->