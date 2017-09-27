<div class="our-service py-3">
  <h2 class="header-line text-center">
    <span><?php echo get_theme_mod( 'panel_service_title', 'Dịch vụ của chúng tôi'); ?></span>
  </h2>
  <div class="row">
    <div class="col-md-6">
    	<?php if (is_active_sidebar ('section-service-left')) {dynamic_sidebar ('section-service-left');} ?>
    </div>
    <div class="col-md-6">
      <div class="our-service__list">
    		<?php if (is_active_sidebar ('section-service-right')) {dynamic_sidebar ('section-service-right');} ?>
      </div>
    </div>
  </div>
</div> <!-- Our Service -->