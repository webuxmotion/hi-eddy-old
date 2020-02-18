<?php

namespace app\controllers;

use core\base\Controller;
use core\Hi;
use app\models\AppModel;
use app\widgets\currency\Currency;

class AppController extends Controller {
  
  public function __construct($route) {
    parent::__construct($route);
    new AppModel();
    $currencies = Currency::getCurrencies();
    Hi::$eddy->setProperty('currencies', $currencies);
    Hi::$eddy->setProperty('currency', Currency::getCurrency($currencies));
  }
}