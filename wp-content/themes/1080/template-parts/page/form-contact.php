<div class="form-contact">
<h2 class="text-center text-uppercase"><?php echo get_theme_mod('home_contact_title', 'Gửi thông tin cho chúng tôi');?></h2>
<?php 
  $contactFrom = get_theme_mod('home_contact_form', '[contact-form-7 id="62"]'); 
  echo do_shortcode($contactFrom);
?>

</div>