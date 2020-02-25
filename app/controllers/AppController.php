<?php

namespace app\controllers;

use core\base\Controller;
use core\Hi;
use core\Cache;
use app\models\AppModel;
use app\widgets\currency\Currency;

class AppController extends Controller {
  
  public function __construct($route) {
    parent::__construct($route);
    new AppModel();
    $currencies = Currency::getCurrencies();
    Hi::$eddy->setProperty('currencies', $currencies);
    Hi::$eddy->setProperty('currency', Currency::getCurrency($currencies));
    Hi::$eddy->setProperty('cats', self::cacheCategory());
  }

  public static function cacheCategory() {
    $cache = Cache::instance();
    $cats = $cache->get('cats');
    if (!$cats) {
      $cats = \R::getAssoc("SELECT * FROM category");
      $cache->set('cats', $cats);
    }
    return $cats;
  }
}