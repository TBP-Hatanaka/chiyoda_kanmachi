<?php
/**
 * Common site header.
 *
 * Optional values in $args:
 * page_title   Page-specific title.
 * current_page One of home, about, or contact.
 */

$current_page = isset( $args['current_page'] ) ? $args['current_page'] : 'home';
$page_title = isset( $args['page_title'] ) ? $args['page_title'] : '';
$default_title = '千代田観光まちづくり実行委員会 千代田区の観光、商業振興、地域活性化に向けた活動をしています';
$document_title = $page_title ? '千代田観光まちづくり実行委員会｜' . $page_title : $default_title;
$body_id = 'contact' === $current_page ? 'inquiry' : $current_page;
$page_css = array(
    'home'    => 'top.css',
    'about'   => 'about.css',
    'contact' => 'inquiry.css',
);
$stylesheet = isset( $page_css[ $current_page ] ) ? $page_css[ $current_page ] : 'top.css';
$og_type = 'about' === $current_page ? 'article' : 'website';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<meta charset="<?php bloginfo( 'charset' ); ?>"/>
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title><?php echo esc_html( $document_title ); ?></title>
<meta name="keywords" content="千代田観光まちづくり実行委員会,千代田区,観光,千代田のさくらまつり,無料シャトルバス,さくら祭り号"/>
<meta name="description" content="千代田観光まちづくり実行委員会は、千代田区の商工業者と街の活性化に向けて取り組んでおります。"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta property="og:title" content="千代田観光まちづくり実行委員会"/>
<meta property="og:type" content="<?php echo esc_attr( $og_type ); ?>"/>
<meta property="og:description" content="千代田観光まちづくり実行委員会は、千代田区の商工業者と街の活性化に向けて取り組んでおります。"/>
<meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>"/>
<meta property="og:image" content="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/logo.png' ); ?>"/>
<link rel="icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/favicon.ico' ); ?>">
<link rel="apple-touch-icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/apple-touch-icon.png' ); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/apple-touch-icon-precomposed.png' ); ?>"/>
<link href="<?php echo esc_url( get_stylesheet_directory_uri() . '/css/base.css' ); ?>" rel="stylesheet"/>
<link href="<?php echo esc_url( get_stylesheet_directory_uri() . '/css/' . $stylesheet ); ?>" rel="stylesheet"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D3RYS991XQ"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-D3RYS991XQ');
</script>
<?php wp_head(); ?>
</head>

<body id="<?php echo esc_attr( $body_id ); ?>" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
  <div class="wrap">
    <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="千代田観光まちづくり実行委員会"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/logo.png' ); ?>" alt="千代田観光まちづくり実行委員会"></a></h1>

    <nav id="menu_pc" class="pc">
      <ul class="menulist">
        <li><a href="<?php echo esc_url( home_url( '/index.php#event' ) ); ?>">イベント</a></li>
        <li><a href="<?php echo esc_url( home_url( '/about.php' ) ); ?>">千代田観光まちづくり実行委員会とは</a></li>
        <li><a href="<?php echo esc_url( home_url( '/inquiry/contact.php' ) ); ?>">お問い合わせ</a></li>
        <li><a href="https://note.com/kanmachi" rel="nofollow" target="_blank"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/logo_note_n.png' ); ?>" alt="note"></a></li>
        <li><a href="http://www.facebook.com/share.php?u=https://www.chiyoda-event.com/chiyodakankou/" rel="nofollow" target="_blank"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/ic_fb.png' ); ?>" alt="フェイスブック"></a></li>
        <li><a href="https://twitter.com/share?url=https://www.chiyoda-event.com/chiyodakankou/&hashtags=千代田観光まちづくり実行委員会,千代田区,観光&text=千代田観光まちづくり実行委員会は、千代田区の商工業者と街の活性化に向けて取り組んでおります。" rel="nofollow" target="_blank"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/ic_tw.png' ); ?>" alt="ツイッター"></a></li>
        <li><a href="https://social-plugins.line.me/lineit/share?url=https://www.chiyoda-event.com/chiyodakankou/" target="_blank"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/ic_line.png' ); ?>" alt="ライン"></a></li>
      </ul>
    </nav>

    <a id="ic_menu" class="sp" href="#">
      <span></span>
      <span></span>
      <span></span>
    </a>
    <nav id="menu_sp" class="sp">
      <ul class="menulist">
        <li><a href="<?php echo esc_url( home_url( '/index.php#event' ) ); ?>">イベント</a></li>
        <li><a href="<?php echo esc_url( home_url( '/about.php' ) ); ?>">千代田観光まちづくり実行委員会とは</a></li>
        <li><a href="<?php echo esc_url( home_url( '/inquiry/contact.php' ) ); ?>">お問い合わせ</a></li>
        <li><a href="<?php echo esc_url( home_url( '/privacy.php' ) ); ?>">プライバシーポリシー</a></li>
      </ul>
      <ul class="menulist2">
        <li><a href="https://note.com/kanmachi" rel="nofollow" target="_blank"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/logo_note_n.png' ); ?>" alt="note"></a></li>
        <li><a href="http://www.facebook.com/share.php?u=https://www.chiyoda-event.com/chiyodakankou/" rel="nofollow" target="_blank"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/ic_fb.png' ); ?>" alt="フェイスブック"></a></li>
        <li><a href="https://twitter.com/share?url=https://www.chiyoda-event.com/chiyodakankou/&hashtags=千代田観光まちづくり実行委員会,千代田区,観光&text=千代田観光まちづくり実行委員会は、千代田区の商工業者と街の活性化に向けて取り組んでおります。" rel="nofollow" target="_blank"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/ic_tw.png' ); ?>" alt="ツイッター"></a></li>
        <li><a href="https://social-plugins.line.me/lineit/share?url=https://www.chiyoda-event.com/chiyodakankou/" target="_blank"><img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/common/ic_line.png' ); ?>" alt="ライン"></a></li>
      </ul>
    </nav>
  </div>
</header>
