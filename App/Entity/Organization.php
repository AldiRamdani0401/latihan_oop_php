<?php

require realpath(__DIR__ . '/../Models/UserModel.php');
require realpath(__DIR__ . '/../Services/GenerateID.php');
require realpath(__DIR__ . '/../Models/OrganizationModel.php');

class Organization {
  private $id;
  private $name;
  private $ownerId;
  private $adminLimit;
  private $memberAdminCode;
  private $examLimit;
  private $examineeLimit;
  private $memberExamineeCode;

  public function __construct($ownerId) {
    $this->ownerId = $ownerId;
  }

  public function create ($name, $adminLimit, $examLimit, $examineeLimit) {
    return $result = OrganizationModel::createOrganization(
      [
        'id' => $this->id = GenerateID::organizationId(),
        'owner_id' => $this->ownerId,
        'name' => $this->name = $name,
        'admin_limit' => $this->adminLimit = $adminLimit,
        'exam_limit' => $this->examLimit = $examLimit,
        'examinee_limit' => $this->examineeLimit = $examineeLimit,
        'member_admin_code' => $this->memberAdminCode = GenerateID::memberAdminId(),
        'member_examinee_code' => $this->memberExamineeCode = GenerateID::memberExamineeId()
      ]
    );
  }

  public function getData () {
    $_POST['organization'] = array(
      $this->id,
      $this->name,
      $this->ownerId,
      $this->adminLimit,
      $this->memberAdminCode,
      $this->examLimit,
      $this->examineeLimit
    );
  }

  public function getOwnerData() {
    $model = new UserModel;
    return $model->find('id', $this->ownerId);
  }

  public function getOrganizationData() {
    $model = new OrganizationModel;
    return $model->findOrganization('owner_id', $this->ownerId);
  }

}