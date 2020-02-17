<?php

namespace app\widgets\currency;

use core\Hi;

class Currency {

  protected $tpl;
  protected $currencies;
  protected $currency;
  protected $options;

  public function __construct($options) {
    $this->options = $options;
    $this->tpl = __DIR__ . '/tpl/currency.php';
    $this->run();

  }

  protected function run() {
    $this->currencies = Hi::$eddy->getProperty('currencies');
    $this->currency = Hi::$eddy->getProperty('currency');
    echo $this->getHtml();
  }

  public static function getCurrencies() {
    return \R::getAssoc("
      SELECT code, title, symbol_left, symbol_right, value, base
      FROM currency ORDER BY base DESC
    ");
  }

  public static function getCurrency($currencies) {
    if (
      isset($_COOKIE['currency']) &&
      array_key_exists($_COOKIE['currency'], $currencies)
    ) {
      $key = $_COOKIE['currency'];
    } else {
      $key = key($currencies);
    }
    $currency = $currencies[$key];
    $currency['code'] = $key;

    return $currency;
  }

  protected function getHtml() {
    ob_start();
    require_once $this->tpl;
    return ob_get_clean();
  }
}