<?php

require realpath(__DIR__ . '/Interfaces/CustomSessionHandler.php');

class Session implements CustomSessionHandler {

  public function __construct() {
    session_start();
  }

  public static function open() {
    return true;
  }

  public static function close() {
    return true;
  }

  public static function create() {
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
    $session= new Session();
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

    if ($expiredSession['expired_at'] == $currentTime ||$expiredSession['expired_at'] < $currentTime) {
      self::destroy($sessionId);
      self::clear();
    }

    if (!$result->num_rows > 0) {
      header('Location: /login');
    }
    $db->close();
  }

  public static function write($sessionId, $sessionData){

  }

  public static function destroy($sessionId){
    $db = new mysqli('localhost', 'root', '', 'db_latihan_oop_php');
    $query = "DELETE FROM sessions WHERE id = ?";
    $statement = $db->prepare($query);
    $statement->bind_param('s', $sessionId);
    $statement->execute();
    $result = $statement->get_result();

    $db->close();
  }

  public static function clear($expiredSession){

  }

}