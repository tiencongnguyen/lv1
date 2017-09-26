<?php
if(isset($_POST['sign_contact'])) {
  $sign_contact = $_POST['sign_contact'];
  if (!lv1080_verify_sign ($sign_contact, $postId) ) {
    echo 'Vui lòng tải lại trang để gửi liên hệ' . $sign_contact . ':' . $postId; return;
  };
  $name = (isset($_POST['your_name'])) ? trim($_POST['your_name']) : '';
  $email = (isset($_POST['your_email'])) ? trim($_POST['your_email']) : '';
  $phonenumber = (isset($_POST['your_phonenumber'])) ? trim($_POST['your_phonenumber']) : '';
  $message = (isset($_POST['your_message'])) ? trim($_POST['your_message']) : '';

  $emailTo = get_option('admin_email');
  $subject = '[PHP Snippets] From '.$name;
  $body = "Liên hệ mới từ " . get_permalink();
  $body .= "\n\nName: $name \n\nEmail: $email \n\Điện thoại: $phonenumber \n\nNội dung: $message";
  $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

  $emailSent = wp_mail($emailTo, $subject, $body, $headers);

  if ($emailSent) {
    echo '<p class="success">Cảm ơn bạn đã gửi thông tin, chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất.</p>';
  } else {
    echo '<p class="error"> Có lỗi trong quá trình gửi mail. </p><p>Liên hệ để tư vấn miễn phí:</p>
            <p><i class="fa fa-phone"></i> Hotline: '. get_theme_mod ('lv1080_phonenumber', '0938271989') . ' (Zalo, Viber, Imess)</p>
            <p><i class="fa fa-envelope-o"></i> Gmail: '. get_theme_mod ('lv1080_email', '0938271989') . '</p>';
  }
} else {?>
<div class="form-action">
            <h4 class="page-header text-info">Gửi thông tin cho chúng tôi</h4>
            <div class="row">
            <form action="<?php the_permalink(); ?>" id="contactForm" method="post">
              <input type="hidden" name="sign_contact" value="<?php echo lv1080_sign($postId); ?>">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Tên của bạn <span class="text-danger">(*)</span></label>
                  <input name="your_name" type="text" class="form-control" id="" required="" placeholder="Tên của bạn">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Số điện thoại của bạn <span class="text-danger">(*)</span></label>
                  <input name="your_phonenumber" type="tel" class="form-control" id="" required="" placeholder="Số điện thoại của bạn">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Email của bạn <span class="text-danger">(*)</span></label>
                  <input name="your_email" type="email" class="form-control" id="" required="" placeholder="Email của bạn">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Nội dung yêu cầu <span class="text-danger">(*)</span></label>
                  <textarea name="your_message" class="form-control" required="" minlength="" placeholder="Nội dung yêu cầu"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success"><strong>Gửi cho tôi</strong></button>
                  <button type="reset" class="btn btn-info">Làm lại</button>
                </div>
              </div>
            </form>
            </div> <!-- row -->
          </div>
<?php }?>