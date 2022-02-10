<?php
if(empty($_SERVER["HTTP_REFERER"])) {
  header('Location:manager-top.php');
}?>

<?php
session_start();
require_once(ROOT_PATH.'Controllers/ProjectController.php');
$project = new ProjectController();
$project->insert();
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

<form action="add-complete.php" method="post">
  <input type="hidden" name="action" value="submit">

<div class="staff_top">
  <p class="staff_top_p">こちらで登録しますか？</p>
  <table class="staff_top">
		<tr>
	    <th>会場名</th>
	    <td class="staff_top_td"><p><?php echo (htmlspecialchars($_SESSION['join']['venues_name'],ENT_QUOTES));?></p></td>
	  </tr>
  <tr>
    <th>県名</th>
    <td class="staff_top_td"><p><?php echo (htmlspecialchars($_SESSION['join']['prefecture'],ENT_QUOTES));?></p></td>
  </tr>
	<tr>
    <th>最寄駅</th>
    <td class="staff_top_td"><p><?php echo (htmlspecialchars($_SESSION['join']['station'],ENT_QUOTES));?></p></td>
  <tr>
  <tr>
    <th>現場人数</th>
    <td class="staff_top_td"><p><?php echo (htmlspecialchars($_SESSION['join']['member'],ENT_QUOTES));?></p></td>
  <tr>
    <th>持ち物</th>
    <td class="staff_top_td"><p><?php echo (htmlspecialchars($_SESSION['join']['item'],ENT_QUOTES));?></p></td>
  </tr>
  <tr>
    <th>服装</th>
    <td class="staff_top_td"><p><?php echo (htmlspecialchars($_SESSION['join']['clothes'],ENT_QUOTES));?></p></td>
  </tr>
	<tr>
    <th>注意事項</th>
    <td class="staff_top_td"><p><?php echo nl2br(htmlspecialchars($_SESSION['join']['notice'],ENT_QUOTES));?></p></td>
  </tr>
</table>

<div class="staff_report">
  <button class="staff_report" type="submit" name="submit" onclick="return confirm('登録しますか？')" value="確　定">登&ensp;録</button>
  <button class="staff_report" type="submit" name="submit"><a href="javascript:history.back()">入力画面へ戻る</a></button>
</div>

</div>
</form>


<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
