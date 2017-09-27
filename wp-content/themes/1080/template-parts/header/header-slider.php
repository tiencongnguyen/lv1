<?php
/**
 * Displays header media
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */
?>
<div class="row">
  <div class="col-md-8">
    <div class="slider-lv mb-2">
    	<?php if ( is_active_sidebar( 'section-header' ) ) { dynamic_sidebar( 'section-header' ); }?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="row">
      <?php if ( is_active_sidebar( 'section-banner' ) ) { dynamic_sidebar( 'section-banner' ); }?>
    </div>
  </div>
</div>
