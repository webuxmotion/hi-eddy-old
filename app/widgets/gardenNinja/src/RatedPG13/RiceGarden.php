<?php
namespace app\widgets\gardenNinja\src\RatedPG13;

use app\widgets\gardenNinja\src\Garden;

class RiceGarden implements Garden
{
	public function items()
	{
		return array(
			new Rice, 
			new Rice
		);
	}
}