<?php

interface CustomSessionHandler {
  public static function open();
  public static function close();
  public static function create();
  public static function read();
  public static function write($sessionId, $sessionData);
  public static function destroy($sessionId);
  public static function clear($maxLifetime);
}