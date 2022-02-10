<?php
require_once(ROOT_PATH .'Controllers/ResultController.php');
$result = new ResultController();
$params = $result->index();
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

<div class="staff_report_logout">
  <button class="manager_report" type="submit" name="submit"><a href="sales-add.php">スタッフTOPへ</button>
  <button class="staff_report_logout" type="submit" name="submit"><a href="logout.php">ログアウト</a></button>
</div>

<form action="" method="post">
<div class="staff_top">
  <div class="window_m_back">
  <p class="staff_top_p_back">接客実績（全会場）</p>
  <p class="staff_top_detail">スタッフが入力した接客結果です。<br>
    「誰が」「どの会場」「いつ」<br>
    対応したかをリアルタイムで確認することができます。<br>
    CSVデータとしてダウンロードすることも可能です。</p>
    <button class="staff_report_back" type="submit" name="submit"><a href="csv.php">CSV出力</a></button>

</div>

  <table class="staff_top">
    <tr>
      <th>接客日時</th>
      <th>会場</th>
      <th>顧客性別</th>
      <th>顧客年代</th>
      <th>接客結果</th>
      <th>理由</th>
      <th>対応スタッフ</th>
    </tr>
    <?php foreach($params['results'] as $result): ?>
    <tr>
      <td class="manager_top_td"><?php echo nl2br(htmlspecialchars($result['created_at'])) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($result['venuesname']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($result['gender']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($result['age']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($result['result']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($result['reason']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($result['usersname']) ?></td>
 </tr>
<?php endforeach; ?>
</table>


<div class="staff_report">
  <button class="staff_report" type="submit" name="submit"><a href="javascript:history.back()">会場一覧へ戻る</a></button>
</div>
</div>
</form>

<?php include (dirname(__FILE__) .'/footer.php');?>
<div class="jump">
  <p><a href="#">上部へ</p>
</div>
</body>
</html>
