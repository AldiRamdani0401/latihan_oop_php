<?php

require realpath(__DIR__ . '/../Core/Database.php');
require realpath(__DIR__ . '/../Entity/Manager.php');
require realpath(__DIR__ . '/../Entity/Admin.php');

class AuthenticationService {
  public static function authenticate($model, $username, $password) {
    $connection = Database::getConnection();
    $query = "SELECT * FROM $model WHERE username = ? AND password = ?";
    if ($connection) {
      $statement = $connection->prepare($query);
      $statement->bind_param("ss", $username, $password);
      $statement->execute();
      $result = $statement->get_result();
      $dataUser = mysqli_fetch_assoc($result);
      $user = new User($username, $password);
      $user->setUserId($dataUser['id']);
      $user->setUserLevel($dataUser['level']);
      $isManager = new Manager($user);
      $isAdmin = new Admin($user);
      if ($isManager->getStats()) {
        Session::write($isManager->getUserLevel(), $isManager->getUserId());
        return 'manager';
      } else if ($isAdmin->getStats()) {
        return 'admin';
      }
      return 'user';
    }
  }
}