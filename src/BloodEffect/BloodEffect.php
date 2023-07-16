<?php

namespace BloodEffect;

use BloodEffect\listener\DamageListener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class BloodEffect extends PluginBase {

    public function onEnable(): void
    {
        Server::getInstance()->getPluginManager()->registerEvents(new DamageListener(), $this);
    }
}