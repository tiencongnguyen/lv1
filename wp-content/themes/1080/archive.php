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
<!-- Breadcrumb -->
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="news-list">
        <div class="title-line">
          <?php the_archive_title( '<h1>', '</h1>' ); ?>
        </div>
        <?php if ( have_posts() ) : ?>
          <ul class="list-default">
        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post(); ?>

            <li class="row">
              <div class="col-sm-3 col-md-3">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail (array (300, 200), array('class'=>'news-image')) ; ?>
                </a>
              </div>
              <div class="col-sm-9 col-md-9">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="block-timer clearfix">
                  <div class="pull-left text-muted"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo lv1080_time_link(); ?></div>
                </div>
                <?php the_excerpt(); ?>
              </div>
            </li>

        <?php 
        endwhile;?>
            </ul>
            <nav aria-label="Page navigation" class="text-center">
            <?php bootstrap_pagination (); ?>
            </nav>
    <?php
      else :
        get_template_part( 'template-parts/post/content', 'none' );
      endif; ?>
      </div>
    </div>
    <div class="col-md-4">
    <?php get_sidebar(); ?>
    </div>
  </div>
</div> <!-- Container -->
<?php get_footer();
