<?php

require_once realpath(__DIR__ . '/../Config/Constants.php');

class Database {
  private $host = PORT;
  private $username = USER;
  private $password = PASS;
  private $database = DATABASE;
  private $connection;

  public function __construct() {
    $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
      if ($this->connection->connect_error) {
        die ("Connection Failed: " . $this->connection->connect_error);
      }
  }

  public static function getConnection() {
    $self = new self();
    echo 'Database Connected! <br>';
    return $self->connection;
  }

  public static function closeConnection() {
    $self = new self();
    echo 'Database Closed! <br>';
    return mysqli_close($self->connection);
  }
}