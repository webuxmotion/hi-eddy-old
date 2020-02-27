<?php
namespace app\widgets\gardenNinja\src\RatedR;

use app\widgets\gardenNinja\src\Store;

class MarijuanaStore implements Store
{
	public function price($product)
	{
		echo $product . '<br>';
		return 100;
	}
}