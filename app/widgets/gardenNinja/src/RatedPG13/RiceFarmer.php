<?php

namespace app\widgets\gardenNinja\src\RatedPG13;

use app\widgets\gardenNinja\src\Merchant;

class RiceFarmer extends Merchant
{
	public function createStore()
	{
		return new RiceStore;
	}

	public function createGarden()
	{
		return new RiceGarden;
	}
}