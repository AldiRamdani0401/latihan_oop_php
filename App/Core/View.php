<?php

class View {

  public function render ($template, $data = []) {
    $viewFile = realpath(__DIR__ . '/../Views') . "/$template" . '.php';

    if (file_exists($viewFile)) {
      extract($data);

      ob_start();

      include $viewFile;

      $output = ob_get_clean();

      echo $output;
    } else {
      echo "File view '$template' Not Found";
    }
  }
}