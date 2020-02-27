<?php
namespace app\widgets\gardenNinja\src\RatedR;

use app\widgets\gardenNinja\src\Garden;

class MarijuanaGarden implements Garden
{
	public function items()
	{
		return array(
			new Marijuana, 
			new Marijuana, 
			new Marijuana, 
			new Marijuana
		);
	}
}