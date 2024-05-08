<?php

include 'Model.php';

class ExamModel extends Model {
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

$ExamModel = new ExamModel('tb_exam');
// Schema::createTable('tb_users', $schema);
// Schema::renameTable('tb_mahasiswa');
// Schema::clearTable();
// Schema::dropTable();
// $ExamModel->addColumnTable('keterangan', 'varchar', 50);
// $ExamModel->renameColumnTable('nama', 'name', 'varchar(100)');
// $ExamModel->changeColumnDatatype('nim', 'varchar(8)');
// $ExamModel->dropColumnTable('keterangan');
// $ExamModel->insert($data);
// $ExamModel->insertMany($datas);
// $ExamModel->all();
// var_dump($ExamModel->filterAndLimit('jurusan', 'informatika', 'a'));
// print_r($ExamModel->filterAndLimit('jurusan', 'teknik', 2));
// $ExamModel->filterLatest(2);
// $ExamModel->filterOldest(1);
// print_r($ExamModel->find('id', 5));
// ExamModel::find('id', 1);
// $ExamModel->update('id', '1', ['name' => 'Aldi', 'nim' => 11210334, 'jurusan' => 'Teknik Informatika']);
// $ExamModel->update('id', '1', ['jurusan' => 'Administrasi']);
// $ExamModel->delete(1);
