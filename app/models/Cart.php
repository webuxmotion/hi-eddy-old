<?php

namespace app\models;

use core\Hi;

class Cart extends AppModel 
{
  public function addToCart($product, $qty = 1, $mod = null) {
    if (!isset($_SESSION['cart.currency'])) {
      $_SESSION['cart.currency'] = Hi::$eddy->getProperty('currency');
    }
    if ($mod) {
      $ID = "{$product->id}-{$mod->id}";
      $title = "{$product->title} ({$mod->title})";
      $price = $mod->price;
    } else {
      $ID = $product->id;
      $title = $product->title;
      $price = $product->price;
    }
    if (isset($_SESSION['cart'][$ID])) {
      $_SESSION['cart'][$ID]['qty'] += $qty;
    } else {
      $_SESSION['cart'][$ID] = [
        'qty' => $qty,
        'title' => $title,
        'alias' => $product->alias,
        'price' => $price * $_SESSION['cart.currency']['value'],
        'img' => $product->img,
      ];
    }
    $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) 
      ? $_SESSION['cart.qty'] + $qty 
      : $qty;
    $additionalPrice = $price * $qty * $_SESSION['cart.currency']['value'];
    $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) 
      ? $_SESSION['cart.sum'] + $additionalPrice
      : $additionalPrice;
  }
}