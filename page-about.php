<?php
$header_args = array(
    'page_title'   => '千代田観光まちづくり実行委員会とは',
    'current_page' => 'about',
);
get_header( null, $header_args );
?>
<article class="main">
  <section id="mvarea">
    <img src="<?php the_field('about_image'); ?>" alt="千代田観光スポット写真" class="pc">
  </section>
  
  <section id="container">
    <div class="wrap">
      <h2>
        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_about_pc.png' ); ?>"  alt="千代田観光まちづくり実行委員会とは" class="pc">
        <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_about_sp.png' ); ?>" alt="千代田観光まちづくり実行委員会とは" class="sp">
      </h2>
      <div class="intro">
        <?php if( have_rows('about_contents') ): ?>
          <?php while ( have_rows('about_contents') ) : the_row(); ?>
            <?php if( get_row_layout() == 'about_contents1' ): ?>
              <p><?php the_sub_field('about_text'); ?></p>
            <?php endif; ?>
            <?php if( get_row_layout() == 'about_contents2' ): ?>
              <ul class="flex">
                <li>
                  <img class="about_image" src="<?php the_sub_field('about_image2'); ?>" alt="<?php the_sub_field('about_image_alt'); ?>">
                </li>
                <li>
                  <?php the_sub_field('about_text'); ?>
                </li>
              </ul>
            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>

      <div class="info">
        <strong>千代田観光まちづくり実行委員会</strong><br>
        <ul>
          <li>構成団体</li>
          <li>東京商工会議所千代田支部<br>
            （一社）千代田区観光協会<br>
            千代田区商工業連合会<br>
            千代田区商店街連合会</li>
          <li class="bdr_d1"></li>
          <li class="bdr_d2"></li>
          <li>事務局</li>
          <li>千代田区商工業連合会内</li>
          <li>所在地</li>
          <li>〒101-0054　千代田区神田錦町3-21　ちよだプラットフォームスクウェア4F</li>
        </ul>
      </div>
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
