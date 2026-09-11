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
              $has_news_url = is_string( $news_url ) && '' !== trim( $news_url );
              $news_row_index = get_row_index();
              $news_detail_id = 'news-detail-' . $news_row_index;
              $news_icon_url = isset( $news_icons[ $news_type ] )
                  ? get_stylesheet_directory_uri() . $news_icons[ $news_type ]
                  : '';
              ?>
              <tr class="news-table__summary">
                <td class="news-table__date">
                  <?php if ( $has_news_url ) : ?>
                    <a class="news_link" href="<?php echo esc_url( $news_url ); ?>" target="_blank"><?php echo esc_html( $news_date ); ?></a>
                  <?php else : ?>
                    <p class="news_link"><?php echo esc_html( $news_date ); ?></p>
                  <?php endif; ?>
                </td>
                <td class="news-table__title">
                  <?php if ( $has_news_url ) : ?>
                    <a class="news_link" href="<?php echo esc_url( $news_url ); ?>" target="_blank"><?php the_sub_field('index_news3'); ?></a>
                  <?php else : ?>
                    <p class="news_link"><?php the_sub_field('index_news3'); ?></p>
                  <?php endif; ?>
                </td>
                <td class="news-table__icon">
                  <?php if ( 'standard' === $news_type && $news_icon_url ) : ?>
                    <button class="news-toggle" type="button" aria-expanded="false" aria-controls="<?php echo esc_attr( $news_detail_id ); ?>" aria-label="詳細を表示">
                      <img class="news_icon" src="<?php echo esc_url( $news_icon_url ); ?>" alt="">
                    </button>
                  <?php elseif ( $news_icon_url && $has_news_url ) : ?>
                    <a class="news_link" href="<?php echo esc_url( $news_url ); ?>" target="_blank">
                      <img class="news_icon" src="<?php echo esc_url( $news_icon_url ); ?>" alt="">
                    </a>
                  <?php elseif ( $news_icon_url ) : ?>
                    <img class="news_icon" src="<?php echo esc_url( $news_icon_url ); ?>" alt="">
                  <?php endif; ?>
                </td>
              </tr>
              <?php if ( 'standard' === $news_type ) : ?>
                <tr id="<?php echo esc_attr( $news_detail_id ); ?>" class="news-table__detail" hidden>
                  <td>
                  </td>
                  <td colspan="2">
                    <div class="news-table__detail-inner">
                      <img class="news-table__detail__icon" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/ic_qanda_a.png' ); ?>">
                      <div>
                        <p class="news-table__text"><?php the_sub_field('index_news4'); ?></p>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endif; ?>
            <?php endwhile; ?>
          </tbody>
        </table>
      <?php endif; ?>
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
