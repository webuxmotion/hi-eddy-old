<div class="latestproducts">
	<div class="product-one">
        <h3><?=$title ?? 'Default title'?>:</h3>
        <?php foreach ($items as $item) : ?>
			<?php
				$price = \core\libs\Helper::getPrice($item['price']);
				$old_price = \core\libs\Helper::getOldPrice($item['old_price']);
			?>
			<div class="col-md-4 product-left p-left"> 
				<div class="product-main simpleCart_shelfItem">
					<a href="/product/<?=$item['alias']?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?=$item['img']?>" alt="" /></a>
					<div class="product-bottom">
						<h3><?=$item['title']?></h3>
						<p>Explore Now</p>
						<h4>
							<a 
								class="item_add add-to-cart-link" 
								href="/cart/add?id=<?=$item['id']?>"
								data-id="<?=$item['id']?>"
							><i></i></a> 
							<span class=" item_price"><?=$price?></span>
						</h4>
						<?php if ($old_price) : ?>
							<h3><del><?=$old_price?></del></h3>
						<?php endif; ?>
						
					</div>
					<div class="srch">
						<span>-50%</span>
					</div>
				</div>
			</div>
        <?php endforeach; ?>
		<div class="clearfix"></div>
	</div>
</div>