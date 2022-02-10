<?php
require_once(ROOT_PATH .'/Models/users.php');

if(isset($_GET['email'])) {
  $email = htmlspecialchars($_GET["email"], ENT_QUOTES, "UTF-8");
  $password = htmlspecialchars($_GET["password"], ENT_QUOTES, "UTF-8");
}

class UserController {
  private $request;
  private $User;

  public function __construct() {
    $this->request ['GET'] = $_GET;
    $this->User = new User();
  }

  public function login() {
    if(!empty($this->request['GET']['email'])) {
      $this->User->Users($this->request['GET']['email']);
    }
  }

  public function role(){
    $user = $this->User->role($_SESSION['email']);
    $users = [
      'user' => $user
    ];
    return $users;
  }



}
?>
