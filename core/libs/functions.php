<?php

function debug($arr, $die = false) {
  echo '<pre>' . print_r($arr, true) . '</pre>';
  if ($die) die();
}

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

function redirect($http = false){
  if ($http) {
    $redirect = $http;
  } else {
    $redirect = $_SERVER['HTTP_REFERER'] ?: PATH;
  }
  header("Location: $redirect");
  exit;
}