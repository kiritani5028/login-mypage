<?php
mb_internal_encoding("utf8");
session_start();

if (empty($_POST['from_mypage'])) {
  header("Location:login_error.php");
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

  <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
</head>

<body>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="login.php">ログイン</a></div>
  </header>

  <main>

    <form action="mypage_update.php" method="post" enctype="multipart/form-data" class="form">
      <div class="form_contents">
        <h2>会員情報</h2>
        <a class="logout" href="log_out.php">ログアウト</a>
        <p class="kakunin"><?php echo $_SESSION['name']; ?>さん こんにちは</p>

        <div class="main_wrapper">
          <img class="image" src="<?php echo $_SESSION['picture']; ?>">
          <div class="info">

            <div class="info_wrap">
              <label for="name">氏名 : </label>
              <input type="text" class="formbox" size="40" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" required>
            </div>

            <div class="info_wrap">
              <label for="mail">メールアドレス : </label>
              <input type="text" class="formbox" size="40" name="mail" id="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['mail']; ?>" required>
            </div>

            <div class="info_wrap">
              <label for="password">パスワード : </label>
              <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" value="<?php echo $_SESSION['password']; ?>" required>
            </div>

          </div>
        </div>

        <div class="picture">
          <label for="name">プロフィール写真</label><br>
          <input type="hidden" name="max_file_size" value="1000000">
          <input type="file" size="40" name="picture">
        </div>

        <div>
          <textarea name="comments" class="comments" id="comments" cols="45" rows="5"><?php echo $_SESSION['comments']; ?></textarea>
        </div>

        <input type="hidden" value="<?php echo rand(1, 10); ?>" name="from_mypage">
        <div class="toroku">
          <input type="submit" class="submit_button" size="35" value="この内容に変更する">
        </div>


      </div>
    </form>

    <!-- <form action="mypage_update.php" method="post" enctype="multipart/form-data">
      <div class="form_contents">
        <h2>会員情報編集</h2>

        <div class="name">
          <label for="name">氏名</label><br>
          <input type="text" class="formbox" size="40" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" required>
        </div>

        <div class="mail">
          <label for="mail">メールアドレス</label><br>
          <input type="text" class="formbox" size="40" name="mail" id="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['mail']; ?>" required>
        </div>

        <div class="password">
          <label for="password">パスワード</label><br>
          <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" value="<?php echo $_SESSION['password']; ?>" required>
        </div>

        <div class="picture">
          <label for="name">プロフィール写真</label><br>
          <input type="hidden" name="max_file_size" value="1000000">
          <input type="file" size="40" name="picture">
        </div>

        <div class="comments">
          <label for="comments">コメント</label><br>
          <textarea name="comments" class="formbox" id="comments" cols="45" rows="5"><?php echo $_SESSION['comments']; ?></textarea>
        </div>

        <div class="toroku">
          <input type="submit" class="submit_button" size="35" value="この内容に変更する">
        </div>
      </div>
    </form> -->
  </main>

  <footer>
    <small>&copy; 2018 InterNous.inc. All rights reserved</small>
  </footer>

</body>

</html>