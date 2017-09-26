<?php
/**
 * Displays content for front page
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */
?>    
    <?php get_template_part( 'template-parts/page/section', 'core' );?>
    <?php get_template_part( 'template-parts/page/section', 'services' );?>
    <section class="sec-pad">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
    			<?php get_template_part( 'template-parts/page/section', 'about' );?>
    			</div>
    			<div class="col-md-6">
			    <?php get_template_part( 'template-parts/page/section', 'why' );?>
			    </div>
		    </div>
	    </div>
    </section>
    <section class="section-green sec-pad">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
    			<?php get_template_part ('template-parts/page/section', 'comment'); ?>
    			</div>
    			<div class="col-md-6">
    			<?php get_template_part ('template-parts/page/form', 'contact'); ?>
			    </div>
		    </div>
	    </div>
    </section>
    <?php get_template_part( 'template-parts/page/section', 'type' );?>
     