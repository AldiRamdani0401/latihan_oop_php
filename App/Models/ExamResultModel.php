<?php

include 'Model.php';

class ExamResultModel extends Model {
  protected $id = "id";
  protected $username = "username";
  protected $password = "password";

  public function __construct($table) {
    parent::setTable($table);
  }
}

$datas = [
  ['username' => 'Asep', 'password' => '112233AA' ]
];

$ExamResultModel = new ExamResultModel('tb_users');
// Schema::createTable('tb_users', $schema);
// Schema::renameTable('tb_mahasiswa');
// Schema::clearTable();
// Schema::dropTable();
// $ExamResultModel->addColumnTable('keterangan', 'varchar', 50);
// $ExamResultModel->renameColumnTable('nama', 'name', 'varchar(100)');
// $ExamResultModel->changeColumnDatatype('nim', 'varchar(8)');
// $ExamResultModel->dropColumnTable('keterangan');
// $ExamResultModel->insert($data);
// $ExamResultModel->insertMany($datas);
// $ExamResultModel->all();
// var_dump($ExamResultModel->filterAndLimit('jurusan', 'informatika', 'a'));
// print_r($ExamResultModel->filterAndLimit('jurusan', 'teknik', 2));
// $ExamResultModel->filterLatest(2);
// $ExamResultModel->filterOldest(1);
// print_r($ExamResultModel->find('id', 5));
// ExamResultModel::find('id', 1);
// $ExamResultModel->update('id', '1', ['name' => 'Aldi', 'nim' => 11210334, 'jurusan' => 'Teknik Informatika']);
// $ExamResultModel->update('id', '1', ['jurusan' => 'Administrasi']);
// $ExamResultModel->delete(1);
