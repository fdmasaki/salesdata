<?php

require_once(ROOT_PATH .'/Models/Agree.php');



class AgreeController {
  private $request;// リクエストパラメーターー（GET,POST）
  private $agree;//Resultモデル


  public function __construct() {
    //リクエストパラメーターー
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;
    //モデルオブジェクトの生成
    $this->Agree = new Agree();
    //別モデルと連携
    $dbh = $this->Agree->get_db_handler();
  }

  public function index() {
    $agree = $this->Agree->findAll();
    $params = [
       'agrees' => $agree,
    ];
    return $params;
  }
}
?>
