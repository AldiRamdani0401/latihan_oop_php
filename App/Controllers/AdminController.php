<?php

require realpath(__DIR__ . '/../Core/Controller.php');

class AdminController extends Controller {
  public function index() {
    $this->view->render('Admins/index');
  }
}