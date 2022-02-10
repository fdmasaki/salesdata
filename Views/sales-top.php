<?php



require_once(ROOT_PATH .'Controllers/SaleController.php');
$sale = new SaleController();
$params = $sale->index();
require_once(ROOT_PATH .'Controllers/UserController.php');
$user = new UserController();
$users = $user->role();


$_SESSION['gender']        = ($_POST['gender']);
$_SESSION['age']    = ($_POST['age']);
$_SESSION['result']        = ($_POST['result']);
$_SESSION['reason']       = ($_POST['reason']);

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
  <p class="staff_top_p">接客一覧（不要）</p>
  <table class="staff_top">
    <tr>
      <th>No.</th>
      <th>venues_id</th>
      <th>users_id</th>
      <th>性別</th>
      <th>年代</th>
      <th>結果</th>
      <th>理由</th>
    </tr>
    <?php foreach($params['sales'] as $sale): ?>
    <tr>
      <td><?php echo htmlspecialchars($sale['id']) ?></td>
      <td><?php echo htmlspecialchars($sale['venues_id']) ?></td>
      <td><?php echo htmlspecialchars($sale['users_id']) ?></td>
      <td><?php echo htmlspecialchars($sale['gender']) ?></td>
      <td><?php echo htmlspecialchars($sale['age']) ?></td>
      <td><?php echo htmlspecialchars($sale['result']) ?></td>
      <td><?php echo htmlspecialchars($sale['reason']) ?></td>
 </tr>
<?php endforeach; ?>
</table>

<?php if($users['user']['role'] == '1'):?>
<div class="staff_report">
  <button class="staff_report" type="submit" name="submit"><a href="sales-add.php">新規登録</a></button>
</div>
<?php endif;?>


</div>
</form>

<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
