<?php

class Manager {
  private $userId;
  private $userLevel;
  private $username;
  private $organizationId;
  private $stats;

  public function __construct(User $user) {
    if ($user->getUserLevel() == 1) {
      $this->userId = $user->getUserId();
      $this->userLevel = $user->getUserLevel();
      $this->username = $user->getUsername();
      $this->stats = true;
    } else {
      $this->stats = false;
    }
  }

  public function getStats() {
    return $this->stats;
  }
}