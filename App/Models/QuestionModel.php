<?php

include 'Model.php';

class QuestionModel extends Model {
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

$QuestionModel = new QuestionModel('tb_question');
// Schema::createTable('tb_users', $schema);
// Schema::renameTable('tb_mahasiswa');
// Schema::clearTable();
// Schema::dropTable();
// $QuestionModel->addColumnTable('keterangan', 'varchar', 50);
// $QuestionModel->renameColumnTable('nama', 'name', 'varchar(100)');
// $QuestionModel->changeColumnDatatype('nim', 'varchar(8)');
// $QuestionModel->dropColumnTable('keterangan');
// $QuestionModel->insert($data);
// $QuestionModel->insertMany($datas);
// $QuestionModel->all();
// var_dump($QuestionModel->filterAndLimit('jurusan', 'informatika', 'a'));
// print_r($QuestionModel->filterAndLimit('jurusan', 'teknik', 2));
// $QuestionModel->filterLatest(2);
// $QuestionModel->filterOldest(1);
// print_r($QuestionModel->find('id', 5));
// QuestionModel::find('id', 1);
// $QuestionModel->update('id', '1', ['name' => 'Aldi', 'nim' => 11210334, 'jurusan' => 'Teknik Informatika']);
// $QuestionModel->update('id', '1', ['jurusan' => 'Administrasi']);
// $QuestionModel->delete(1);
