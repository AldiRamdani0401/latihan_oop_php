<?php

require realpath(__DIR__ . '/Interfaces/CustomSessionHandler.php');

class Session implements CustomSessionHandler {

  public static function open() {
    session_start();
  }

  public static function close() {
    session_destroy();
  }

  public static function write() {
    self::open();
    $sessionId = session_create_id();
    $sessionData = 1;

    date_default_timezone_set('Asia/Jakarta');
    $expireTime = date('Y-m-d H:i:s', strtotime('+6 hour'));

    $db = new mysqli('localhost', 'root', '', 'db_latihan_oop_php');
    $query = "INSERT INTO sessions (id, data, expired_at) VALUES (?, ?, ?)";
    $statement = $db->prepare($query);
    $statement->bind_param('sss', $sessionId, $sessionData, $expireTime);
    $statement->execute();
    $db->close();
    return [$sessionId, $sessionData];
  }

  public static function read(){
    self::open();
    $sessionId = $_SESSION['data'][0];
    $sessionData = $_SESSION['data'][1];

    $db = new mysqli('localhost', 'root', '', 'db_latihan_oop_php');
    $query = "SELECT * FROM sessions WHERE id = ? AND data = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('ss', $sessionId, $sessionData);
    $statement->execute();
    $result = $statement->get_result();
    $expiredSession = mysqli_fetch_assoc($result);

    date_default_timezone_set('Asia/Jakarta');
    $currentTime = date('Y-m-d H:i:s');

    if ($expiredSession['expired_at'] == $currentTime) {
      self::destroy($sessionId);
    }

    if ($expiredSession['expired_at'] < $currentTime) {
      self::clear($currentTime);
    }

    if (!$result->num_rows > 0) {
      header('Location: /login');
    }
    $db->close();
  }

  public static function destroy($sessionId){
    $db = new mysqli('localhost', 'root', '', 'db_latihan_oop_php');
    $query = "DELETE FROM sessions WHERE id = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('s', $sessionId);
    $statement->execute();
    $result = $statement->get_result();

    $db->close();
    Self::close();
  }

  public static function clear($currentTime){
    $db = new mysqli('localhost', 'root', '', 'db_latihan_oop_php');
    $query = "DELETE FROM sessions WHERE expired_at < ?";
    $statement = $db->prepare($query);
    $statement->bind_param('s', $currentTime);
    $statement->execute();

    $db->close();
  }
}