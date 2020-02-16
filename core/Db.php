<?php

namespace core;



class Db {

  use TSingletone;
  
  protected function __construct() {
    $db = require_once CONF . '/db.php';
    class_alias('\RedBeanPHP\R', '\R');
    \R::setup($db['dsn'], $db['user'], $db['pass']);
    if (!\R::testConnection()) {
      throw new \Exception("Not connected to Database!", 500);
    }
    \R::freeze(true);
    if (DEBUG) {
      \R::debug(true, 1);
    }
  }
}