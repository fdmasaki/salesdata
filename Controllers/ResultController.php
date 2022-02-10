<?php

require_once(ROOT_PATH .'/Models/Result.php');



class ResultController {
  private $request;// リクエストパラメーターー（GET,POST）
  private $result;//Resultモデル


  public function __construct() {
    //リクエストパラメーターー
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;
    //モデルオブジェクトの生成
    $this->Result = new Result();
    //別モデルと連携
    $dbh = $this->Result->get_db_handler();
  }

  public function index() {
    $result = $this->Result->findAll();
    $params = [
       'results' => $result,
    ];
    return $params;
  }

  public function view() {
    if(empty($this->request['get']['id'])) {
      echo '指定のパラメータが不正です。このページを表示できません。';
      exit;
    }
    $result = $this->Result->findById($this->request['get']['id']);
    $params = [
      'results' => $result,
        ];
    return $params;
  }
}
?>
