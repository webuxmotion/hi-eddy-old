<?php

namespace app\controllers;

use app\models\Cart;

class CartController extends AppController
{
  public function addAction() {
    $id = $this->getParam('id');
    $qty = $this->getParam('qty');
    $mod_id = $this->getParam('mod');
    $mod = null;
    
    if ($id) {
      $product = \R::findOne('product', 'id = ?', [$id]);
      if (!$product) {
        return false;
      };
      if ($mod_id) {
        $mod = \R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id, $id]);
      }
    }
    $cart = new Cart();
    $cart->addToCart($product, $qty, $mod);
    if ($this->isAjax()) {
      $this->loadView('cart_modal');
    }
    redirect();
  }

  private function getParam($param) {
    return !empty($_GET[$param]) ? (int)$_GET[$param] : null;
  }
}