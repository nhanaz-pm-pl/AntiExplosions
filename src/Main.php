<?php

declare(strict_types=1);

namespace NhanAZ\AntiExplosions;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\entity\ExplosionPrimeEvent;

class Main extends PluginBase implements Listener {

	protected function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveDefaultConfig();
	}

	public function onExplosionPrime(ExplosionPrimeEvent $event) {
		$worldName = $event->getEntity()->getPosition()->getWorld()->getDisplayName();
		$worlds = $this->getConfig()->get("Worlds", []);
		switch ($this->getConfig()->get("Mode", "all")) {
			case "all":
				$event->setBlockBreaking(false);
				break;
			case "whitelist":
				if (in_array($worldName, $worlds, true)) {
					$event->setBlockBreaking(false);
				}
				break;
			case "blacklist":
				if (!in_array($worldName, $worlds, true)) {
					$event->setBlockBreaking(false);
				}
				break;
		}
	}
}
