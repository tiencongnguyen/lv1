<?php
/* Template Name: Liên hệ */

get_header(); ?>

<?php get_template_part ('template-parts/navigation/breadscrumb', ''); ?><!-- Breadcrumb -->
<?php   while ( have_posts() ) : the_post(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-8">
          <div class="contact-us">
            <?php the_title('<h2 class="page-header">', '</h2>'); ?>
            <?php the_content();?>
          </div>
        </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div> <!-- Container -->
<?php
endwhile; // End of the loop.
get_footer();	?>
