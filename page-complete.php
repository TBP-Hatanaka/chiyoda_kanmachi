<?php
if ( PHP_SESSION_ACTIVE !== session_status() ) {
  session_start();
}
require_once __DIR__ . '/libs/functions.php';
require_once __DIR__ . '/libs/mailvars.php';

date_default_timezone_set( 'Asia/Tokyo' );

$_POST = checkInput( $_POST );

if ( isset( $_POST[ 'ticket' ], $_SESSION[ 'ticket' ] ) ) {
  $ticket = $_POST[ 'ticket' ];
  if ( $ticket !== $_SESSION[ 'ticket' ] ) {
    die( 'Access denied' );
  }
} else {
  $url = home_url( '/contact/' );
  header( 'HTTP/1.1 303 See Other' );
  header( 'location: ' . $url );
  exit; 
}

$name = h( $_SESSION[ 'name' ] );
$company = h( $_SESSION[ 'company' ] );
$email = h( $_SESSION[ 'email' ] );
$tel = h( $_SESSION[ 'tel' ] );
$body = h( $_SESSION[ 'body' ] );

$mail_body = 'コンタクトページからのお問い合わせ' . "\n\n";
$mail_body .= date( "Y年m月d日 H時i分" ) . "\n\n";
$mail_body .= "お名前： " . $name . "\n";
$mail_body .= "企業名： " . $company . "\n";
$mail_body .= "メールアドレス： " . $email . "\n";
$mail_body .= "電話番号： " . $tel . "\n\n";
$mail_body .= "＜お問い合わせ内容＞" . "\n" . $body;

//-------- sendmail（mb_send_mail）を使ったメールの送信処理------------

$mailTo = mb_encode_mimeheader(MAIL_TO_NAME) ."<" . MAIL_TO. ">";

$returnMail = MAIL_RETURN_PATH; //
mb_language( 'ja' );
mb_internal_encoding( 'UTF-8' );
 
$header = "From: " . mb_encode_mimeheader($name) ."<" . $email. ">";
 
if ( ini_get( 'safe_mode' ) ) {
  $result = mb_send_mail( $mailTo, $subject, $mail_body, $header );
} else {
  $result = mb_send_mail( $mailTo, $subject, $mail_body, $header, '-f' . $returnMail );
}
 
if ( $result ) {
  $_SESSION = array(); 
  session_destroy(); 
  
  $show_autoresponse_msg = true;
  $ar_header = "MIME-Version: 1.0\n";
  $ar_header .= "From: " . mb_encode_mimeheader( AUTO_REPLY_NAME ) . " <" . MAIL_TO . ">\n";
  $ar_header .= "Reply-To: " . mb_encode_mimeheader( AUTO_REPLY_NAME ) . " <" . MAIL_TO . ">\n";
  $ar_subject = 'お問い合わせ自動返信メール';
  $ar_body = $name." 様\n\n";
  $ar_body .= "この度は、お問い合わせ頂き誠にありがとうございます。" . "\n\n";
  $ar_body .= "下記の内容でお問い合わせを受け付けました。\n\n";
  $ar_body .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
  $ar_body .= "お名前：" . $name . "\n";
  $ar_body .= "企業名：" . $company . "\n";
  $ar_body .= "メールアドレス：" . $email . "\n";
  $ar_body .= "お電話番号： " . $tel . "\n\n" ;
  $ar_body .="＜お問い合わせ内容＞" . "\n" . $body;
  
  if ( ini_get( 'safe_mode' ) ) {
    $result2 = mb_send_mail( $email, $ar_subject, $ar_body , $ar_header  );
  } else {
    $result2 = mb_send_mail( $email, $ar_subject, $ar_body , $ar_header , '-f' . $returnMail );
  }
} else {
}
 
$header_args = array(
    'page_title'   => 'お問い合わせ完了',
    'current_page' => 'complete',
);
get_header( null, $header_args );
?>

<article class="main">
  <section id="cantainer">
    <div class="wrap">
      <h2><strong><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_inquiry.png' ); ?>" alt="お問い合わせ"></strong></h2>
      <?php if ( $result ): ?>
        <h3>送信完了!</h3>
        <p>お問い合わせいただきありがとうございます。</p>
        <p>送信完了いたしました。</p>
        <?php if ( $show_autoresponse_msg ): ?>
          <?php if ( $result2 ): ?>
            <p>確認の自動返信メールを <?php echo $email; ?> へお送りいたしました。</p>
          <?php else: ?>
            <p>確認の自動返信メールを送信できませんでした。</p>
          <?php endif; ?>
        <?php endif; ?>
      <?php else: ?>
        <p>申し訳ございませんが、送信に失敗しました。</p>
        <p>しばらくしてもう一度お試しになるか、メールにてご連絡ください。</p>
        <p>ご迷惑をおかけして誠に申し訳ございません。</p>
      <?php endif; ?>
    </div>
  </section>
</article>

<footer class="bg_g">
  <div class="wrap">
    <div class="f-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/logo_c.png' ); ?>" alt="千代田観光まちづくり実行委員会"></a></div>
    <div class="f-navi"><a href="<?php echo esc_url( home_url( '/#event' ) ); ?>">イベント</a><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">千代田観光まちづくり実行委員会とは</a><a href="<?php echo esc_url( home_url( '/inquiry/contact/' ) ); ?>">お問い合わせ</a><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">プライバシーポリシー</a> </div>
  </div>
  <p class="copy">&#169; 千代田観光まちづくり実行委員会</p>
</footer>

<!--画面上部へ-->
<p id="pagetop"><a href="#"></a></p>
<!--//画面上部へ--> 
<script src="<?php echo esc_url( get_stylesheet_directory_uri() . '/js/jquery-1.7.1.min.js' ); ?>"></script> 
<script src="<?php echo esc_url( get_stylesheet_directory_uri() . '/js/common.js' ); ?>"></script>
</body>
</html>
