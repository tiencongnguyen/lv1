<section class="project-list sec-pad">
  <div class="container">
    <h2 class="heading-graphic"><?php echo get_theme_mod( 'panel_type_title', 'CÁC LOẠI LUẬN VĂN ĐỒ ÁN'); ?></h2>
    <div class="row">
      <?php 
        if (is_active_sidebar ( 'section-type')) {dynamic_sidebar ('section-type');}
      ?>
    </div>
  </div>
</section> <!-- Section Library -->