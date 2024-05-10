<?php

class AuthMiddleware {
  protected $sessionData;

  public function getSession() {
    if (isset($_SESSION['data'])) {
      $sessionData = $_SESSION['data'];
      $getAccess = explode(',', $sessionData[1]);
      $accessPermissionPart = $getAccess[0];
      $accessLevelPart = $getAccess[1];
      $this->sessionData = [$accessPermissionPart, $accessLevelPart];
    }
  }

  public function manager() {
      $this->getSession();
      if ($this->sessionData) {
        if ($this->sessionData[0] == 'inAccess' && $this->sessionData[1] == 'manager') {
          return true;
        }
      }
      return false;
  }

  public function admin() {
    $this->getSession();
    if ($this->sessionData) {
      if ($this->sessionData[0] == 'inAccess' && $this->sessionData[1] == 'admin') {
        return true;
      }
    }
    return false;
}

  public function user() {
    $this->getSession();
    if ($this->sessionData) {
      if ($this->sessionData[0] == 'inAccess' && $this->sessionData[1] == 'user') {
        return true;
      }
    }
    return false;
  }
}