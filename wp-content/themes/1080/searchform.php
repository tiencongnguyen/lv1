<?php
/**
 * Template for displaying search forms in Lv1080
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<div class="search-form">
  <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input id="<?php echo $unique_id; ?>" class="form-control" type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Nhập từ cần tìm...', 'placeholder', 'lv1080' ); ?>">
    <a href="javascript:void(0)" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
  </form>
</div>