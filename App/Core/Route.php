<?php

require_once realpath(__DIR__ . '/../Services/Session.php');
Session::open();

include realpath(__DIR__ . '/../Services/AuthMiddleware.php');

class Route {
  protected $routes = [];

  public function get($route, $controller, $middleware = null) {
    $this->addRoute('GET', $route, $controller, $middleware);
  }

  public function post($route, $controller, $middleware = null) {
      $this->addRoute('POST', $route, $controller, $middleware);
  }

  protected function addRoute($method, $route, $controller, $middleware = null) {
      $this->routes[$method][$route] = [
          'controller' => $controller,
          'middleware' => $middleware
      ];
  }

  public function dispatch($url) {
    $method = $_SERVER['REQUEST_METHOD'];
    if (array_key_exists($url, $this->routes[$method])) {
        $route = $this->routes[$method][$url];
        if (isset($route['middleware'])) {
            $middlewareParts = explode('@', $route['middleware']);
            $middlewareClass = $middlewareParts[0];
            $middlewareMethod = $middlewareParts[1];
            $middlewareInstance = new $middlewareClass();
            $result = $middlewareInstance->$middlewareMethod();
            if (!$result) {
                echo 'Anda tidak memiliki izin untuk mengakses halaman ini';
                return;
            }
        }
        $this->callController($route['controller']);
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