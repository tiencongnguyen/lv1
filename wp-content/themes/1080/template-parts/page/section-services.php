<div class="section-service__more sec-pad">
      <h2 class="heading-graphic white"><?php echo get_theme_mod( 'panel_service_title', 'CÁC DỊCH VỤ VIẾT THUÊ LUẬN VĂN'); ?></h2>
      <div class="container">
        <div class="row">
        <?php 
            if (is_active_sidebar ('section-services')) {dynamic_sidebar ('section-services');}
        ?>
        </div>
      </div>
    </div> <!-- Section Service -->