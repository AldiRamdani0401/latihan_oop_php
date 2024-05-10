<?php

require realpath(__DIR__ . '/../Core/Controller.php');
require realpath(__DIR__ . '/../Services/AuthenticationService.php');
require realpath(__DIR__ . '/../Models/UserModel.php');
require realpath(__DIR__ . '/../Entity/User.php');

class LoginController extends Controller {

  public function index() {
    $this->view->render('login');
  }

  public function login() {
    $model = new UserModel();
    $user = new User($_POST['username'], $_POST['password']);
    $username = $user->getUsername();
    $password = $user->getPassword();

    if (empty($username) || empty($password)) {
      echo "Username & Password cannot be empty";
      return;
    }

    $authenticated = AuthenticationService::authenticate($model->getTable(), $username, $password);

    if ($authenticated) {
      header("Location: /$authenticated");
    } else {
      header('Location: /login', $message = 'error');
    }
  }
}