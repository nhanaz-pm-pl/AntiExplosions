<?php

declare(strict_types=1);

namespace NhanAZ\AntiExplosions;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\entity\ExplosionPrimeEvent;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onExplosionPrime(ExplosionPrimeEvent $event) {
		$event->setBlockBreaking(false);
	}
}
