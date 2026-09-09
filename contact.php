<?php
//セッションを開始
session_start();

//セッションIDを更新して変更（セッションハイジャック対策）
session_regenerate_id( TRUE );

//エスケープ処理やデータチェックを行う関数のファイルの読み込み
require '../libs/functions.php';

//初回以外ですでにセッション変数に値が代入されていれば、その値を。そうでなければNULLで初期化
$name = isset( $_SESSION[ 'name' ] ) ? $_SESSION[ 'name' ] : NULL;
$company = isset( $_SESSION[ 'company' ] ) ? $_SESSION[ 'company' ] : NULL;
$email = isset( $_SESSION[ 'email' ] ) ? $_SESSION[ 'email' ] : NULL;
$email_check = isset( $_SESSION[ 'email_check' ] ) ? $_SESSION[ 'email_check' ] : NULL;
$tel = isset( $_SESSION[ 'tel' ] ) ? $_SESSION[ 'tel' ] : NULL;
$body = isset( $_SESSION[ 'body' ] ) ? $_SESSION[ 'body' ] : NULL;
$error = isset( $_SESSION[ 'error' ] ) ? $_SESSION[ 'error' ] : NULL;

//個々のエラーを初期化（$error は定義されていれば配列）
$error_name = isset( $error[ 'name' ] ) ? $error[ 'name' ] : NULL;
$error_company = isset( $error[ 'company' ] ) ? $error[ 'company' ] : NULL;
$error_email = isset( $error[ 'email' ] ) ? $error[ 'email' ] : NULL;
$error_email_check = isset( $error[ 'email_check' ] ) ? $error[ 'email_check' ] : NULL;
$error_tel = isset( $error[ 'tel' ] ) ? $error[ 'tel' ] : NULL;
$error_tel_format = isset( $error[ 'tel_format' ] ) ? $error[ 'tel_format' ] : NULL;
$error_body = isset( $error[ 'body' ] ) ? $error[ 'body' ] : NULL;

//CSRF対策の固定トークンを生成
if ( !isset( $_SESSION[ 'ticket' ] ) ) {
  //セッション変数にトークンを代入
  $_SESSION[ 'ticket' ] = sha1( uniqid( mt_rand(), TRUE ) );
}

//トークンを変数に代入
$ticket = $_SESSION[ 'ticket' ];
?>
<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, user-scalable=yes"/>
<title>千代田観光まちづくり実行委員会｜お問い合わせ</title>
<meta name="keywords" content="千代田観光まちづくり実行委員会,千代田区,観光,千代田のさくらまつり,無料シャトルバス,さくら祭り号"/>
<meta name="description" content="千代田観光まちづくり実行委員会は、千代田区の商工業者と街の活性化に向けて取り組んでおります。"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="twitter:card" content="summary_large_image" />
<meta property="og:title" content="千代田観光まちづくり実行委員会"/>
<meta property="og:type" content="website"/>
<meta property="og:description" content="千代田観光まちづくり実行委員会は、千代田区の商工業者と街の活性化に向けて取り組んでおります。" />
<meta property="og:url" content="https://www.kanmachi.com/"/>
<meta property="og:image" content="https://www.kanmachi.com/img/common/logo.png"/>
<link rel="icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/favicon.ico' ); ?>">
<link rel="apple-touch-icon" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/apple-touch-icon.png' ); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/apple-touch-icon-precomposed.png' ); ?>"/>
<link href="<?php echo esc_url( get_stylesheet_directory_uri() . '/css/base.css' ); ?>" rel="stylesheet"/>
<link href="<?php echo esc_url( get_stylesheet_directory_uri() . '/css/inquiry.css' ); ?>" rel="stylesheet"/>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;700&display=swap" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D3RYS991XQ"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date()); 
gtag('config', 'G-D3RYS991XQ');
</script>
</head>

<body id="inquiry">
<?php include "../inc/header.php"; ?>
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
      <td><input type="text" class="validate  required" id="name" name="name" value="<?php echo h($name); ?>">
        <span class="error"><?php echo h( $error_name ); ?></span></td>
    </tr>
      <tr>
      <th><label for="company">企業名
      </label>
    </th>
      <td>
      <input type="text" class=" validate " id="company" name="company"  value="<?php echo h($company); ?>">
        <span class="error"><?php echo h( $error_company ); ?></span></td>
    </tr>
      <tr>
      <th><label for="tel">電話番号
      </label>
    </th>
      <td>
      <input type="text" class="validate max30 tel " id="tel" name="tel" value="<?php echo h($tel); ?>">
        <span class="error"><?php echo h( $error_tel ); ?></span>
        <span class="error"><?php echo h( $error_tel_format ); ?></span></td>
    </tr>
      <tr>
      <th>
      <label for="email">メールアドレス<span class="req">※</span>
      </label>
    </th>
      <td>
      <input type="text" class=" validate mail required" id="email" name="email" value="<?php echo h($email); ?>">
        <span class="error"><?php echo h( $error_email ); ?></span></td>
    </tr>
      <tr>
      <th>
      <label for="email_check">メールアドレス（確認用） <span class="req">※</span>
      </label>
    </th>
      <td>
      <input type="text" class=" validate email_check required" id="email_check" name="email_check"  value="<?php echo h($email_check); ?>">
        <span class="error"><?php echo h( $error_email_check ); ?></span></td>
    </tr>
      <tr>
      <th>
      <label for="body">お問い合わせ内容<span class="req">※</span>
      </label>
    </th>
      <td>
     <p>500文字まで</p>
      <textarea class=" validate max500 required" id="body" name="body"  rows="3"><?php echo h($body); ?></textarea>
        <span class="error"><?php echo h( $error_body ); ?></span></td>
    </tr>
    </table>
    <button type="submit" class="btn btn-primary">確認画面へ</button>
    <!--確認ページへトークンをPOSTする、隠しフィールド「ticket」-->
    <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>">
  </form>
    </div>
  </section>
</article>
<?php include "../inc/footer.php"; ?>
<script src="<?php echo esc_url( get_stylesheet_directory_uri() . '/js/jquery-1.7.1.min.js' ); ?>"></script> 
<script src="<?php echo esc_url( get_stylesheet_directory_uri() . '/js/common.js' ); ?>"></script>
</body>
</html>
