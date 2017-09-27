<?php
/* Template Name: Liên hệ */

get_header(); ?>

<?php get_template_part ('template-parts/navigation/breadscrumb', ''); ?>
<?php   while ( have_posts() ) : the_post(); ?>
<div class="container">
  <div class="contact-page bg-white border-grey pl-1 pr-1 py-3 mb-2">
    <h1 class="header-line text-center">
      <?php the_title('<span>', '</span>'); ?>
    </h1>
    <div class="row">
      <div class="col-md-4">
        <div class="well">
          <h4 class="header-line__orange blue font-16">
            <span>Thông tin liên hệ:</span>
          </h4>
          <div class="media">
            <div class="media-left media-middle">
              <img class="media-object" src="<?php echo get_theme_file_uri('assets/images/contact-location.png'); ?>" alt="">
            </div>
            <div class="media-body">
              <h5 class="media-heading"><strong>Địa chỉ</strong></h5>
              <span class="text-muted"><?php echo get_theme_mod('lv1080_address', 'Tô Hiệu, quận Cầu Giấy, Hà Nội');?></span>
            </div>
          </div>
          <div class="media">
            <div class="media-left media-middle">
              <img class="media-object" src="<?php echo get_theme_file_uri('assets/images/contact-phone.png'); ?>" alt="">
            </div>
            <div class="media-body">
              <h5 class="media-heading"><strong>Điện thoại</strong></h5>
              <strong class="text-warning"><?php echo get_theme_mod('lv1080_phonenumber', '096 999 1080'); ?></strong>
            </div>
          </div>
          <div class="media">
            <div class="media-left media-middle">
              <img class="media-object" src="<?php echo get_theme_file_uri('assets/images/contact-mail.png'); ?>" alt="">
            </div>
            <div class="media-body">
              <h5 class="media-heading"><strong>Email</strong></h5>
              <span class="text-muted"><?php echo get_theme_mod('lv1080_email', 'luanvan1080@gmail.com'); ?></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="well">
          <h4 class="header-line__orange blue font-16">
            <span>Gửi thông tin cho chúng tôi</span>
          </h4>
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
endwhile; // End of the loop.
get_footer();	?>
