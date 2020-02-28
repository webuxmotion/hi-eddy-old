<?php require 'parts/breadcrumbs.php'; ?>
<?=$breadcrumbs; ?>	
<h1>test</h1>
<!--start-single-->
<div class="single contact">
	<div class="container">
		<div class="single-main">
			<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<?php if ($gallery) : ?>
							<?php require 'parts/gallery.php'; ?>
						<?php else : ?>
							<img src="/images/<?=$product->img?>">
						<?php endif; ?>
					</div>	
						<div class="col-md-7 single-top-right">
							<div class="single-para simpleCart_shelfItem">
							<h2><?=$product->title?></h2>
								<div class="star-on">
									<ul class="star-footer">
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
										</ul>
									<div class="review">
										<a href="#"> 1 customer review </a>
										
									</div>
								<div class="clearfix"> </div>
								</div>
								
								<h5 class="item_price js-price" data-value="<?=$price_obj::$convertedValue?>"><?=$price?></h5>

								<?php if ($oldPrice) : ?>
									<small><del><?=$oldPrice?></del></small>
								<?php endif; ?>

								<?=$product->content;?>

								<?php $mods ? $this->block('parts/mods', [
									'mods' => $mods,
									'curr' => $curr
								]) : null ?>

							<ul class="tag-men">
									<li><span>Category</span>
									<span class="women1">: 
						<a href="/category/<?=$cats[$product->category_id]['alias']?>"><?=$cats[$product->category_id]['title']?></a>
					</span></li>
				</ul>
				<input type="number" size="4" value="1" name="quantity" min="1" step="1">
				<a id="productAdd" 
					data-id="<?=$product->id;?>" 
					href="/cart/add?id=<?=$product->id;?>" 
					class="add-cart item_add add-to-cart-link">ADD TO CART</a>
								
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				<?php require 'parts/tabs.php'; ?>	

				<?php $related ? $this->block('parts/items', [
					'title' => 'Связанные товары',
					'items' => $related
				]) : null ?>

				<?php $recentlyViewed ? $this->block('parts/items', [
					'title' => 'Просмотренные товары',
					'items' => $recentlyViewed
				]) : null ?>

			</div>
			<?php require 'parts/filter.php'; ?>	
		</div>
	</div>
</div>
<!--end-single-->