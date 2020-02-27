<?php

namespace app\controllers;

use core\Hi;
use app\widgets\abstractFactory\Starter;

class MainController extends AppController {

  public function indexAction() {
    $brands = \R::find('brand', 'LIMIT 3');
    $hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
    $this->set(compact('brands', 'hits'));
    $this->setMeta(
      Hi::$eddy->getProperty('site_name'),
      'Language Teacher', 
      'Teach language, italian, learn italian, english, learn english'
    );
  }

  public function testAction() {
    new Starter();
    die();
  }
}