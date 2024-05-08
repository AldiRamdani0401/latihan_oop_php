<?php

include '/Model.php';

class AdminModel extends Model {
  protected $id = "id";
  protected $name = "name";
  protected $password = "password";
  protected $adminId = "admin_id";
  protected $level = "level";

  public function __construct($table) {
    parent::setTable($table);
  }
}

$AdminModel = new AdminModel('tb_admin');
// Schema::createTable('tb_admin', $schema);
// Schema::renameTable('tb_mahasiswa');
// Schema::clearTable();
// Schema::dropTable();
// $AdminModel->addColumnTable('keterangan', 'varchar', 50);
// $AdminModel->addColumnTable('user_id', 'varchar', 20);
// $AdminModel->renameColumnTable('nama', 'name', 'varchar(100)');
// $AdminModel->changeColumnDatatype('nim', 'varchar(8)');
// $AdminModel->dropColumnTable('keterangan');
// $AdminModel->insert($data);
// $AdminModel->insertMany($datas);
// $AdminModel->all();
// var_dump($AdminModel->filterAndLimit('jurusan', 'informatika', 'a'));
// print_r($AdminModel->filterAndLimit('jurusan', 'teknik', 2));
// $AdminModel->filterLatest(2);
// $AdminModel->filterOldest(1);
// print_r($AdminModel->find('id', 5));
// AdminModel::find('id', 1);
// $AdminModel->update('id', '1', ['name' => 'Aldi', 'nim' => 11210334, 'jurusan' => 'Teknik Informatika']);
// $AdminModel->update('id', '1', ['jurusan' => 'Administrasi']);
