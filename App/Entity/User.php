<?php

class User {
  private $userId;
  private $userLevel;
  private $userName;
  private $password;

  public function __construct($username, $password) {
    $this->username = $username;
    $this->password = $password;
  }

  public function setUserId($id) {
    $this->userId = $id;
  }

  public function setUserLevel($level) {
    $this->userLevel = $level;
  }

  public function getUserId() {
    return $this->userId;
  }

  public function getUserLevel() {
    return $this->userLevel;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getPassword() {
    return $this->password;
  }
}