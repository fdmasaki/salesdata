<?php
require_once(ROOT_PATH .'/Models/Db.php');

class User extends Db {
  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }

  public function Users($email = '0') {
    global $email, $password;
    if(isset($_GET['email'])) {
      try {
        $sql = 'SELECT * FROM users WHERE email=:email';
        $sth = $this->dbh->prepare($sql);
        $sth->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->execute();

        if($rows = $sth->fetch()) {
          if($rows['password'] == $password) {
            $_SESSION['email'] = $email;
            header('Location:sales-add.php');
            exit();
          }else {
            echo '正しいメールアドレスとパスワードを入力してください。';
            return false;
          }}
        } catch(PDOException $e) {
          echo "接続失敗:" . $e->getMessage();
          exit();
          }
     }
  }

  public function role($email) {
    try {
      $sql = 'SELECT * FROM users WHERE email=:email';
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':email', $email, PDO::PARAM_STR);
      $sth->execute();
      $result = $sth->fetch(PDO::FETCH_ASSOC);
      return $result;
    }catch(PDOException $e) {
      echo "接続失敗:" . $e->getMessage();
      exit();
    }
  }
  


}
?>
