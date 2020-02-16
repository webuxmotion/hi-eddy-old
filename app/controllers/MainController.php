<?php

namespace app\controllers;

use core\Hi;
use core\Cache;

class MainController extends AppController {

  public function indexAction() {
    $posts = \R::findAll('test');
    $post = \R::findOne('test', 'id = ?', [2]);
    $cache = Cache::instance();
    $data = $cache->get('test');
    if (!$data) {
      $cache->set('test', $posts);
    }
    // $cache->delete('test');
    $this->set(compact('name', 'age', 'posts', 'post'));
    $this->setMeta(
      Hi::$eddy->getProperty('site_name'), 
      'Language Teacher', 
      'Teach language, italian, learn italian, english, learn english'
    );
  }
}