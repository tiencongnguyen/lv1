<div class="customer-form">
  <h2 class="header-line__orange">
    <span><?php echo get_theme_mod('home_contact_title', 'Gửi thông tin cho chúng tôi');?></span>
  </h2>
  <?php 
/*  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	// check for plugin using plugin name
	if ( is_plugin_active( 'plugin-directory/plugin-file.php' ) ) {*/
  //plugin is activated
	  $contactFrom = get_theme_mod('home_contact_form', '[contact-form-7 id="13"]'); 
	  echo do_shortcode($contactFrom);
	// } 
	?>
</div>