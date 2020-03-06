<?php

namespace App\Traits;

trait LockableTrait
{
	//protected $_lockout_time = 10;

	public function getLockoutTime()
	{
		return 1;
	}

	public function hasLockoutTime()
	{
		return $this->getLockoutTime() > 0;
	}
}