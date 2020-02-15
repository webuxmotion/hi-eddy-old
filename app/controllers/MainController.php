<?php

namespace app\controllers;

use core\Hi;

class MainController extends AppController {

  public function indexAction() {
    $this->setMeta(
      Hi::$eddy->getProperty('site_name'), 
      'Language Teacher', 
      'Teach language, italian, learn italian, english, learn english'
    );
    $name = 'Jogn';
    $age = 30;
    $this->set(compact('name', 'age'));
  }
}