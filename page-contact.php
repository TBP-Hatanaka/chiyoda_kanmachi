<?php
$header_args = array(
    'page_title'   => '千代田観光まちづくり実行委員会とは',
    'current_page' => 'contact',
);
get_header( null, $header_args );
?>
<article class="main">
  <section id="mvarea"> <img src="../img/common/mv.jpg" alt="千代田写真"> </section>
  <section id="cantainer">
    <div class="wrap">
      <h2><strong><img src="../img/ttl/ttl_inquiry.png" alt="お問い合わせ"></strong></h2>
      <p> <span class="req">※</span>は必須項目です。</p>
        
<form id="main_contact" method="post" action="confirm.php">
    
  <table>
      <tr>
     <th><label for="name">お名前<span class="req">※</span>
      </label>
    </th>
      <td><input type="text" class="validate  required" id="name" name="name" value="お名前">
        <span class="error">正しい名前を記入してください。</span></td>
    </tr>
      <tr>
      <th><label for="company">企業名
      </label>
    </th>
      <td>
      <input type="text" class=" validate " id="company" name="company"  value="企業名">
        <span class="error">正しい企業名を記入してください。</span></td>
    </tr>
      <tr>
      <th><label for="tel">電話番号
      </label>
    </th>
      <td>
      <input type="text" class="validate max30 tel " id="tel" name="tel" value="電話番号">
        <span class="error">正しい電話番号を記入してください。</span></td>
    </tr>
      <tr>
      <th>
      <label for="email">メールアドレス<span class="req">※</span>
      </label>
    </th>
      <td>
      <input type="text" class=" validate mail required" id="email" name="email" value="メールアドレス">
        <span class="error">正しいメールアドレスを記入してください。</span></td>
    </tr>
      <tr>
      <th>
      <label for="email_check">メールアドレス（確認用） <span class="req">※</span>
      </label>
    </th>
      <td>
      <input type="text" class=" validate email_check required" id="email_check" name="email_check"  value="メールアドレス（確認用）">
        <span class="error">正しいメールアドレスを記入してください。</span></td>
    </tr>
      <tr>
      <th>
      <label for="body">お問い合わせ内容<span class="req">※</span>
      </label>
    </th>
      <td>
     <p>500文字まで</p>
      <textarea class=" validate max500 required" id="body" name="body"  rows="3">問い合わせ内容</textarea>
        <span class="error">正しい問い合わせ内容を記入してください。</span></td>
    </tr>
    </table>
    <button type="submit" class="btn btn-primary">確認画面へ</button>
    <input type="hidden" name="ticket" value="確認画面">
  </form>
    </div>
  </section>
</article>

<footer class="bg_g">
  <div class="wrap">
    <div class="f-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/logo_c.png' ); ?>" alt="千代田観光まちづくり実行委員会"></a></div>
    <div class="f-navi"><a href="<?php echo esc_url( home_url( '/index.php#event' ) ); ?>">イベント</a><a href="<?php echo esc_url( home_url( '/about.php' ) ); ?>">千代田観光まちづくり実行委員会とは</a><a href="<?php echo esc_url( home_url( '/inquiry/contact.php' ) ); ?>">お問い合わせ</a><a href="<?php echo esc_url( home_url( '/privacy.php' ) ); ?>">プライバシーポリシー</a> </div>
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