<?php

interface CustomSessionHandler {
  public static function open();
  public static function close();
  public static function write();
  public static function read();
  public static function destroy($sessionId);
  public static function clear($currentTime);
}