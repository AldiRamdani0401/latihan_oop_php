<?php

require realpath(__DIR__ . '/../Core/Model.php');

class ExamModel extends Model {
protected static $table = 'tb_exam';

  public function __construct() {
    parent::setTable(self::$table);
  }

  public function createExam(array $datas) {
    return $result = Model::insert($datas);
  }

}