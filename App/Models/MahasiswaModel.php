<?php

include 'Model.php';

class MahasiswaModel extends Model {
  public function __construct($table) {
    parent::setTable($table);
  }
}

$MahasiswaModel = new MahasiswaModel('tb_mahasiswa');
// Schema::createTable('tb_mahasiswa', $schema);
// Schema::renameTable('tb_mahasiswa');
// Schema::clearTable();
// Schema::dropTable();
// $MahasiswaModel->addColumnTable('keterangan', 'varchar', 50);
// $MahasiswaModel->addColumnTable('user_id', 'varchar', 20);
// $MahasiswaModel->renameColumnTable('nama', 'name', 'varchar(100)');
// $MahasiswaModel->changeColumnDatatype('nim', 'varchar(8)');
// $MahasiswaModel->dropColumnTable('keterangan');
// $MahasiswaModel->insert($data);
// $MahasiswaModel->insertMany($datas);
// $MahasiswaModel->all();
// var_dump($MahasiswaModel->filterAndLimit('jurusan', 'informatika', 'a'));
// print_r($MahasiswaModel->filterAndLimit('jurusan', 'teknik', 2));
// $MahasiswaModel->filterLatest(2);
// $MahasiswaModel->filterOldest(1);
// print_r($MahasiswaModel->find('id', 5));
// MahasiswaModel::find('id', 1);
// $MahasiswaModel->update('id', '1', ['name' => 'Aldi', 'nim' => 11210334, 'jurusan' => 'Teknik Informatika']);
// $MahasiswaModel->update('id', '1', ['jurusan' => 'Administrasi']);
