<div class="tutorials">
  <h1 class="header-line text-center">
    <span><?php echo get_theme_mod( 'panel_tut_title', 'Bài hướng dẫn mới nhất'); ?></span>
  </h1>
  <div class="news-list">
    <div class="row">
    	<!-- start loop -->
      <?php 
      $cat = get_theme_mod ('panel_tut_category', 0);
      $num = get_theme_mod ('panel_tut_num', 8);
      $args = array(
        'post_type' => 'post',
        'category__in' => $cat,
        'posts_per_page'=> $num, // Number of related posts that will be shown.
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); 
        ?>
        <div class="col-sm-6 col-md-3">
          <div class="item mb-3">
            <div class="news-image">
              <a class="aspect-ratio" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail ('lv1080-thumbnail-image'); ?></a>
            </div>
            <div class="news-post">
              <h4><a class="text-black" href="<?php the_permalink() ;?>"><?php the_title(); ?></a></h4>
              <span><?php the_excerpt(); ?></span>
            </div>
            <div class="news-footer">
              <?php lv1080_posted_on(); ?>
            </div>
          </div>
        </div>
        <?php 
        endwhile;
      endif;
      wp_reset_query(); 
      ?>
      <!-- /end loop -->
    </div>
    <div class="text-center mb-3">
      <a class="btn btn-warning pl-3 pr-3 text-uppercase" href="<?php echo get_theme_mod( 'panel_tut_link', '#'); ?>">Xem thêm</a>
    </div>
  </div>
</div> <!-- Tutorials -->