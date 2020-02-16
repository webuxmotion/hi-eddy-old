<?php

namespace app\controllers;

use core\Hi;

class MainController extends AppController {

  public function indexAction() {
    $posts = \R::findAll('test');
    $post = \R::findOne('test', 'id = ?', [2]);
    $this->set(compact('name', 'age', 'posts', 'post'));
    $this->setMeta(
      Hi::$eddy->getProperty('site_name'), 
      'Language Teacher', 
      'Teach language, italian, learn italian, english, learn english'
    );
  }
}