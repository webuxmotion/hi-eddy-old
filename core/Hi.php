<?php

namespace core;

class Hi {

  public static $eddy;
  
  public function __construct() {
    $query = trim($_SERVER['REQUEST_URI'], '/');
    session_start();
    self::$eddy = Registry::instance();
    $this->setParams();
    new ErrorHandler();
    Router::dispatch($query);
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