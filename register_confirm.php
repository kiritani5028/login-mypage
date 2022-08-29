<?php
mb_internal_encoding("utf8");
$temp_pic_name = $_FILES['picture']['tmp_name'];
$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/' . $original_pic_name;

move_uploaded_file($temp_pic_name, './image/' . $original_pic_name);
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

  <link rel="stylesheet" type="text/css" href="register_confirm.css">
</head>

<body>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="login.php">ログイン</a></div>
  </header>

  <main>
    <div class="form">
      <div class="form_contents">
        <h2>会員登録 確認</h2>
        <p class="kakunin">こちらの内容で登録しても宜しいでしょうか？</p>

        <div class="name">
          <p>氏名 : <?php echo $_POST['name']; ?></p>
        </div>

        <div class="mail">
          <p>メールアドレス : <?php echo $_POST['mail']; ?></p>
        </div>

        <div class="password">
          <p>パスワード : <?php echo $_POST['password']; ?></p>
        </div>

        <div class="picture">
          <p>プロフィール写真 : <?php echo $original_pic_name; ?></p>
        </div>

        <div class="comments">
          <p>コメント : <?php echo $_POST['comments']; ?></p>
        </div>

        <div class="button_wrapper">
          <form action="register.php">
            <input class="back_button" type="submit" size="35" value="戻って修正する">
          </form>

          <form action="register_insert.php" method="post">
            <input class="submit_button" type="submit" size="35" value="登録する">
            <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
            <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
            <input type="hidden" value="<?php echo $_POST['password']; ?>" name="password">
            <input type="hidden" value="<?php echo $path_filename ?>" name="picture">
            <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
          </form>
        </div>

      </div>
    </div>
  </main>

  <footer>
    <small>&copy; 2018 InterNous.inc. All rights reserved</small>
  </footer>

  <script>
    const ConfirmPassword = (confirm) => {
      const input1 = password.value;
      const input2 = confirm.value;
      if (input1 !== input2) {
        confirm.setCustomValidity("パスワードが一致しません。");
      } else {
        confirm.setCustomValidity("");
      }
    }
  </script>

</body>

</html>