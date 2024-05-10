<?php

require realpath(__DIR__ . '/Interfaces/CustomSessionHandler.php');

class Session implements CustomSessionHandler {

  public static function open() {
    session_start();
  }

  public static function close() {
    session_destroy();
  }

  public static function write($level, $userId) {
    $sessionId = session_create_id();
    $permission = "inAccess,$level";

    date_default_timezone_set('Asia/Jakarta');
    $expireTime = date('Y-m-d H:i:s', strtotime('+6 hour'));

    $db = new mysqli('localhost', 'root', '', 'db_latihan_oop_php');
    $query = "INSERT INTO sessions (id, data, expired_at) VALUES (?, ?, ?)";
    $statement = $db->prepare($query);
    $statement->bind_param('sss', $sessionId, $permission, $expireTime);
    $statement->execute();
    $db->close();
    $_SESSION['data'] = [$sessionId, $permission, $userId];
  }

  public static function read(){
    $sessionId = $_SESSION['data'][0];
    $db = new mysqli('localhost', 'root', '', 'db_latihan_oop_php');
    $query = "SELECT * FROM sessions WHERE id = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('s', $sessionId);
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