<?php

include 'Model.php';

class AnswerModel extends Model {
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

$AnswerModel = new AnswerModel('tb_answer');
// Schema::createTable('tb_users', $schema);
// Schema::renameTable('tb_mahasiswa');
// Schema::clearTable();
// Schema::dropTable();
// $AnswerModel->addColumnTable('keterangan', 'varchar', 50);
// $AnswerModel->renameColumnTable('nama', 'name', 'varchar(100)');
// $AnswerModel->changeColumnDatatype('nim', 'varchar(8)');
// $AnswerModel->dropColumnTable('keterangan');
// $AnswerModel->insert($data);
// $AnswerModel->insertMany($datas);
// $AnswerModel->all();
// var_dump($AnswerModel->filterAndLimit('jurusan', 'informatika', 'a'));
// print_r($AnswerModel->filterAndLimit('jurusan', 'teknik', 2));
// $AnswerModel->filterLatest(2);
// $AnswerModel->filterOldest(1);
// print_r($AnswerModel->find('id', 5));
// AnswerModel::find('id', 1);
// $AnswerModel->update('id', '1', ['name' => 'Aldi', 'nim' => 11210334, 'jurusan' => 'Teknik Informatika']);
// $AnswerModel->update('id', '1', ['jurusan' => 'Administrasi']);
// $AnswerModel->delete(1);
