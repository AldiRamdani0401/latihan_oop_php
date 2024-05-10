<?php

require realpath(__DIR__ . '/../Core/Controller.php');

class ManagerController extends Controller {

  public function index () {
    $this->view->render('Managers/index');
  }
}