<?php
session_start();
error_reporting(0);
require_once(ROOT_PATH .'Controllers/ProjectController.php');
$project = new ProjectController();
$params = $project->index();

if (!empty($_POST)) {
  if ($_POST['venues_name'] === '') {
      $error['venues_name'] = 'blank';
  }
  if ($_POST['prefecture'] === '') {
      $error['prefecture'] = 'blank';
  }
  if ($_POST['station'] === '') {
      $error['station'] = 'blank';
  }
  if ($_POST['member'] === '') {
      $error['member'] = 'blank';
  }
  if(!preg_match('/^[0-9]+$/', $_POST['member'])) {
      $error['member'] = 'number';
  }
  if ($_POST['item'] === '') {
      $error['item'] = 'blank';
  }
  if ($_POST['clothes'] === '') {
      $error['clothes'] = 'blank';
  }
  if ($_POST['notice'] === '') {
      $error['notice'] = 'blank';
  }
  if (empty($error)) {
    $_SESSION['join'] = $_POST;
    header('Location: add-confirm.php');
    exit();
  }
}
if ($_REQUEST['action'] == 'rewrite' && isset($_SESSION['join'])) {
  $_POST = $_SESSION['join'];
}
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
  <p class="staff_top_p">会場新規登録</p>
  <table class="staff_top">
  <tr>
    <th>会場名</th>
    <td class="add"><input id="venues_name" type="text" name="venues_name" placeholder="K会場"　maxlength="10"
    value ="<?php print(htmlspecialchars($_POST['venues_name'], ENT_QUOTES)); ?>">
    <?php if ($error['venues_name'] === 'blank'): ?>
    <p class="error_message">会場名は必須入力です。10文字以内でご入力ください。</p>
  <?php endif; ?></td>
  </tr>
  <tr>
    <th>県名</th>
    <td class="add"><input id="prefecture" type="text" name="prefecture" placeholder="東京都"　maxlength="10"
    value ="<?php print(htmlspecialchars($_POST['prefecture'], ENT_QUOTES)); ?>">
    <?php if ($error['prefecture'] === 'blank'): ?>
    <p class="error_message">県名は必須入力です。10文字以内でご入力ください。</p>
  <?php endif; ?></td>
  </tr>
  <tr>
    <th>最寄駅</th>
    <td class="add"><input id="station" type="text" name="station" placeholder="西千住駅"　maxlength="10"
    value ="<?php print(htmlspecialchars($_POST['station'], ENT_QUOTES)); ?>">
    <?php if ($error['station'] === 'blank'): ?>
    <p class="error_message">最寄駅は必須入力です。正しくご入力ください。</p>
  <?php endif; ?></td>
  </tr>
  <tr>
    <th>現場人数</th>
    <td class="add"><input id="member" type="text" name="member" placeholder="15名"　maxlength="10"
    value ="<?php print(htmlspecialchars($_POST['member'], ENT_QUOTES)); ?>">
    <?php if ($error['member'] === 'number'): ?>
    <p class="error_message">現場人数は必須入力です。0-9の数字で正しくご入力ください。</p>
  <?php endif; ?></td>
  </tr>
  <tr>
    <th>持ち物</th>
    <td class="add"><input id="item" type="text" name="item" placeholder="ネームプレート・昼食"　maxlength="10"
    value ="<?php print(htmlspecialchars($_POST['item'], ENT_QUOTES)); ?>">
    <?php if ($error['item'] === 'blank'): ?>
    <p class="error_message">持ち物は必須入力です。正しくご入力ください。</p>
  <?php endif; ?></td>
  </tr>
  <tr>
    <th>服装</th>
    <td class="add"><input id="clothes" type="text" name="clothes" placeholder="ビジネスカジュアルまたは、スーツ"　maxlength="10"
    value ="<?php print(htmlspecialchars($_POST['clothes'], ENT_QUOTES)); ?>">
    <?php if ($error['clothes'] === 'blank'): ?>
    <p class="error_message">服装は必須入力です。正しくご入力ください。</p>
  <?php endif; ?></td>
  </tr>
  <tr>
    <th>注意事項</th>
    <td class="add"><textarea id="notice" type="text" name="notice" rows="10" cols="30"
    value =""><?php print(htmlspecialchars($_POST['notice'], ENT_QUOTES)); ?></textarea>
    <?php if ($error['notice'] === 'blank'): ?>
    <p class="error_message">注意事項は必須入力です。正しくご入力ください。</p>
  <?php endif; ?></td>
  </tr>
</table>

<div class="staff_report">
  <button class="staff_report" type="submit" name="submit" value="">確&ensp;認</button>
  <button class="staff_report" type="submit" name="submit"><a href="javascript:history.back()">戻&ensp;る</a></button>
</div>

</div>
</form>


<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
