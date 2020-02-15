<?php

namespace core;

class ErrorHandler {

  public function __construct() {
    DEBUG ? error_reporting(-1) : error_reporting(0);
    set_exception_handler([$this, 'exceptionHandler']);
  }

  public function exceptionHandler($e) {
    $this->logErrors(
      $e->getMessage(), 
      $e->getFile(),
      $e->getLine()
    );
    $this->displayError(
      'Exception',
      $e->getMessage(), 
      $e->getFile(),
      $e->getLine(),
      $e->getCode()
    );
  }

  protected function logErrors($message = '', $file = '', $line = '') {
    $date = date('Y-m-d H:i:s');
    error_log(
      "[{$date}] Error text: {$message} | File: {$file} | Line: {$line}\n=========\n",
      3,
      TMP . '/errors.log'
    );
  }

  protected function displayError($errno, $errstr, $errfile, $errline, $responce = 404) {
    http_response_code($responce);
    if ($responce == 404 && !DEBUG) {
      require ERRORS . '/404.php';
      die;
    }
    require DEBUG ? ERRORS . '/dev.php' : ERRORS . '/prod.php';
    die;
  }
}