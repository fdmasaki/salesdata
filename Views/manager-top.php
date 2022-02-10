<?php
session_start();

require_once(ROOT_PATH .'Controllers/ProjectController.php');
$project = new ProjectController();
$params = $project->index();
require_once(ROOT_PATH .'Controllers/UserController.php');
$user = new UserController();
$users = $user->role();
?>

<?php if($users['user']['role'] == '1'):?>



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
  <div class="window_m">
    <p class="staff_top_p">会場一覧</p>
    <p class="staff_top_detail">登録している会場の一覧です。<br>
      注意事項などをマネージャー同士で共有できます。<br>
      会場情報は、編集・削除をしたり、新規に登録することも可能です。</p>
      <button class="staff_report" type="submit" name="submit"><a href="add.php">新規会場登録</a></button>

  </div>
  <table class="staff_top">
    <tr>
      <th>No.</th>
      <th>会場名</th>
      <th>県名</th>
      <th>最寄駅</th>
      <th>制限人数</th>
      <th>持ち物</th>
      <th>服装</th>
      <th>注意事項</th>
      <th>詳細</th>
      <th>削除</th>
    </tr>
    <?php foreach($params['venues'] as $project): ?>
    <tr>
      <td><?php echo htmlspecialchars($project['id']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($project['venues_name']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($project['prefecture']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($project['station']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($project['member']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($project['item']) ?></td>
      <td class="manager_top_td"><?php echo htmlspecialchars($project['clothes']) ?></td>
      <td class="manager_top_notice"><?php echo nl2br(htmlspecialchars($project['notice'])) ?></td>

      <td><a href="detail.php?id=<?php echo $project['id'] ?>">詳細</a></td>
      <td><a href="delete.php?id=<?php echo $project['id']?>" onclick="return confirm('削除しますか？')">削除</a></td>
 </tr>
<?php endforeach; ?>
</table>

<div class="staff_report">
  <button class="staff_report_back"><a href="venueresults.php?id=<?php echo $project['id'] ?>">接客実績</a></button>
</div>

</div>
</form>

<?php include (dirname(__FILE__) .'/footer.php');?>
<div class="jump">
  <p><a href="#">上部へ</p>
</div>
</body>
</html>


<?php endif;?>
