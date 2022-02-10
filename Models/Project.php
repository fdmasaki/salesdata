<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Project extends Db {
  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }

  //venuesテーブルからすべてデータを取得
  public function findAll():Array {
    $sql = 'SELECT * FROM venues';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  //venuesテーブルから指定idに一致するデータを取得
  public function findById($id = 0):Array {
    $sql = 'SELECT * FROM venues';
    $sql .= ' WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function deleteById($id = 0) {
    $sql ='DELETE FROM venues WHERE id = :id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
  }

  //データをアップデート
  public function updateData($id = 0){
    $sql  = "UPDATE venues SET venues_name = :venues_name, prefecture = :prefecture, station = :station, member = :member, item = :item, clothes = :clothes, notice = :notice
             WHERE id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':venues_name',  $_SESSION['venues_name'], PDO::PARAM_STR);
    $sth->bindParam(':prefecture',  $_SESSION['prefecture'], PDO::PARAM_STR);
    $sth->bindParam(':station',   $_SESSION['station'], PDO::PARAM_STR);
    $sth->bindParam(':member', $_SESSION['member'], PDO::PARAM_STR);
    $sth->bindParam(':item',  $_SESSION['item'], PDO::PARAM_STR);
    $sth->bindParam(':clothes',  $_SESSION['clothes'], PDO::PARAM_STR);
    $sth->bindParam(':notice',  $_SESSION['notice'], PDO::PARAM_STR);
    $sth->bindParam(':id',    $id, PDO::PARAM_INT);
    $sth->execute();
  }

  public function insertData(){
    $sql = 'INSERT INTO venues (venues_name, prefecture, station, member, item, clothes, notice) VALUE (:venues_name, :prefecture, :station, :member, :item, :clothes, :notice)';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(":venues_name", $_SESSION['join']['venues_name'], PDO::PARAM_STR);
    $sth->bindParam(":prefecture", $_SESSION['join']['prefecture'], PDO::PARAM_STR);
    $sth->bindParam(":station", $_SESSION['join']['station'], PDO::PARAM_STR);
    $sth->bindParam(":member", $_SESSION['join']['member'], PDO::PARAM_STR);
    $sth->bindParam(":item", $_SESSION['join']['item'], PDO::PARAM_STR);
    $sth->bindParam(":clothes", $_SESSION['join']['clothes'], PDO::PARAM_STR);
    $sth->bindParam(":notice", $_SESSION['join']['notice'], PDO::PARAM_STR);
    $sth->execute();
  }
}
?>
