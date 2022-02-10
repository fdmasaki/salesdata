<?php

require_once(ROOT_PATH .'/Models/Project.php');



class ProjectController {
  private $request;// リクエストパラメーターー（GET,POST）
  private $project;//Projectモデル


  public function __construct() {
    //リクエストパラメーターー
    $this->request['get'] = $_GET;
    $this->request['post'] = $_POST;
    //モデルオブジェクトの生成
    $this->Project = new Project();
    //別モデルと連携
    $dbh = $this->Project->get_db_handler();
  }

  public function index() {
    $project = $this->Project->findAll();
    $params = [
       'venues' => $project,
    ];
    return $params;
  }

  public function view() {
    if(empty($this->request['get']['id'])) {
      echo '指定のパラメータが不正です。このページを表示できません。';
      exit;
    }
    $project = $this->Project->findById($this->request['get']['id']);
    $params = [
      'venues' => $project,
        ];
    return $params;
  }

  public function update() {
    if(empty($this->request['get']['id'])) {
      echo '指定のパラメーターが不正です。このページを表示できません。';
      exit;
    }
    $update = $this->Project->updateData($this->request['get']['id']);
    return $update;
  }

  public function delete() {
    if(empty($this->request['get']['id'])) {
      echo '指定のパラメーターが不正です。このページを表示できません。';
      exit;
    }
    $delete = $this->Project->deleteById($this->request['get']['id']);
    return $delete;
  }

  public function insert(){
      $insert = $this->Project->insertData();
      return $insert;
  }
}
?>
