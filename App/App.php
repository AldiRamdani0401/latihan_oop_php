<?php

include 'Core/Route.php';

class App {
  protected $router;

  public function __construct() {
    $this->router = $this->setup_routes();
    $this->router->dispatch($_SERVER['REQUEST_URI']);
  }

  protected function setup_routes() {
    $route = new Route();

    $route->get('/', 'HomeController@index');
    $route->get('/login', 'LoginController@index');
    $route->post('/login/', 'LoginController@login');
    $route->get('/register', 'RegisterController@show');
    $route->get('/register/organization', 'RegisterController@organization');
    $route->get('/register/verification', 'RegisterController@send');
    $route->post('/register/verification/', 'RegisterController@verifyCode');

    // Managers Route
    $route->get('/managers', 'ManagerController@index');

    // Organization Route
    $route->get('/managers/organization', 'OrganizationController@index');

    // Admins Route
    $route->get('/admins', 'AdminController@index');


    // Users Route
    $route->get('/users', 'UserController@show');



    return $route;
  }
}