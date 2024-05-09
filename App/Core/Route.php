<?php
// include 'Autoloading.php';

class Route {
  protected $routes = [];

  public function get($route, $controller) {
    $this->routes[$route] = $controller;
  }

  public function post($route, $controller) {
    $this->routes[$route] = $controller;
  }

  public function patch($route, $controller) {
    $this->routes[$route] = $controller;
  }

  public function delete($route, $controller) {
    $this->routes[$route] = $controller;
  }

  public function dispatch($url) {
    if (array_key_exists($url, $this->routes)) {
      $controller = $this->routes[$url];
      $this->callController($controller);
    } else {
      echo "404 Not Found";
    }
  }

  protected function callController($controller) {
    $controllerParts = explode('@', $controller);
    $controllerName = $controllerParts[0];
    $action = $controllerParts[1];

    $controllerFile =  realpath(__DIR__ . '/../controllers/' . $controllerName . '.php');
    if (file_exists($controllerFile)) {
      require_once "$controllerFile";
      $controllerInstance = new $controllerName();
      if (method_exists($controllerInstance, $action)) {
        $controllerInstance->$action();
      } else {
        echo "Action '$action' Not Found";
      }
    } else {
      echo "Controller '$controllerName' Not Found";
    }
  }
}