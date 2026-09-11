<?php
$header_args = array(
    'page_title'   => 'プライバシーポリシー',
    'current_page' => 'privacy',
);
get_header( null, $header_args );
?>
<article class="main">
  <section id="mvarea">
    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/mv.jpg' ); ?>" alt="千代田写真">
  </section>

  <section id="policy">
    <div class="wrap">
      <h2>
        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_privacy.png' ); ?>" alt="プライバシーポリシー">
      </h2>
      <p>千代田観光まちづくり実行委員会は、個人情報について個人情報保護に関する法令及びその他の規範を遵守いたします。</p>
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
