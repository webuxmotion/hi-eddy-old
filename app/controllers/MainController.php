<?php

namespace app\controllers;

class MainController extends AppController {

  public function indexAction() {
    $this->setMeta('test');
  }
}