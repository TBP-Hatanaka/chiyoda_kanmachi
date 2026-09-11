<?php
//セッションを開始
session_start();

//エスケープ処理やデータチェックを行う関数のファイルの読み込み
require '../libs/functions.php';

//POST されたデータをチェック
$_POST = checkInput( $_POST );

//固定トークンを確認（CSRF対策）
if ( isset( $_POST[ 'ticket' ], $_SESSION[ 'ticket' ] ) ) {
  $ticket = $_POST[ 'ticket' ];
  if ( $ticket !== $_SESSION[ 'ticket' ] ) {
    //トークンが一致しない場合は処理を中止
    die( 'Access Denied!' );
  }
} else {
  //トークンが存在しない場合は処理を中止（直接このページにアクセスするとエラーになる）
  die( 'Access Denied（直接このページにはアクセスできません）' );
}

//POSTされたデータを変数に代入
$name = isset( $_POST[ 'name' ] ) ? $_POST[ 'name' ] : NULL;
$company = isset( $_POST[ 'company' ] ) ? $_POST[ 'company' ] : NULL;
$email = isset( $_POST[ 'email' ] ) ? $_POST[ 'email' ] : NULL;
$email_check = isset( $_POST[ 'email_check' ] ) ? $_POST[ 'email_check' ] : NULL;
$tel = isset( $_POST[ 'tel' ] ) ? $_POST[ 'tel' ] : NULL;
$body = isset( $_POST[ 'body' ] ) ? $_POST[ 'body' ] : NULL;


//POSTされたデータを整形（前後にあるホワイトスペースを削除）
$name = trim( $name );
$company = trim( $company );
$email = trim( $email );
$email_check = trim( $email_check );
$tel = trim( $tel );
$body = trim( $body );

//エラーメッセージを保存する配列の初期化
$error = array();

//値の検証（入力内容が条件を満たさない場合はエラーメッセージを配列 $error に設定）
if ( $name == '' ) {
  $error[ 'name' ] = '*お名前は必須項目です。';
  //制御文字でないことと文字数をチェック
} else if ( preg_match( '/\A[[:^cntrl:]]{1,30}\z/u', $name ) == 0 ) {
  $error[ 'name' ] = '*お名前は30文字以内でお願いします。';
}
if ( $email == '' ) {
  $error[ 'email' ] = '*メールアドレスは必須です。';
} else { //メールアドレスを正規表現でチェック
  $pattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/uiD';
  if ( !preg_match( $pattern, $email ) ) {
    $error[ 'email' ] = '*メールアドレスの形式が正しくありません。';
  }
}
if ( $email_check == '' ) {
  $error[ 'email_check' ] = '*確認用メールアドレスは必須です。';
} else { //メールアドレスを正規表現でチェック
  if ( $email_check !== $email ) {
    $error[ 'email_check' ] = '*メールアドレスが一致しません。';
  }
}
if ( preg_match( '/\A[[:^cntrl:]]{0,30}\z/u', $tel ) == 0 ) {
  $error[ 'tel' ] = '*電話番号は30文字以内でお願いします。';
}
if ( $tel != '' && preg_match( '/\A\(?\d{2,5}\)?[-(\.\s]{0,2}\d{1,4}[-)\.\s]{0,2}\d{3,4}\z/u', $tel ) == 0 ) {
  $error[ 'tel_format' ] = '*電話番号の形式が正しくありません。';
}
if ( $body == '' ) {
  $error[ 'body' ] = '*内容は必須項目です。';
  //制御文字（タブ、復帰、改行を除く）でないことと文字数をチェック
} else if ( preg_match( '/\A[\r\n\t[:^cntrl:]]{1,500}\z/u', $body ) == 0 ) {
  $error[ 'body' ] = '*内容は500文字以内でお願いします。';
}

//POSTされたデータとエラーの配列をセッション変数に保存
$_SESSION[ 'name' ] = $name;
$_SESSION[ 'company' ] = $company;
$_SESSION[ 'email' ] = $email;
$_SESSION[ 'email_check' ] = $email_check;
$_SESSION[ 'tel' ] = $tel;
$_SESSION[ 'body' ] = $body;
$_SESSION[ 'error' ] = $error;

//チェックの結果にエラーがある場合は入力フォームに戻す
if ( count( $error ) > 0 ) {
  //エラーがある場合
  $dirname = dirname( $_SERVER[ 'SCRIPT_NAME' ] );
  $dirname = $dirname == DIRECTORY_SEPARATOR ? '' : $dirname;
  $url = ( empty( $_SERVER[ 'HTTPS' ] ) ? 'http://' : 'https://' ) . $_SERVER[ 'SERVER_NAME' ] . $dirname . '/contact.php';
  header( 'HTTP/1.1 303 See Other' );
  header( 'location: ' . $url );
  exit;
}

$header_args = array(
    'page_title'   => 'お問い合わせ確認',
    'current_page' => 'confirm',
);
get_header( null, $header_args );
?>
<article class="main">
  <section id="cantainer">
    <div class="wrap">
      <h2><strong><img src="./img/ttl/ttl_inquiry2.png" alt="お問い合わせ確認"></strong></h2>
      <p>以下の内容でよろしければ「送信する」をクリックしてください。<br>
    内容を変更する場合は「戻る」をクリックして入力画面にお戻りください。</p>
  <div class="table-responsive">
    <table class="table table-bordered">
      <caption>ご入力内容</caption>
      <tr>
        <th>お名前</th>
        <td><p><?php echo h($name); ?></p></td>
      </tr>
      <tr>
        <th>企業名</th>
        <td><p><?php echo h($company); ?></p></td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td><p><?php echo h($email); ?></p></td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td><p><?php echo h($tel); ?></p></td>
      </tr>
      <tr>
        <th>お問い合わせ内容</th>
        <td><p><?php echo nl2br(h($body)); ?></p></td>
      </tr>
    </table>
  </div>
  <form action="page-contact.php" method="post" class="confirm">
    <button type="submit" class="btn btn-secondary">戻る</button>
  </form>
  <form action="page-complete.php" method="post" class="confirm">
    <!-- 完了ページへ渡すトークンの隠しフィールド -->
    <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>">
    <button type="submit" class="btn btn-success">送信する</button>
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
