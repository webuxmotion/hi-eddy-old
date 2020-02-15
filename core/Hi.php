<?php

namespace core;

class Hi {

  public static $eddy;
  
  public function __construct() {
    $query = trim($_SERVER['QUERY_STRING'], '/');
    session_start();
    self::$eddy = Registry::instance();
    $this->setParams();
  }

  protected function setParams() {
    $params = require_once CONF . '/params.php';
    if (!empty($params)) {
      foreach ($params as $key => $value) {
        self::$eddy->setProperty($key, $value);
      }
    }
  }
}