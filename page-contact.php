<?php
if ( PHP_SESSION_ACTIVE !== session_status() ) {
  session_start();
}
require_once __DIR__ . '/libs/functions.php';

$name = isset( $_SESSION[ 'name' ] ) ? $_SESSION[ 'name' ] : NULL;
$company = isset( $_SESSION[ 'company' ] ) ? $_SESSION[ 'company' ] : NULL;
$email = isset( $_SESSION[ 'email' ] ) ? $_SESSION[ 'email' ] : NULL;
$email_check = isset( $_SESSION[ 'email_check' ] ) ? $_SESSION[ 'email_check' ] : NULL;
$tel = isset( $_SESSION[ 'tel' ] ) ? $_SESSION[ 'tel' ] : NULL;
$body = isset( $_SESSION[ 'body' ] ) ? $_SESSION[ 'body' ] : NULL;
$error = isset( $_SESSION[ 'error' ] ) ? $_SESSION[ 'error' ] : NULL;

$error_name = isset( $error[ 'name' ] ) ? $error[ 'name' ] : NULL;
$error_company = isset( $error[ 'company' ] ) ? $error[ 'company' ] : NULL;
$error_email = isset( $error[ 'email' ] ) ? $error[ 'email' ] : NULL;
$error_email_check = isset( $error[ 'email_check' ] ) ? $error[ 'email_check' ] : NULL;
$error_tel = isset( $error[ 'tel' ] ) ? $error[ 'tel' ] : NULL;
$error_tel_format = isset( $error[ 'tel_format' ] ) ? $error[ 'tel_format' ] : NULL;
$error_body = isset( $error[ 'body' ] ) ? $error[ 'body' ] : NULL;

if ( !isset( $_SESSION[ 'ticket' ] ) ) {
  $_SESSION[ 'ticket' ] = sha1( uniqid( mt_rand(), TRUE ) );
}
$ticket = $_SESSION[ 'ticket' ];

$header_args = array(
    'page_title'   => 'お問い合わせ',
    'current_page' => 'contact',
);
get_header( null, $header_args );
?>

<article class="main">
  <section id="mvarea">
    <img src="<?php the_field('contact_image'); ?>" alt="千代田写真" class="pc">
  </section>

  <section id="cantainer">
    <div class="wrap">
      <h2>
        <strong><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_contact.png' ); ?>" alt="お問い合わせ"></strong>
      </h2>
      <p> <span class="req">※</span>は必須項目です。</p>
      <form id="main_contact" method="post" action="<?php echo esc_url( home_url( '/confirm/' ) ); ?>">
        <table>
          <tr>
            <th>
              <label for="name">お名前<span class="req">※</span></label>
            </th>
            <td>
              <input type="text" class="validate  required" id="name" name="name" value="">
              <span class="error">正しい名前を記入してください。</span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="company">企業名</label>
            </th>
            <td>
              <input type="text" class=" validate " id="company" name="company"  value="">
              <span class="error">正しい企業名を記入してください。</span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="tel">電話番号</label>
            </th>
            <td>
              <input type="text" class="validate max30 tel " id="tel" name="tel" value="">
              <span class="error">正しい電話番号を記入してください。</span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="email">メールアドレス<span class="req">※</span></label>
            </th>
            <td>
              <input type="text" class=" validate mail required" id="email" name="email" value="">
              <span class="error">正しいメールアドレスを記入してください。</span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="email_check">メールアドレス（確認用） <span class="req">※</span></label>
            </th>
            <td>
              <input type="text" class=" validate email_check required" id="email_check" name="email_check"  value="">
              <span class="error">正しいメールアドレスを記入してください。</span>
            </td>
          </tr>
          <tr>
            <th>
              <label for="body">お問い合わせ内容<span class="req">※</span></label>
            </th>
            <td>
              <p>500文字まで</p>
              <textarea class=" validate max500 required" id="body" name="body"  rows="3"></textarea>
              <span class="error">正しい問い合わせ内容を記入してください。</span>
            </td>
          </tr>
        </table>
        <button type="submit" class="btn btn-primary">確認画面へ</button>
        <input type="hidden" name="ticket" value="<?php echo esc_attr( $ticket ); ?>">
      </form>
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
