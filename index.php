<?php get_header( null, array( 'current_page' => 'home' ) ); ?>
<article class="main">
  <section id="mvarea">
      <img src="<?php the_field('index_image'); ?>" alt="<?php the_field('index_image_alt'); ?>" class="pc">
      <img src="<?php the_field('index_image_sp'); ?>" alt="<?php the_field('index_image_alt'); ?>" class="sp">
      <p>写真協力：千代田区広報広聴課</p>
  </section>
  
  <section id="news">
    <div class="wrap">
      <h2>
        <strong><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_news.png' ); ?>" alt="News"></strong>
      </h2>
      <?php if ( have_rows( 'index_news' ) ) : ?>
        <?php
        $news_icons = array(
            'standard'     => '/img/common/ic_arrowt_p.png',
            'internallink' => '/img/common/ic_arrow_p.png',
            'weblink'      => '/img/common/ic_hyper.png',
            'pdf'          => '/img/common/ic_pdf.png',
        );
        ?>
        <table class="news-table">
          <tbody>
            <?php while ( have_rows( 'index_news' ) ) : the_row(); ?>
              <?php
              $news_type = get_sub_field( 'index_news1' );
              $news_date = get_sub_field( 'index_news2' );
              $news_title = get_sub_field( 'index_news3' );
              $news_detail = get_sub_field( 'index_news4' );
              $news_url = get_sub_field( 'index_news5' );
              $news_row_index = get_row_index();
              $news_detail_id = 'news-detail-' . $news_row_index;
              $news_icon_url = isset( $news_icons[ $news_type ] )
                  ? get_stylesheet_directory_uri() . $news_icons[ $news_type ]
                  : '';
              ?>
              <tr class="news-table__summary">
                <td class="news-table__date">
                  <a class="news_link" href="<?php echo esc_url( $news_url ); ?>" target="_blank"><?php the_sub_field('index_news2'); ?></a>
                </td>
                <td class="news-table__title">
                  <a class="news_link" href="<?php echo esc_url( $news_url ); ?>" target="_blank"><?php the_sub_field('index_news3'); ?></a>
                </td>
                <td class="news-table__icon">
                  <?php if ( 'standard' === $news_type && $news_icon_url ) : ?>
                    <button class="news-toggle" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $news_detail_id ); ?>" aria-label="詳細を表示">
                      <img class="news_icon" src="<?php echo esc_url( $news_icon_url ); ?>" alt="">
                    </button>
                  <?php elseif ( $news_icon_url ) : ?>
                    <a class="news_link" href="<?php echo esc_url( $news_url ); ?>" target="_blank">
                      <img class="news_icon" src="<?php echo esc_url( $news_icon_url ); ?>" alt="">
                    </a>
                  <?php endif; ?>
                </td>
              </tr>
              <?php if ( 'standard' === $news_type ) : ?>
                <tr id="<?php echo esc_attr( $news_detail_id ); ?>" class="news-table__detail" hidden>
                  <td>
                  </td>
                  <td colspan="2"><?php the_sub_field('index_news4'); ?></td>
                </tr>
              <?php endif; ?>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php endif; ?>
  </section>

  <section id="news">
    <div class="wrap">
      <h2>
        <strong>
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_news.png' ); ?>" alt="News">
        </strong>
      </h2>
          <dl class="faq">
            <dt>
               <span class="date">2026/03/31</span>
              <p>３月２９日（日）に運行しましたシャトルバス「さくら祭り号」のトラブルについて</p>
            </dt>
            <dd>
		<b>３月２９日（日）に運行しましたシャトルバス「さくら祭り号」のトラブルに伴い時刻とおりに運行が出来なくなったことで関係者の皆様やご利用された皆様に大変ご迷惑をお掛けしたことをお詫びいたします。</b><br>
            </dd>
          </dl>
          <dl class="faq">
            <dt>
               <span class="date">2026/03/19</span>
              <p>『千代田さくら祭り2026公式ガイドMAP』の訂正とお詫びについて</p>
            </dt>
            <dd>
		<b>P04「千代田さくら祭り全体MAP」に記載の「菱東産業」様の所在地が誤っておりました。<br>
                   関係者の皆様や読者の皆様には大変ご迷惑をお掛けしたことをお詫び申し上げます。<p>

                   正式には「東京都千代田区一番町１９　全国農業共済会館」所在地は<a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/pdf/owabi_2026.pdf' ); ?>" target="_blank">添付のとおり</a>です。</b><br>
            </dd>
          </dl>
          <dl class="faq">
            <div class="faq2">
            <a href="https://note.com/kanmachi" target="_blank">
              <span class="date">2026/03/11</span><p>『千代田観光まちづくり公式note』開設！<br>千代田さくら祭り2026公式ガイドMAPやイベントに関する情報はこちらからご確認いただけます。<br>
		</p>
            </a>
        </div>
            <div class="faq2">
            <a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/guidemap2026/index.html' ); ?>" target="_blank">
              <span class="date">2026/03/11</span><p>『千代田さくら祭り2026公式ガイドMAPデジタルブック版』はこちらからご覧いただけます。<br>
		</p>
            </a>
        </div>
            <dt>
               <span class="date">2025/10/20</span>
              <p>千代田さくら祭り2026公式ガイドMAP　掲載広告（新規）募集のご案内</p>
            </dt>
          </dl>

