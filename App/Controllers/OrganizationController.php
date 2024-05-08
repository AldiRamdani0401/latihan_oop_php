<?php

require realpath(__DIR__ . '/../Core/Controller.php');

class OrganizationController extends Controller {
  public function index () {
    $this->view->render('Organizations/index');
  }

  public static function create($organizationName, $adminLimit) {
    echo $organizationName, $adminLimit;
  }

  public static function update($data) {
    print_r($data);
  }

}