
<?php
if(empty($_SERVER["HTTP_REFERER"])) {
  header('Location:manager-top.php');
} ?>

<?php
require_once(ROOT_PATH .'Controllers/ProjectController.php');
$project = new ProjectController();
$params = $project->view();

session_start();
$error = [];
$mode= 'input';

if(isset($_POST['submit']) && $_POST['submit']){
  if ($_POST['venues_name'] == '') {
    $error[] = "会場名の入力は必須です。";
  }
  if ($_POST['prefecture'] == '') {
    $error[] = "県名の入力は必須です。";
  }
  if ($_POST['station'] == '') {
    $error[] = "最寄駅の入力は必須です。";
  }

  if($_POST['member']==''||!preg_match("/^[0-9]+$/",$_POST['member'])){
    $error[] = "人数は数字で入力してください。";
  }

  if ($_POST['item'] == '') {
    $error[] = "持ち物の入力は必須です。";
  }

  if ($_POST['clothes'] == '') {
    $error[] = "服装の入力は必須です。";
  }

  if ($_POST['notice'] == '') {
    $error[] = "注意事項の入力は必須です。";
  }

  $_SESSION['venues_name']        = ($_POST['venues_name']);
  $_SESSION['prefecture']    = ($_POST['prefecture']);
  $_SESSION['station']        = ($_POST['station']);
  $_SESSION['member']       = ($_POST['member']);
  $_SESSION['item']      = ($_POST['item']);
  $_SESSION['clothes']      = ($_POST['clothes']);
  $_SESSION['notice'] = ($_POST['notice']);



  if(empty($error)) {
    $mode = 'update';
  } else {
    $mode = 'input';
  }
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

<?php
    if($error){
     echo implode('<br>', $error );
    }
  ?>

<?php if( $mode === 'input' ){?>
<form action="" method="post">
<div class="staff_top">
  <p class="staff_top_p">会場情報を編集してください。</p>
  <table class="staff_top">

  <tr>
      <th>会場名</th>
      <td><input id="venues_name" type="text" name="venues_name" maxlength="10"
      value ="<?php echo $params['venues']['venues_name']?>"></td>
    </tr>
  <tr>
    <th>県名</th>
    <td><input id="prefecture" type="text" name="prefecture" maxlength="10"
    value ="<?php echo $params['venues']['prefecture']?>"></td>
  </tr>
  <tr>
    <th>最寄駅</th>
    <td><input id="station" type="text" name="station" maxlength="10"
    value ="<?php echo $params['venues']['station']?>"></td>
  </tr>
  <tr>
    <th>現場人数</th>
    <td><input id="member" type="text" name="member" maxlength="10"
    value ="<?php echo $params['venues']['member']?>"></td>  </tr>
  <tr>
    <th>持ち物</th>
    <td><input id="item" type="text" name="item" maxlength="10"
    value ="<?php echo $params['venues']['item']?>"></td>  </tr>
  <tr>
    <th>服装</th>
    <td><input id="clothes" type="text" name="clothes" maxlength="10"
    value ="<?php echo $params['venues']['clothes']?>"></td>  </tr>
    <tr>
      <th>注意事項</th>
      <td class="add"><textarea id="notice" type="text" name="notice" rows="10" cols="30"
      value =""><?php echo $params['venues']['notice']?></textarea></td>
    </tr>
</table>

<div class="staff_report">
  <input class="staff_report" type="submit" name="submit" onclick="return confirm('更新しますか？')" value="更　　新">
  <button class="staff_report" type="submit" name="submit"><a href="javascript:history.back()">戻&ensp;る</a></button>
</div>
</div>
<?php }elseif( $mode === 'update'){?>
  <?php require_once('update.php');}?>
</form>

<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
