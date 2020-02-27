<?php

namespace app\widgets\gardenNinja\src\RatedR;

use app\widgets\gardenNinja\src\Merchant;

class DrugDealer extends Merchant
{
	public function createStore()
	{
		return new MarijuanaStore;
	}

	public function createGarden()
	{
		return new MarijuanaGarden;
	}
}