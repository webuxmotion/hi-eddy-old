<?php

namespace app\controllers;

use core\Hi;
use core\Cache;

class MainController extends AppController {

  public function indexAction() {
    $this->setMeta(
      Hi::$eddy->getProperty('site_name'), 
      'Language Teacher', 
      'Teach language, italian, learn italian, english, learn english'
    );
  }
}