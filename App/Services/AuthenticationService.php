<?php

require realpath(__DIR__ . '/../Core/Database.php');
require realpath(__DIR__ . '/../Entity/Manager.php');
require realpath(__DIR__ . '/../Entity/Admin.php');

class AuthenticationService {
  public static function authenticate($model, $username, $password) {
    $query = "SELECT * FROM $model WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query(Database::getConnection(), $query);
    $data = mysqli_fetch_assoc($result);
    $user = new User($username, $password);
    $user->setUserId($data['id']);
    $user->setUserLevel($data['level']);
    $isManager = new Manager($user);
    $isAdmin = new Admin($user);
    Database::closeConnection();
    if ($result->num_rows > 0) {
      if ($isManager->getStats()) {
        return 'managers';
      } else if ($isAdmin->getStats()) {
        return 'admins';
      }
      return 'users';
    }
  }
}