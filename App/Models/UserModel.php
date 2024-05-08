<?php

include '../Core/Model.php';

class UserModel extends Model {
  protected $id = "id";
  protected $username = "username";
  protected $password = "password";

  public function __construct($table) {
    parent::setTable($table);
  }
}