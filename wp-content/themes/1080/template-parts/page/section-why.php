<div class="why-choose-us py-3">
    <h2 class="header-line text-center">
      <span><?php echo get_theme_mod( 'panel_why_title', 'Tại sao bạn nên chọn chúng tôi'); ?></span>
    </h2>
    <div class="row">
      <div class="col-md-6">
        <?php if ( is_active_sidebar( 'section-why-left' ) ) { dynamic_sidebar( 'section-why-left' ); }?>
      </div>
      <div class="col-md-6">
      	<?php if ( is_active_sidebar( 'section-why-right' ) ) { dynamic_sidebar( 'section-why-right' ); }?>
      	<!-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/cFJHV2LbQvU" frameborder="0" allowfullscreen></iframe> -->
        <!-- <img class="img-responsive" src="images/youtube.jpg"> -->
      </div>
    </div>
  </div> <!-- Why Choose Us -->