<?php

class GenerateID {
  public static function organizationId() {
    $generatedID = "org-" . random_int(100, 999999999);
    return $generatedID;
  }

  public static function memberAdminId() {
    $generatedID = "adm-" . random_int(100, 999999999);
    return $generatedID;
  }

  public static function memberExamineeId() {
    $generatedID = "exme-" . random_int(100, 999999999);
    return $generatedID;
  }

  public static function examId() {
    $generatedID = 'exm-' . random_int(100, 999999999);
    return $generatedID;
  }

  public static function examPkgCode() {
    $generatedID = 'exm-' . random_int(100, 999999999);
    return $generatedID;
  }
}