<?php

namespace app\widgets\gardenNinja\src;

use app\widgets\gardenNinja\src\Merchant;

class Client
{
	public function __construct(Merchant $Merchant)
	{
		$this->Merchant = $Merchant;
	}

	public function run()
	{
		print "Your merchant made $" . $this->Merchant->makeMoney() . PHP_EOL;
	}
}