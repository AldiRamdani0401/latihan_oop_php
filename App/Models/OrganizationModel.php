<?php

class OrganizationModel extends Model {
  protected static $table = 'tb_organization';

  public function __construct() {
    parent::setTable(self::$table);
  }
  
  public static function createOrganization(array $datas) {
    return $result = Model::insert($datas);
  }

  public static function findOrganization($column, $data) {
    return $result = Model::find($column, $data);
  }
}