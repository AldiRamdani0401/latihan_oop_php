<?php

require 'Email.php';
require realpath(__DIR__ . '/../Core/Database.php');

class Verification {
  public static function generateCodeVerification($length = 6) {
    $characters = '0123456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
      $code .= $characters[mt_rand(0, strlen($characters) - 1)];
    }
    
    return $code;
  }

  public static function sendVerificationEmail($email) {
    $verificationCode = self::generateCodeVerification();
    Email::sendMail($email, $verificationCode, 'nyoba');
  }

  public static function verificationcode() {
    echo 'verificationcode terpanggil';
  }
}