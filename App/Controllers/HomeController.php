<?php

include realpath(__DIR__ . "/../Core/Controller.php");

class HomeController extends Controller{
  public function index() {
    $this->view->render('home');
  }
}