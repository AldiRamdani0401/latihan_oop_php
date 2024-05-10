<?php

require realpath(__DIR__ . '/../Models/ExamModel.php');
require realpath(__DIR__ . '/../Models/OrganizationModel.php');
require realpath(__DIR__ . '/../Services/GenerateID.php');


class Exam {
  private $id;
  private $organizationId;
  private $name;
  private $category;
  private $examPkgCode;

  public function __construct($orgId) {
    $this->organizationId = $orgId;
  }

  public function getOrganizationData() {
    $model = new OrganizationModel();
    return $result = $model::findOrganization('id', $this->organizationId);
  }

  public function create($orgId, $name, $category, $admin) {
    $result = ExamModel::createExam(
      [
        'id' => $this->id = GenerateID::examId(),
        'organization_id' =>  $this->organizationId = $orgId,
        'name' => $this->$name,
        'category' => $this->category = $category,
        'examPkgCode' => $this->examPkgCode = GenerateID::examPkgCode(),
      ]
    );

    //Add new data to AdminModel related to OrganizationModel

    return $result;
  }

}