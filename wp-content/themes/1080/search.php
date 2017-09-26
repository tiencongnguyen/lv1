<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TienCongNguyen
 * @subpackage Lv1080
 * @since 1.0
 * @version 1.0
 */

get_header();?>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
<?php	if ( have_posts() ) : ?>
          <div class="news-list">
            <ul class="list-default">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post(); ?>

				    <li class="row">
              <div class="col-sm-3 col-md-3">
                <a href="<?php the_permalink(); ?>">
                  <?php echo lv1080_get_post_thumbnail (null, array (190, 114), array ('class', 'news-image')) ; ?>
                </a>
              </div>
              <div class="col-sm-9 col-md-9">
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <div class="block-timer clearfix">
                  <div class="pull-left text-muted"><?php echo lv1080_time_link(); ?></div>
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
          </div>
    <?php
      else :
        get_template_part( 'template-parts/post/content', 'none' );
      endif; ?>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div> <!-- Container -->
<?php get_footer();
