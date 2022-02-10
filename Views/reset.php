<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>リセット画面</title>
<link rel="stylesheet" href="/css/ontime.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/js/script.js" defer></script>
</head>
<body>
<?php include (dirname(__FILE__) .'/header.php');?>

<form action="" method="get">
<div class="login_top">
  <p class="login_top_p">SALES DATA</p>
    <div><input class="login_input" type="text" name="mail" placeholder="メールアドレス"></div>
    <div><input class="login_input" type="password" name="password" placeholder="パスワード"></div>
    <div><input class="login_input" type="password" name="password" placeholder="パスワード"></div>
    <div><input class="login" type="submit" name="login"value="リセット"></div>
    <button class="staff_report" type="submit" name="submit"><a href="javascript:history.back()">戻&ensp;る</a></button>
</div>

</form>

<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
