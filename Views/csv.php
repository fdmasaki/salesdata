<?php
require_once(ROOT_PATH .'Controllers/ResultController.php');
$result = new ResultController();
$params = $result->index();

// 出力情報の設定
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=salesdata.csv");
header("Content-Transfer-Encoding: binary");

// 変数の初期化


// 出力したいデータのサンプル


// 1行目のラベルを作成
$csv = '"接客日時","会場","顧客性別","顧客年代","接客結果","理由","対応スタッフ"' . "\n";

// 出力データ生成
foreach($params['results'] as $result){
	$csv .= '"' . $result['created_at'] . '","' . $result['venuesname'] . '","' . $result['gender'] . '","' . $result['age'] . '","'
	. $result['result'] . '", "' . $result['reason'] . '","' . $result['usersname'] . '"' ."\n";
}

// CSVファイル出力
echo $csv;
return;
?>
