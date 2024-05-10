<?php

require 'Core/Route.php';

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

    // Manager Route
    $route->get('/manager', 'ManagerController@index', 'AuthMiddleware@manager');

    // Manager Organization Route
    $route->get('/manager/organization', 'OrganizationController@index', 'AuthMiddleware@manager');
    $route->get('/manager/organization/create', 'OrganizationController@createOrganizationForm', 'AuthMiddleware@manager');
    $route->post('/manager/organization/create/', 'OrganizationController@create', 'AuthMiddleware@manager');

    // Manager Exam Route
    $route->get('/manager/organization/exam/create', 'ExamController@createExamForm', 'AuthMiddleware@manager');
    $route->post('/manager/organization/exam/create/', 'ExamController@createExam', 'AuthMiddleware@manager');

    // Admin Route
    $route->get('/admin', 'AdminController@index', 'AuthMiddleware@admin');

    // User Route
    $route->get('/user', 'UserController@show', 'AuthMiddleware@user');

    return $route;
  }
}