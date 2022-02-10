<?php
if(empty($_SERVER["HTTP_REFERER"])) {
  header('Location:sales-add.php');
}?>

<?php
session_start();
require_once(ROOT_PATH.'Controllers/SaleController.php');
$sale = new SaleController();
$sale->insert();
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

<form action="sales-complete.php" method="post">
  <input type="hidden" name="action" value="submit">

<div class="window">
<div class="staff_top">
  <p class="staff_top_p">こちらで登録しますか？</p>
  <table class="staff_top">
		<input type="hidden" value="<?php echo (htmlspecialchars($_SESSION['join']['venues_id'],ENT_QUOTES));?>">
		<input type="hidden" value="<?php echo (htmlspecialchars($_SESSION['join']['id'],ENT_QUOTES));?>">

		<tr>
	    <th>顧客性別</th>
	    <td class="staff_top_td"><?php echo (htmlspecialchars($_SESSION['join']['gender'],ENT_QUOTES));?></td>
	  </tr>
    <tr>
	    <th>顧客年代</th>
	    <td class="staff_top_td"><?php echo (htmlspecialchars($_SESSION['join']['age'],ENT_QUOTES));?></td>
	  </tr>
    <tr>
	    <th>接客結果</th>
	    <td class="staff_top_td"><?php echo (htmlspecialchars($_SESSION['join']['result'],ENT_QUOTES));?></td>
	  </tr>
    <tr>
	    <th>理由</th>
	    <td class="staff_top_td"><?php echo (htmlspecialchars($_SESSION['join']['reason'],ENT_QUOTES));?></td>
	  </tr>
</table>

<div class="staff_report">
  <button class="staff_report" type="submit" name="submit" onclick="return confirm('登録しますか？')" value="確　定">登&ensp;録</button>
  <button class="staff_report" type="submit" name="submit"><a href="javascript:history.back()">入力画面へ戻る</a></button>
</div>

</div>
</div>
</form>


<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
