<?php
if(empty($_SERVER["HTTP_REFERER"])) {
  header('Location:manager-top.php');
}?>
<?php
require_once(ROOT_PATH .'Controllers/ProjectController.php');
$project = new ProjectController();
$params = $project->view()
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

<form action="" method="post">
<div class="staff_top">
  <p class="staff_top_p">会場詳細</p>
  <table class="staff_top">
    <tr>
	    <th>No</th>
      <td><?=$params['venues']['id'] ?></td>
    	  </tr>
    <tr>
	    <th>会場名</th>
      <td class="staff_top_td"><?=$params['venues']['venues_name'] ?></td>
    	  </tr>
        <tr>
          <th>県名</th>
          <td class="staff_top_td"><?=$params['venues']['prefecture'] ?></td>
        </tr>
      	<tr>
          <th>最寄駅</th>
          <td class="staff_top_td"><?=$params['venues']['station'] ?></td>
        <tr>
        <tr>
          <th>現場人数</th>
          <td class="staff_top_td"><?=$params['venues']['member'] ?></td>
        <tr>
          <th>持ち物</th>
          <td class="staff_top_td"><?=$params['venues']['item'] ?></td>
        </tr>
        <tr>
          <th>服装</th>
          <td class="staff_top_td"><?=$params['venues']['clothes'] ?></td>
        </tr>
      	<tr>
          <th>注意事項</th>
          <td class="staff_top_td"><?=$params['venues']['notice'] ?></td>
        </tr>
</table>

<div class="staff_report">
  <button class="staff_report" type="submit" name="submit"><a href="edit.php?id=<?php echo $params['venues']['id']?>">編集</a></button>
  <button class="staff_report" type="submit" name="submit"><a href="javascript:history.back()">会場一覧へ戻る</a></button>
</div>

</div>
</form>

<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
