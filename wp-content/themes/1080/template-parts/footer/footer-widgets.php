<?php
/**
 * Displays footer widgets if assigned
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */

?>
<div class="col-sm-6 col-md-3">
<p><?php lv1080_the_custom_logo(); ?></p>
<?php 
if ( is_active_sidebar( 'footer-info' ) ) { dynamic_sidebar( 'footer-info' ); } 
?>
</div>
<div class="col-sm-6 col-md-3">
<?php
if ( is_active_sidebar( 'footer-1' ) ) { dynamic_sidebar( 'footer-1' ); }
?>
</div>
<div class="col-sm-6 col-md-3">
<?php
if ( is_active_sidebar( 'footer-2' ) ) { dynamic_sidebar( 'footer-2' ); }
?>
</div>
<div class="col-sm-6 col-md-3">
<?php
if ( is_active_sidebar( 'footer-3' ) ) { dynamic_sidebar( 'footer-3' ); }
?>