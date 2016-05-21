<?php

namespace KawaiiJoin;

use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\level\sound\BlazeShootSound;
use pocketmine\level\particle\DustParticle;
use pocketmine\level\Level;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;

class KawaiiJoin extends PluginBase{

    public function onJoin(PlayerJoinEvent $event){
      $player = $event->getPlayer();
			$level = $player->getLevel();
			$xpos = $player->getX();
			$ypos = $player->getY();
			$zpos = $player->getZ();
			$c = new Vector3($xpos, $ypos, $zpos);
			$sound = new BlazeShootSound($c);
			$level->addSound($sound);
			$r = mt_rand();
			$g = mt_rand();
			$b = mt_rand();
			$a = 1;
			$radius = 0.5;
			$count = 250;
			$particle = new DustParticle($c, $r, $g, $b, $a);
				for($yaw = 0, $y = $c->y; $y < $c->y + 4; $yaw += (M_PI * 2) / 20, $y += 1 / 20){
					$x = -sin($yaw) + $c->x;
					$z = cos($yaw) + $c->z;
					$r = mt_rand();
					$g = mt_rand();
					$b = mt_rand();
					$a = 1;
					$particle = new DustParticle($c, $r, $g, $b, $a);
					$particle->setComponents($x, $y, $z);
					$level->addParticle($particle);
					}
			}
	}
