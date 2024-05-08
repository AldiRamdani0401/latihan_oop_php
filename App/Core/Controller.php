<?php

include_once 'View.php';

class Controller {
  protected $view;

  public function __construct() {
    $this->view = new View();
  }

  protected function loadModel ($model) {
    $modelFile = realpath(__DIR__ . "/../Models/$model.php");

    if (file_exists($modelFile)) {
      include "$modelFile";
      return new $model();
    } else {
      echo "Model : '$model' Not Found";
      return null;
    }
  }
}