<?php

require realpath(__DIR__ . '/../Core/Controller.php');
require realpath(__DIR__ . '/../Services/Session.php');

class UserController extends Controller {
  public function show() {
    $this->view->render('Users/index');
    Session::read();
  }
}