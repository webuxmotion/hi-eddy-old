<?php if (!empty($_SESSION['cart'])) : ?>
  <div class="table-responsive">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <td>Фото</td>
          <td>Имя</td>
          <td>Кол-во</td>
          <td>Цена</td>
          <td>
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
          <tr>
            <td>
              <a href="/product/<?=$item['alias']?>">
                <img src="/images/<?=$item['img']?>" alt="<?=$item['title']?>">
              </a>
            </td>
            <td>
              <a href="/product/<?=$item['alias']?>">
                <?=$item['title']?>
              </a>
            </td>
            <td><?=$item['qty']?></td>
            <td><?=$item['price']?></td>
            <td>
              <span 
                class="glyphicon glyphicon-remove text-danger js-del-item" 
                aria-hidden="true"
                data-id="<?=$id?>"
              ></span>
            </td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td>Итого кол-во:</td>
          <td colspan="4" class="text-right js-cart-qty"><?=$_SESSION['cart.qty']?></td>
        </tr>
        <tr>
          <td>На сумму:</td>
          <?php $priceWithSymbol = $_SESSION['cart.currency']['symbol_left'] 
            . $_SESSION['cart.sum'] 
            . $_SESSION['cart.currency']['symbol_right']; 
          ?>
          <td colspan="4" class="text-right js-cart-sum"><?=$priceWithSymbol?></td>
        </tr>
      </tbody>
    </table>
  </div>
<?php else : ?>
  <h3>Cart is empty!</h3>
<?php endif; ?>