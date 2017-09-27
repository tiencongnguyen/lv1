<?php
/**
 * The template for displaying archive pages
 *
 * @link http://lv1080.com
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */

get_header();?>
<?php get_template_part ('template-parts/navigation/breadscrumb', ''); ?> 
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="news-page bg-white border-grey p-1 mb-2">
        <div class="news-list">
          <h2 class="header-line__orange blue font-16">
            <?php the_archive_title( '<span>', '</span>' ); ?>
          </h2>
          <?php if ( have_posts() ) : ?>
          <div class="row">
            <!-- start loop -->
            <?php 
            while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-md-4">
              <div class="item mb-3">
                <div class="news-image">
                  <a class="aspect-ratio" href="<?php the_permalink() ?>">
                  <?php the_post_thumbnail ('lv1080-thumbnail-image') ; ?></a>
                </div>
                <div class="news-post">
                  <h4><a class="text-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <span><?php the_excerpt(); ?></span>
                </div>
                <div class="news-footer">
                  <?php lv1080_posted_on(); ?>
                </div>
              </div>
            </div>
        <?php 
        endwhile;?>
            <!-- /end loop -->
          </div>
          <nav aria-label="Page navigation" class="text-center">
            <?php bootstrap_pagination (); ?>
          </nav>
          <?php
        else :
          get_template_part( 'template-parts/post/content', 'none' );
        endif; ?>
        </div>  <!-- /news list -->
      </div> <!-- /news-page -->
    </div> <!-- /left -->
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>
<?php get_footer();
