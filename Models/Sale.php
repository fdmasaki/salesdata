<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Sale extends Db {
  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }

  //venuesテーブルからすべてデータを取得
  public function findAll():Array {
    $sql = 'SELECT * FROM sales';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  //venuesテーブルから指定idに一致するデータを取得
  public function findById($id = 0):Array {
    $sql = 'SELECT * FROM sales';
    $sql .= ' WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function insertData(){
  $sql ='INSERT INTO sales (venues_id, users_id, gender, age, result, reason) VALUE (:venues_id, :id, :gender, :age, :result, :reason)';
  $sth = $this->dbh->prepare($sql);
  $sth->bindParam(":venues_id", $_SESSION['join']['venues_id'], PDO::PARAM_STR);
  $sth->bindParam(":id", $_SESSION['join']['id'], PDO::PARAM_STR);
  $sth->bindParam(":gender", $_SESSION['join']['gender'], PDO::PARAM_STR);
  $sth->bindParam(":age", $_SESSION['join']['age'], PDO::PARAM_STR);
  $sth->bindParam(":result", $_SESSION['join']['result'], PDO::PARAM_STR);
  $sth->bindParam(":reason", $_SESSION['join']['reason'], PDO::PARAM_STR);
  $sth->execute();
  }
}
?>
