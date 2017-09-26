<div class="related-news">
    <?php
    $orig_post = $post;
    global $posts;
    $categories = get_the_category($post->ID);
    if ($categories) :
      $category_ids = array();
      foreach($categories as $individual_category) :
          $category_ids[] = $individual_category->term_id;
      endforeach;
      $args = array(
        'category__in' => $category_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=> 4, // Number of related posts that will be shown.
        'caller_get_posts'=>1
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) : ?>
        <div class="sidebar-heading">
          <h2>Bài viết liên quan</h2>
        </div>
        <div class="row">

        <?php 
        while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="col-sm-6 col-md-3"> 
          <div class="item">
            <div class="image-center">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail (array(300, 200)); ?></a>
            </div>
            <div class="description">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <div class="block-timer">
                <div class="text-muted">
                  <i class="fa fa-calendar" aria-hidden="true"></i>  <?php echo lv1080_time_link(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        endwhile;
        echo '</div>';
      endif;
    endif;
    $post = $orig_post;
    wp_reset_query(); 
    ?>
</div>