<?php

namespace app\controllers;

use core\Hi;
use core\libs\Price;
use core\libs\Helper;
use app\models\Product;
use app\models\Breadcrumbs;

class ProductController extends AppController {

  public function viewAction() {
    $alias = $this->route['alias'];
    $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias]);
    if (!$product) {
      throw new \Exception("Page not found. Product {$alias} not found", 404);
    }

    $curr = Hi::$eddy->getProperty('currency'); 
    $cats = Hi::$eddy->getProperty('cats');
    $price_obj = new Price($product->price, $product->old_price);
    $price = $price_obj::$price;
    $oldPrice = $price_obj::$oldPrice;

    // breadcrumbs
    $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id, $product->title);

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
    $mods = \R::findAll('modification', 'product_id = ?', [$product->id]) ?? null;

    $this->setMeta($product->title, $product->description, $product->keywords);
    $this->set(compact('product', 'curr', 'cats', 'price', 'oldPrice', 'related', 'gallery', 'recentlyViewed', 'breadcrumbs', 'mods', 'price_obj'));
  }
}