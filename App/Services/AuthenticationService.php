<?php

require realpath(__DIR__ . '/../Core/Database.php');

class AuthenticationService {
  public static function authenticate($model, $username, $password) {
    $query = "SELECT * FROM $model WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query(Database::getConnection(), $query);
    Database::closeConnection();
    if ($result->num_rows > 0) {
      return true;
    }
  }
}