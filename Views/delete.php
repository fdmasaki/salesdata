<?php
if(empty($_SERVER["HTTP_REFERER"])) {
  header('Location:manager-top.php');
}?>
<?php
  require_once(ROOT_PATH .'Controllers/ProjectController.php');
  $project = new ProjectController();
  $delete = $project->delete();
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

<div class="staff_top">
  <p class="staff_top_p">会場を削除しました</p>
  <button class="staff_report"><a href="manager-top.php">会場一覧へ戻る</a></button>
</div>


<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
