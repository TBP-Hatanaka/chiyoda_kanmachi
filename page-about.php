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
      <?php if( have_rows('about_contents') ): ?>
        <?php while ( have_rows('about_contents') ) : the_row(); ?>
          <?php if( get_row_layout() == 'about_contents1' ): ?>
            <p><?php the_sub_field('about_text'); ?></p>
          <?php endif; ?>
          <?php if( get_row_layout() == 'about_contents2' ): ?>
            <ul class="flex">
              <li>
                <img src="<?php the_sub_field('about_image2'); ?>" alt="<?php the_sub_field('about_image_alt'); ?>">
              </li>
              <li>
                <p><?php the_sub_field('about_text'); ?></p>
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
  </section>


  <section id="container">
    <div class="wrap">
      <h2><strong><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_about_pc.png' ); ?>"  alt="千代田観光まちづくり実行委員会とは" class="pc">
      
      <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_about_sp.png' ); ?>" alt="千代田観光まちづくり実行委員会とは" class="sp"></strong></h2>
         <div class="intro">
        <p>　東京商工会議所千代田支部と千代田区工業団体連合会（現千代田区商工業連合会）は千代田区内の中小企業者の活性化に向けて2002年から三ヶ年、業種による交流会「ビジネス情報交歓会」を開催しました。そこで到達した「観光をテーマにした商工業の活性化を図る」を具現化する形として2005年に千代田区観光協会を加えて「千代田観光まちづくり実行委員会」を発足させました。</p>
       
       <ul class="flex">
           <li><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/about/photo01.jpg' ); ?>" alt="千代田のさくらまつり・船"></li>
           <li><p>2006年から千代田区の支援を受け『千代田のさくらまつり』では<strong>「公式ガイドMAP」</strong>20万部の制作、<strong>「無料シャトルバス」</strong>の運行などに取り組み、2020年に15年目を迎えました。<br>
               この間に2011年～2015年には『神田古本祭り』や『神保町ブックフェスティバル』『神田スポーツ祭り』とも連携した『千代田の秋まつり』バージョンも実施し、「公式ガイドMAP」を8万部作成と「無料シャトルバス」の運行も行ってきました。
</p></li>
        </ul>
            <p><strong>「公式ガイドMAP」</strong>は、区内の店舗情報やイベント情報、さらには花の道MAPを掲載し、トータル発行部数は約三百万部を超えており、桜の季節に千鳥ヶ淵をはじめ千代田区を訪れる多くの方々の手に渡り、さくら祭りの来場者から毎年好評をいただいています。</p> 
             
       <ul class="flex reverse">
           <li><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/about/photo02.jpg' ); ?>" alt="さくら祭り号"></li>
           <li><p>日の丸自動車興行や大丸有エリアマネージメント協会の協力を得て運行している<strong>「無料シャトルバス・さくら祭り号」</strong>は、日本橋への延伸、シャトルシップや古書店街等と連携を深め、区内巡り事業にも取り組んでまいりました。</p></li>
        </ul>
             
       <p>また、さくら祭りの時期に行われるイベント関係者や区内で活動される団体などと情報を交換し連携を深め更なる活性化を図るために運営委員会という組織を立上げおり、今では30団体が参加していただいています。</p>

        <p>2020年にはオリンピック・パラリンピックの気運を高める事業も計画が進められていましたが、コロナ禍でオリンピック・パラリンピックが延期になり、2020年の本事業も中止といたしました。<br>
コロナ禍で、窮地に立たされた飲食店を支援するため千代田区商店街連合会、麹町・神田の料飲組合などの支援をいただき「千代田お弁当大賞」を開催しています。</p>
             
        <p>千代田観光まちづくり実行委員会は、これからも地域の商工業者と街の活性化に向けて取り組んでいきます。</p>
        </div>
        
        <div class="info"> <strong>千代田観光まちづくり実行委員会</strong><br>
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