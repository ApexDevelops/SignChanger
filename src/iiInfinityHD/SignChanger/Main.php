<?php


namespace iiInfinityHD\SignChanger;


use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;

class Main extends PluginBase implements Listener {


    private $loaded = [];




  public function onEnable() {


        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        $this->loaded = [];


    }


    public function onInteract(\pocketmine\event\player\PlayerInteractEvent $event) {

        if(isset($this->loaded[$event->getPlayer()->getName()])) {
            $tile = $event->getPlayer()->getLevel()->getTile($event->getBlock());
            if($tile instanceof \pocketmine\tile\Sign) {
                $lines = $tile->getText();
                $lines[$this->loaded[$event->getPlayer()->getName()][0]] = (string) $this->loaded[$event->getPlayer()->getName()][1];
                $tile->setText($lines[0], $lines[1], $lines[2], $lines[3]);
                unset($this->loaded[$event->getPlayer()->getName()]);
                $event->getPlayer()->sendMessage("§aSuccefully set sign line !");
            }
        }
    }




    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){


        switch($cmd->getName()){


            case 'signchange':

            if(count($args) >= 2) {

                $line = $args[0] - 1;

                unset($args[0]);

                $msg = new XString(implode(" ", $args));

                $msg->replace("&", "§");

                $this->loaded[$sender->getName()] = [$line, $msg];
                $sender->sendMessage("§aTouch a sign to set it's line !");
                

                return true;
            }
            return false;

            break;


        }


     return false;


    }


}