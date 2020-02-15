<?php

namespace core;

class Registry {

  use TSingletone;

  protected static $properties = [];

  public static function setProperty($name, $value) {
    self::$properties[$name] = $value;
  }

  public static function getProperty($name) {
    return self::$properties[$name] ?? null;
  }

  public function getProperties() {
    return self::$properties;
  }
}