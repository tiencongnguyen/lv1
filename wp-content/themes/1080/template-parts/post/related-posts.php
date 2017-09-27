<div class="other-news">
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
        <h3><span>BÀI VIẾT LIÊN QUAN</span></h3>
        <ul class="list-default">

        <?php 
        while ( $query->have_posts() ) : $query->the_post(); ?>
        <li><a class="text-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php 
        endwhile;
        echo '</ul>';
      endif;
    endif;
    $post = $orig_post;
    wp_reset_query(); 
    ?>
</div>