<?php
session_start();
error_reporting(0);
require_once(ROOT_PATH .'Controllers/SaleController.php');
$sale = new SaleController();
$params = $sale->index();
require_once(ROOT_PATH .'Controllers/UserController.php');
$user = new UserController();
$users = $user->role();


if (!empty($_POST)) {

  if ($_POST['gender'] === '') {
      $error['gender'] = 'blank';
  }
  if ($_POST['age'] === '') {
      $error['age'] = 'blank';
  }
  if ($_POST['result'] === '') {
      $error['result'] = 'blank';
  }
  if ($_POST['reason'] === '') {
      $error['reason'] = 'blank';
  }
  if (empty($error)) {
    $_SESSION['join'] = $_POST;
    header('Location: sales-confirm.php');
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

<div class="staff_report_logout">
  <?php if($users['user']['role'] == '1'):?>
    <button class="manager_report" type="submit" name="submit"><a href="manager-top.php">管理者ページへ</a></button>
  <?php endif;?>
  <button class="staff_report_logout" type="submit" name="submit"><a href="logout.php">ログアウト</a></button>
  </div>

<form action="" method="post">
<div class="window">
<div class="staff_top">
  <p class="staff_top_p">接客した結果を入力</p>
  <p class="staff_top_detail">接客対応お疲れ様です。<br>
    お客様の特徴と、接客結果を下記に入力してください。<br>
    失注/成約理由を集めて、次の接客に活用しましょう！</p>
  <table class="staff_top">
    <tr class="staff_top">
      <th>会場を選択</th>
      <td><select name="venues_id">
        <option value="1">A会場</option>
        <option value="2">B会場</option>
        <option value="3">C会場</option>
        <option value="4">D会場</option>
        <option value="5">E会場</option>
        <option value="6">F会場</option>
        <option value="7">G会場</option>
        <option value="8">H会場</option>
        <option value="9">I会場</option>
        <option value="10">J会場</option>
        <option value="11">K会場</option>
        <option value="12">L会場</option>
        <option value="13">M会場</option>
        <option value="14">N会場</option>
        <option value="15">O会場</option>
        <option value="16">P会場</option>
        <option value="17">Q会場</option>
        <option value="18">R会場</option>
        <option value="19">S会場</option>
        <option value="20">T会場</option>
        <option value="21">U会場</option>
        <option value="22">V会場</option>
        <option value="23">W会場</option>
        <option value="24">X会場</option>
        <option value="25">Y会場</option>
        <option value="26">Z会場</option>
      </select>
      <?php if ($error['venues_id'] === 'blank'): ?>
      <p class="error_message">会場名は必須入力です。10文字以内でご入力ください。</p>
    <?php endif; ?></td>
    </tr>

    <tr>
      <input id="id" type="hidden" name="id" placeholder=""　maxlength="10"
      value ="<?php echo($users['user']['id'])?>">
    </tr>

  <tr>
    <th>顧客性別</th>
    <td>
      <select name="gender">
        <option value="男性">男性</option>
        <option value="女性">女性</option>
        <option value="その他">その他</option>
      </select>
    <?php if ($error['gender'] === 'blank'): ?>
    <p class="error_message">性別は必須入力です。10文字以内でご入力ください。</p>
  <?php endif; ?>
</td>
  </tr>
  <tr>
    <th>顧客年代</th>
    <td>
      <select name="age">
        <option value="10代">10代</option>
        <option value="20代">20代</option>
        <option value="30代">30代</option>
        <option value="40代">40代</option>
        <option value="50代">50代</option>
        <option value="60代">60代</option>
        <option value="70代">70代</option>
        <option value="80代">80代</option>
        <option value="90代">90代</option>
        <option value="その他">その他</option>
      </select>
    <?php if ($error['age'] === 'blank'): ?>
    <p class="error_message">年代は必須入力です。10文字以内でご入力ください。</p>
  <?php endif; ?></td>
  </tr>
  <tr>
    <th>接客結果</th>
    <td>
      <select name="result">
        <option value="トライ/足止め">トライ（足止め）</option>
        <option value="アプローチ/商品訴求">アプローチ（商品訴求）</option>
        <option value="コンサル/料金比較">コンサル（料金比較）</option>
        <option value="クロージング">クロージング</option>
        <option value="アグリー/成約">アグリー（成約）</option>
      </select>
    <?php if ($error['result'] === 'blank'): ?>
    <p class="error_message">接客結果は必須入力です。10文字以内でご入力ください。</p>
  <?php endif; ?></td>
  </tr>
  <tr>
    <th>理由</th>
    <td>
      <select name="reason">
        <option value="価格">価格</option>
        <option value="サービス">サービス</option>
        <option value="知名度/ブランド">知名度/ブランド</option>
        <option value="特典/キャンペーン">特典/キャンペーン</option>
        <option value="その他">その他</option>
      </select>
    <?php if ($error['reason'] === 'blank'): ?>
    <p class="error_message">理由は必須入力です。10文字以内でご入力ください。</p>
  <?php endif; ?></td>
  </tr>
</table>

<div class="staff_report">
  <button class="staff_report" type="submit" name="submit" value="">確&ensp;認</button>
</div>




</div>
</div>
</form>


<?php include (dirname(__FILE__) .'/footer.php');?>
</body>
</html>
