<?php
/*
* _____ _              _____ _                                 
* / ____(_)            / ____| |                                
*| (___  _  __ _ _ __ | |    | |__   __ _ _ __   __ _  ___ _ __ 
* \___ \| |/ _` | '_ \| |    | '_ \ / _` | '_ \ / _` |/ _ \ '__|
* ____) | | (_| | | | | |____| | | | (_| | | | | (_| |  __/ |   
*|_____/|_|\__, |_| |_|\_____|_| |_|\__,_|_| |_|\__, |\___|_|   
*           __/ |                                __/ |          
*          |___/                                |___/           
*
*/

namespace iiInfinityHD\SignChanger;


use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;

class XString {

    public function __construct(string $str) {
        $this->str = $str;
    }


    public function __toString() {
        return $this->str;
    }

    public function replace($replace, $ment) {
        $this->str = str_ireplace($replace, $ment, $this->str);
        return $this;
    }


    public function indexOf($str) {
        return strpos($this->str, $str);
    }
}