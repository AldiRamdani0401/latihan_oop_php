<?php

require realpath(__DIR__ . '/../Core/Model.php');

class LevelAccessModel extends Model {
  protected static $table = 'tb_level_access';

  public function __construct() {
    parent::__construct(self::$table);
  }

}

new LevelAccessModel();
LevelAccessModel::insert(["id" => session_create_id(), "level" => "manager"]);