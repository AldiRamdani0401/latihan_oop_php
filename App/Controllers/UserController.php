<?php

require realpath(__DIR__ . '/../Core/Controller.php');

class UserController extends Controller {
  public function show() {
    $this->view->render('Users/index');
  }
}