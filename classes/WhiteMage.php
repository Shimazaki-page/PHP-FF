<?php

class WhiteMage extends Human
{
    const MAX_HITPOINT = 80;
    private $hitPoint = 80;
    private $attackPoint = 10;
    private $intelligence = 30;

    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint,$this->intelligence);
    }

    public function doAttackWhiteMage($enemies, $members)
    {
        if(!$this->isEnableAttack($enemies)){
            return false;
        }
        
        if (rand(1, 2) === 1) {
            $member=$this->selectTarget($members);
            
            echo "『" . $this->getName() . "』のスキルが発動した！\n";
            echo "『ケアル』！！\n";
            echo $member->getName() . "のHPを" . $this->intelligence * 1.5 . "回復！\n";
            $member->recoveryDamage($this->intelligence * 1.5, $member);
        } else {
            parent::doAttack($enemies);
        }
        return true;
    }
}