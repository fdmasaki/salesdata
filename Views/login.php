<?php
session_start();
require_once(ROOT_PATH .'Controllers/UserController.php');
$user = new UserController();
$user->login();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>ontime</title>
<link rel="stylesheet" href="/css/ontime.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/js/script.js" defer></script>
</head>
<body>
<?php include (dirname(__FILE__) .'/header.php');?>

<form action="" method="get">
<div class="login_top">
  <p class="login_top_p">SALES DATA</p>
  <p class="login_top">＊＊＊<br>会社に登録しているメールアドレス<br>
    案件担当者から発行されたパスワードで<br>ログインしてください。</p>
    <div><input class="login_input" type="text" name="email" placeholder="メールアドレス"></div>
    <div><input class="login_input" type="password" name="password" placeholder="パスワード"></div>
    <div><input class="login" type="submit" name="login"value="ログイン"></div>
  <p class="login_top_p_pass"><a href="reset.php">パスワードを忘れてしまった方はこちら</p>
</div>

</form>

<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
