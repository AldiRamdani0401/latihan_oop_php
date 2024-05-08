<?php

require realpath(__DIR__ . '/../Core/Controller.php');
require realpath(__DIR__ . '/../Services/AuthenticationService.php');
require realpath(__DIR__ . '/../Services/Session.php');

class LoginController extends Controller {

  protected $model = 'tb_users';

  public function index() {
    $this->view->render('login');
  }

  public function login() {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
      echo "Username & Password cannot be empty";
      return;
    }

    $authenticated = AuthenticationService::authenticate($this->model, $username, $password);

    if ($authenticated) {
      $session = Session::create();
      session_start();
      $_SESSION['data'] = $session;
      header('Location: /users');
    } else {
      header('Location: /login', $message = 'error');
    }
  }
}