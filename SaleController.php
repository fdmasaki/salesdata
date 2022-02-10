<?php

require_once(ROOT_PATH .'/Models/Sale.php');



class SaleController {
  private $request;// リクエストパラメーターー（GET,POST）
  private $sale;//Saleモデル


  public function __construct() {
    //リクエストパラメーターー
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;
    //モデルオブジェクトの生成
    $this->Sale = new Sale();
    //別モデルと連携
    $dbh = $this->Sale->get_db_handler();
  }

  public function index() {
    $sale = $this->Sale->findAll();
    $params = [
       'sales' => $sale,
    ];
    return $params;
  }

  public function view() {
    if(empty($this->request['get']['id'])) {
      echo '指定のパラメータが不正です。このページを表示できません。';
      exit;
    }
    $sale = $this->Sale->findById($this->request['get']['id']);
    $params = [
      'sales' => $sale,
        ];
    return $params;
  }

  public function insert(){
      $insert = $this->Sale->insertData();
      return $insert;
  }
}
?>
