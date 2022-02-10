<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Result extends Db {
  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }

  //venuesテーブルからすべてデータを取得
  public function findAll():Array {
    $sql = 'SELECT venues.venues_name as venuesname, sales.gender, sales.age, sales.result, sales.reason, sales.created_at, users.users_name as usersname
    FROM sales';
    $sql .= ' INNER JOIN venues ON sales.venues_id = venues.id';
    $sql .= ' INNER JOIN users ON sales.users_id = users.id ORDER BY created_at DESC';
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  //venuesテーブルから指定idに一致するデータを取得
  public function findById($id = 0):Array {
    $sql = 'SELECT sales.venues_id, venues.venues_name as venuesname, sales.gender, sales.age, sales.result, sales.reason, sales.created_at
    FROM sales';
    $sql .= ' INNER JOIN venues ON sales.venues_id = venues.id';
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(':id', $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }
}
?>
