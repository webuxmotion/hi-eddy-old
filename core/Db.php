<?php

namespace core;

class Db {

  use TSingletone;
  
  protected function __construct() {
    $db = require_once CONF . '/db.php';
    debug($db);
  }
}