<?php

namespace app\controllers;

use core\Hi;

class MainController extends AppController {

  public function indexAction() {
    $brands = \R::find('brand', 'LIMIT 3');
    $this->setMeta(
      Hi::$eddy->getProperty('site_name'), 
      'Language Teacher', 
      'Teach language, italian, learn italian, english, learn english'
    );
    $this->set(compact('brands'));
  }
}