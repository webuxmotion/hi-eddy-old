<?php

namespace app\controllers;

use core\Hi;
use core\libs\Helper;
use app\models\Product;

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
    $p_model = new Product();
    $p_model->setRecentlyViewed($product->id);

    $r_viewed = $p_model->getRecentlyViewed();

    $recentlyViewed = null;
    
    if ($r_viewed) {
      $recentlyViewed = \R::find('product', 'id IN (' . \R::genSlots($r_viewed) . ') LIMIT 3', $r_viewed);
    }

    // gallery
    $gallery = \R::findAll('gallery', 'product_id = ?', [$product->id]);

    // modifications

    $this->setMeta($product->title, $product->description, $product->keywords);
    $this->set(compact('product', 'curr', 'cats', 'price', 'oldPrice', 'related', 'gallery', 'recentlyViewed'));
  }
}