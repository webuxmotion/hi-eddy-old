<?php

define("DEBUG",  1);
define("ROOT",   dirname(__DIR__));
define("WWW",    ROOT . '/public');
define("APP",    ROOT . '/app');
define("CORE",   ROOT . '/core');
define("LIBS",   ROOT . '/core/libs');
define("CACHE",  ROOT . '/tmp/cache');
define("CONF",   ROOT . '/config');
define("LAYOUT", "default");
define("PATH", getAppPath());
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';

function getAppPath() {
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $protocol = 'https://';
  } else {
    $protocol = 'http://';
  }

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ?
    'https://' :
    'http://';
  
  $app_path = "{$protocol}{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
  $app_path = preg_replace("#[^/]+$#", '', $app_path);
  $app_path = str_replace('/public/', '', $app_path);

  return $app_path;
}

function showConstants() {
  echo '<pre>' . print_r(get_defined_constants(true)['user'], 1) . '</pre>';
}