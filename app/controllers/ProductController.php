<?php

namespace app\controllers;

use core\libs\Helper;
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
    $price = Helper::getPrice($product->price);
    $oldPrice = Helper::getOldPrice($product->old_price);
    // breadcrumbs

    // related
    $related = \R::getAll("
      SELECT * FROM related_product
      JOIN product ON product.id = related_product.related_id
      WHERE related_product.product_id = ?
    ", [$product->id]);

    // viewed

    // gallery
    $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);

    // modifications

    $this->setMeta($product->title, $product->description, $product->keywords);
    $this->set(compact('product', 'curr', 'cats', 'price', 'oldPrice', 'related', 'gallery'));
  }
}