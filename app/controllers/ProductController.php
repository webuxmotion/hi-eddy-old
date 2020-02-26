<?php

namespace app\controllers;

use core\Hi;

class ProductController extends AppController {

  public function viewAction() {
    $alias = $this->route['alias'];
    $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);
    if (!$product) {
      throw new \Exception("Page not found. Product {$alias} not found", 404);
    }

    $curr = Hi::$eddy->getProperty('currency'); 
    $cats = Hi::$eddy->getProperty('cats');
    $price = $curr['symbol_left'] . ' ' . $product->price * $curr['value'] . ' ' . $curr['symbol_right'];
    $oldPrice = $product->old_price
      ? ($curr['symbol_left'] . ' ' . $product->old_price * $curr['value'] . ' ' . $curr['symbol_right'])
      : null;
    // breadcrumbs

    // related

    // viewed

    // gallery

    // modifications

    $this->setMeta($product->title, $product->description, $product->keywords);
    $this->set(compact('product', 'curr', 'cats', 'price', 'oldPrice'));
  }
}