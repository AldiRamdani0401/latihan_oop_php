<?php

require realpath(__DIR__ . '/../Core/Model.php');

class UserModel extends Model {
  protected static $table = 'tb_users';

  public function __construct() {
    parent::setTable(self::$table);
  }

  public function getTable () {
    return self::$table;
  }
}