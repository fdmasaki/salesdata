<?php
if(empty($_SERVER["HTTP_REFERER"])) {
  header('Location:sales-add.php');
}?>

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
<div class="window">
<div class="staff_top">
<p class="staff_top_p">接客結果を報告しました</p>

<button class="staff_report"><a href="sales-add.php">はじめに戻る</a></button>

</div>
</div>

<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
