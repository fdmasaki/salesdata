<?php
require_once(ROOT_PATH .'Controllers/AgreeController.php');
$agree = new AgreeController();
$params = $agree->index();
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
  <p class="staff_top_p">接客実績（全会場）</p>
  <div class="staff_report">
    <button class="staff_report" type="submit" name="submit"><a href="javascript:history.back()">会場一覧へ戻る</a></button>
    <button class="staff_report" type="submit" name="submit"><a href="csv.php">CSV出力</a></button>
  </div>
  <table class="staff_top">
    <tr>
      <th>接客数</th>
      <th>接客日時</th>
      <th>会場</th>
      <th>顧客性別</th>
      <th>顧客年代</th>
      <th>接客結果</th>
      <th>理由</th>
      <th>対応スタッフ</th>
    </tr>
    <?php foreach($params['agrees'] as $agree): ?>
    <tr>
      <td class="manager_top_td"><?php echo nl2br(htmlspecialchars($agree['salestime'])) ?></td>
      <td class="manager_top_td"><?php echo nl2br(htmlspecialchars($agree['created_at'])) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($agree['venuesname']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($agree['gender']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($agree['age']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($agree['result']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($agree['reason']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($agree['usersname']) ?></td>
 </tr>
<?php endforeach; ?>
</table>



</div>
</form>

<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
