<?php

require realpath(__DIR__ . '/../Core/Controller.php');
require realpath(__DIR__ . '/../Entity/Organization.php');

Session::read();

class OrganizationController extends Controller {

  protected function getDataOrganization() {
    $ownerId = $_SESSION['data'][2];
    $organization = new Organization($ownerId);
    return $result = $organization->getOrganizationData();
  }

  public function index () {
    $this->view->render('Organizations/index', $this->getDataOrganization());
  }

  public function createOrganizationForm () {
    $this->view->render('Organizations/create');
  }

  public function create() {
    $organization = $this->getDataOrganization();
    $name = $_POST['name'];
    $adminLimit = $_POST['adminLimit'];
    $examLimit = $_POST['examLimit'];
    $examineeLimit = $_POST['examineeLimit'];
    $result = $organization->create($name, $adminLimit, $examLimit, $examineeLimit);
    if ($result) {
      header("Location: /manager/organization");
    }
    // echo $result; -> Hasil akan ditampilkan pada class Flasher.
  }

  public function update($data) {
    print_r($data);
  }

  public function delete($data) {
    print_r($data);
  }
}