　　　 <div class="faq2">
            <a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/pdf/sakura2025kotae.pdf' ); ?>" target="_blank">
              <span class="date">2025/05/15</span><p>「千代田さくら祭り2025公式ガイドMAP」に掲載の「千代田の謎」（P20-P21）の答えはこちらです！<br>
		千代田の謎の答え（PDF）</p>
            </a>
        </div>
	<dl class="faq">
            <dt>
               <span class="date">2025/03/11</span>
              <p>「ちよだよりみちさんぽ2025」サイトを公開しました</p>
            </dt>
            <dd>
              昨年に引き続き、千代田区内の大学生が「千代田さくら2025ガイドMAP」に掲載するコンテンツとしてサイトを企画しました。<br />
詳しくは<a href="https://kanmachi.com/yorimichi2025/" target="_blank">「ちよだよりみちさんぽ2025」サイト</a>をご覧ください。
            </dd>
          </dl>
        <!--/faqここまで-->

	<dl class="faq">
            <dt>
               <span class="date">2025/03/11</span>
              <p>無料シャトルバスさくら祭り号の運行、千代田さくら祭り2025公式ガイドMAP配布場所のご案内</p>
            </dt>
            <dd>
		<b>無料シャトルバスさくら祭り号の運行</b><br>
              <a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/pdf/sakura_bus2025.pdf' ); ?>" target="_blank">3月29日（土）・30日（日）の二日間「丸の内シャトルバス」のコースを延伸し「さくら祭り号」を運行</a>します。乗り降り自由ですのでぜひ千代田区内の回遊にご利用ください！<br /><br />
		<b>千代田さくら祭り2025公式ガイドMAP</b><br>
		毎年20万部を発行している<a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/pdf/sakura_bus2025.pdf' ); ?>" target="_blank">千代田さくら祭り2025公式ガイドMAPを今年も配布</a>します。<br><br>
		さくら祭り号、公式ガイドMAPの詳しい情報は<a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/pdf/sakura_bus2025.pdf' ); ?>" target="_blank">こちら</a>からご覧いただけます。<br>
		※時刻表はあくまで目安です。道の混雑状況により大幅に遅れる可能性がございます。<br>
		※配布場所ですでに配布終了の場合はご了承ください。
            </dd>
          </dl>
        <!--/faqここまで-->
	<div class="faq2">
            <a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/guidemap2025/index.html' ); ?>" target="_blank">
              <span class="date">2025/03/11</span><p>『千代田さくら祭り2025公式ガイドMAPデジタルブック版』はこちらからご覧いただけます。<br>
		</p>
            </a>
        </div>

	<div class="faq2">
            <a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/pdf/sakura2025.pdf' ); ?>" target="_blank">
              <span class="date">2024/11/22</span><p>千代田さくら祭り2025公式ガイドMAP　掲載広告（新規）募集のご案内<br>
		問合せ先：千代田観光まちづくり実行委員会<br>
		構成団体：東京商工会議所千代田支部／千代田区観光協会／千代田区商工業連合会／千代田区商店街連合会<br>
		Tel　03-5244-5135　Fax　03-5244-5136　Email　kanmachi2@chiyoda-shokoren.com（pdf）</p>
            </a>
        </div>

	<div class="faq2">
            <a href="<?php echo esc_url( get_stylesheet_directory_uri() . '/pdf/timetravelers.pdf' ); ?>" target="_blank">
              <span class="date">2024/11/05</span><p>（第５回千代田お弁当大賞）<br>
「デジタルスタンプラリー、千代田タイムトラベラーズ・ツアー2024-2025グルメ編」を開催！<br>
2024年11月6日（水）～2025年2月5日（水）（pdf）</p>
            </a>
        </div>
        <hr>
    </div>
  </section>

  <section id="event" class="bg_g">
    <div class="wrap">
      <h2>
        <strong><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_event.png' ); ?>" alt="開催中のイベント一覧"></strong>
      </h2>
      <ul class="flex">
        <?php if( have_rows('index_event') ): ?>
          <?php while ( have_rows('index_event') ) : the_row(); ?>
            <?php $event_url = get_sub_field( 'index_event4' ); ?>
            <li>
              <?php if ( $event_url ) : ?>
                <a href="<?php echo esc_url( $event_url ); ?>" target="_blank">
                  <img src="<?php the_sub_field('index_event3'); ?>" alt="<?php the_sub_field('index_event1'); ?>">
                  <h4><?php the_sub_field('index_event1'); ?></h4>
                  <p><?php the_sub_field('index_event2'); ?></p>
                </a>
              <?php else : ?>
                <img src="<?php the_sub_field('index_event3'); ?>" alt="<?php the_sub_field('index_event1'); ?>">
                <h4><?php the_sub_field('index_event1'); ?></h4>
                <p><?php the_sub_field('index_event2'); ?></p>
              <?php endif; ?>
            </li>
          <?php endwhile; ?>
      <?php endif; ?>
    </ul>
  </section>

  <section id="top_about" class="bg_p"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
    <div class="wrap">
     <p><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_about_pc.png' ); ?>" alt="千代田観光まちづくり実行委員会とは" class="pc"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_about_sp.png' ); ?>" alt="千代田観光まちづくり実行委員会とは" class="sp"></p>
    </div></a>
  </section>
  <section id="top_inq">
    <div class="wrap bg_gr" style="background-image: url('<?php the_field('index_image2'); ?>');">
      <h2><strong><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/ttl/ttl_inquiry.png' ); ?>" alt="お問い合わせ"></strong></h2>
        <div class="btnarea">
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn">お問い合わせフォームはこちら</a></div>
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
