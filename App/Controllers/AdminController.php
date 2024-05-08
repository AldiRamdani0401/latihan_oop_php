<?php

require realpath(__DIR__ . '/../Core/Controller.php');
require realpath(__DIR__ . '/../Services/Session.php');

class AdminController extends Controller {
  public function index() {
    $this->view->render('Admins/index');
    Session::read();
  }
}