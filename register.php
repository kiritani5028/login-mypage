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

  <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
  <header>
    <img src="4eachblog_logo.jpg">
    <div class="login"><a href="login.php">ログイン</a></div>
  </header>

  <main>
    <form action="register_confirm.php" method="post" enctype="multipart/form-data">
      <div class="form_contents">
        <h2>会員登録</h2>

        <div class="name">
          <div class="hissu">必須</div>
          <label for="name">氏名</label><br>
          <input type="text" class="formbox" size="40" name="name" id="name" required>
        </div>

        <div class="mail">
          <div class="hissu">必須</div>
          <label for="mail">メールアドレス</label><br>
          <input type="text" class="formbox" size="40" name="mail" id="mail" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
        </div>

        <div class="password">
          <div class="hissu">必須</div>
          <label for="password">パスワード(半角英数字6文字以上)</label><br>
          <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
        </div>

        <div class="password">
          <div class="hissu">必須</div>
          <label for="confirm">パスワード確認</label><br>
          <input type="password" class="formbox" size="40" name="confirm_password" id="confirm" oninput="ConfirmPassword(this)" required>
        </div>

        <div class="picture">
          <label for="name">プロフィール写真</label><br>
          <input type="hidden" name="max_file_size" value="1000000">
          <input type="file" size="40" name="picture">
        </div>
        
        <div class="comments">
          <label for="comments">コメント</label><br>
          <textarea name="comments" class="formbox" id="comments" cols="45" rows="5"></textarea>
        </div>

        <div class="toroku">
          <input type="submit" class="submit_button" size="35" value="登録する">
        </div>
      </div>
    </form>
  </main>

  <footer>
    <small>&copy; 2018 InterNous.inc. All rights reserved</small>
  </footer>

  <script>
    const ConfirmPassword = (confirm) => {
      const input1 = password.value;
      const input2 = confirm.value;
      if (input1 !== input2){
        confirm.setCustomValidity("パスワードが一致しません。");
      } else {
        confirm.setCustomValidity("");
      }
    }
  </script>

</body>

</html>