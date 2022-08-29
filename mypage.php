<?php
mb_internal_encoding("utf8");
session_start();

try {
  $pdo = new  PDO("mysql:dbname=php_lesson01; host=localhost;", "root", "");
} catch (PDOException $e) {
  die("
  <p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスができません。<br>しばらくしてから再度ログインしてください。</p>
  <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>
  ");
}

if (empty($_SESSION['id'])) {
  $stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");
  $stmt->bindValue(1, $_POST['mail']);
  $stmt->bindValue(2, $_POST['password']);

  $stmt->execute();
  $pdo = NULL;

  while ($row = $stmt->fetch()) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
  }

  if (empty($_SESSION['id'])) {
    header("Location:login_error.php");
  }

  //ログイン保持にチェックがついていた場合
  if (!empty($_POST['login_keep'])) {
    $_SESSION['login_keep'] = $_POST['login_keep'];
  }

  if (!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
    setcookie('mail', $_SESSION['mail'], time() + 60 * 60 * 24 * 7);
    setcookie('password', $_SESSION['password'], time() + 60 * 60 * 24 * 7);
    setcookie('login_keep', $_SESSION['login_keep'], time() + 60 * 60 * 24 * 7);
  } else {
    setcookie('mail', '', time() - 1);
    setcookie('password', '', time() - 1);
    setcookie('login_keep', '', time() - 1);
  }
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  <title>マイページ登録</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="mypage.css">
</head>

<body>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="login.php">ログイン</a></div>
  </header>

  <main>
    <div class="form">
      <div class="form_contents">
        <h2>会員情報</h2>
        <a class="logout" href="log_out.php">ログアウト</a>
        <p class="kakunin"><?php echo $_SESSION['name']; ?>さん こんにちは</p>

        <div class="main_wrapper">
          <img class="image" src="<?php echo $_SESSION['picture'];?>">
          <div class="info">
            <p>氏名 : <?php echo $_SESSION['name']; ?></p>
            <p>メールアドレス : <?php echo $_SESSION['mail']; ?></p>
            <p>パスワード : <?php echo $_SESSION['password']; ?></p>
          </div>
        </div>

        <p class="comments">
        <?php echo $_SESSION['comments']; ?>
        </p>

        <form action="mypage_hensyu.php" method="post">
          <input type="hidden" value="<?php echo rand(1, 10); ?>" name="from_mypage">
          <input class="submit_button" type="submit" size="35" value="編集する">
        </form>

      </div>
    </div>

    
  </main>

  <footer>
    <small>&copy; 2018 InterNous.inc. All rights reserved</small>
  </footer>

</body>

</html>