<!--<div>-->
<!--	<img src="/HI-EDDY.png" width="100%">-->
<!--</div>-->
<!--banner-starts-->
<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
			    <li>
					<img src="/images/bnr-1.jpg" alt=""/>
				</li>
				<li>
					<img src="/images/bnr-2.jpg" alt=""/>
				</li>
				<li>
					<img src="/images/bnr-3.jpg" alt=""/>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 

<?php if (isset($brands)) : ?>
	<!--about-starts-->
	<div class="about"> 
		<div class="container">
			<div class="about-top grid-1">
                <?php foreach ($brands as $brand) : ?>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="/images/<?=$brand->img?>" alt=""/>
						<figcaption>
							<h2><?=$brand->title?></h2>
							<p><?=$brand->description?></p>
						</figcaption>			
					</figure>
				</div>
				<?php endforeach; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--about-end-->
<?php endif; ?>

<?php if (isset($hits)) : ?>
<?php $curr = \core\Hi::$eddy->getProperty('currency'); ?>
	<!--product-starts-->
	<div class="product"> 
		<div class="container">
			<div class="product-top">
				<div class="product-one">
                    <?php foreach ($hits as $hit) : ?>
                      <?php
                        $actualPrice = \core\libs\Helper::getPrice($hit->price);
                        $oldPrice = \core\libs\Helper::getOldPrice($hit->old_price);
                      ?>
					<div class="col-md-3 product-left">
						<div class="product-main simpleCart_shelfItem">
							<a href="/product/<?=$hit->alias?>" class="mask"><img class="img-responsive zoom-img" src="/images/<?=$hit->img?>" alt="" /></a>
							<div class="product-bottom">
								<h3><a href="/product/<?=$hit->alias?>"><?=$hit->title?></a></h3>
								<p>Explore Now <?=$hit->id?></p>
								<h4>
                                    <a data-id="<?=$hit->id?>" class="item_add js-add-to-cart" href="/cart/add?d=<?=$hit->id?>"><i></i></a>
                                    <span class=" item_price"><?=$actualPrice?></span>
                                      <?php if ($oldPrice) : ?>
                                          <small><del><?=$oldPrice;?></del></small>
                                      <?php endif; ?>
                                </h4>
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
		</div>
	</div>
	<!--product-end-->

<?php endif; ?>