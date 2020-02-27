<?php
namespace app\widgets\gardenNinja\src\RatedPG13;

use app\widgets\gardenNinja\src\Store;

class RiceStore implements Store
{
	public function price($product)
	{
		echo $product . '<br>';
		return 10;
	}
}