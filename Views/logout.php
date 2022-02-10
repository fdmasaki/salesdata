
<?php
session_start();
$_SESSION = $email;
session_destroy();
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

<div class="staff_top">
  <p class="staff_top_p">ログアウトしました</p>
  <button class="staff_report"><a href="login.php">ログイン画面へ</a></button>
</div>


<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
