<div class="faq">
  <h2 class="header-line__orange">
    <span><?php echo get_theme_mod( 'panel_faq_title', 'hỏi đáp'); ?></span>
  </h2>
  <!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> -->
    <?php if ( is_active_sidebar( 'section-faq' ) ) { dynamic_sidebar( 'section-faq' ); } ?>
  <!-- </div> -->
</div>
