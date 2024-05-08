<?php

include realpath(__DIR__ . "/../Core/Controller.php");
include realpath(__DIR__ . "/../Services/Verification.php");

class RegisterController extends Controller{

  public function __construct() {
    parent::__construct();
  }

  public function show() {
    $this->view->render('registration/index');
  }

  public function organization() {
    $this->view->render('registration/organization');
  }

  public function send() {
    Verification::sendVerificationEmail('budi@gmail.com', 'coba');
  }

  public function verifyCode() {
    Verification::verificationcode();
  }

}