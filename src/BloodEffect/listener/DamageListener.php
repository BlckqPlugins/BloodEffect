<?php

namespace BloodEffect\listener;

use pocketmine\block\VanillaBlocks;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\world\particle\BlockBreakParticle;

class DamageListener implements Listener {

    /**
     * @param EntityDamageByEntityEvent $event
     * @return void
     * @priority MONITOR
     */
    public function onEntityDamage(EntityDamageByEntityEvent $event): void
    {
        if (!$event->isCancelled()){
            $player = $event->getEntity();
            $cause = $event->getCause();
            if ($player instanceof Player && $cause == $event::CAUSE_ENTITY_ATTACK){
                $player->getWorld()->addParticle($player->getLocation()->asVector3(), new BlockBreakParticle(VanillaBlocks::REDSTONE()));
            }
        }
    }
}