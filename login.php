<?php
session_start();
if(isset($_SESSION['id'])){
  header("Location:mypage.php");
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

  <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="login.php">ログイン</a></div>
  </header>

  <main>
    <form action="mypage.php" method="post">
      <div class="formbox">
        <label class="form_title" for="mail">メールアドレス</label>
        <input class="form_text" type="text" name="mail" id="mail" value="<?php 
          if(!empty($_COOKIE['login_keep'])){
            echo $_COOKIE['mail'];
          }
        ?>">
      </div>

      <div class="formbox">
        <label class="form_title" for="password">パスワード</label>
        <input class="form_text" type="password" name="password" id="password" value="<?php 
          if(!empty($_COOKIE['login_keep'])){
            echo $_COOKIE['password'];
          }
        ?>">
      </div>

      <label class="form_checkbox" for="login_keep">
        <input type="checkbox" name="login_keep" value="login_keep" id="login_keep" <?php 
          if(!empty($_COOKIE['login_keep'])){
            echo "checked='checked'";
          }
        ?>>
        ログイン状態を保持する
      </label>

      <a class="register" href="register.php">新規登録はこちら</a>

      <input class="submit_button" type="submit" value="ログイン">
    </form>
  </main>

  <footer>
    <small>&copy; 2018 InterNous.inc. All rights reserved</small>
  </footer>

</body>

</html>