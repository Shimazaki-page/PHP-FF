<?php

class Lives
{
    private $name;
    private $hitPoint;
    private $attackPoint;
    private $intelligence;

    public function __construct($name, $hitPoint = 50, $attackPoint = 10, $intelligence = 0)
    {
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint;
        $this->intelligence = $intelligence;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHitPoint()
    {
        $result = $this->hitPoint;
        if ($result < 0) {
            $result = 0;
        }
        return $result;
    }

    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }

    public function recoveryDamage($heal, $target)
    {
        $this->hitPoint += $heal;
        if ($this->hitPoint > $target::MAX_HITPOINT) {
            $this->hitPoint = $target::MAX_HITPOINT;
        }
    }

    //  攻撃するメソッド
    public function doAttack($targets)
    {
        if (!$this->isEnableAttack($targets)) {
            return false;
        }
        // ターゲットの決定
        $target = $this->selectTarget($targets);

        echo "『" .$this->name . "』の攻撃！\n";
        echo "【" . $target->getName() . "】に " . $this->attackPoint . " のダメージ！ \n";
        $target->tookDamage($this->attackPoint);
        return true;
    }

    //攻撃できるかチェック
    public function isEnableAttack($targets)
    {
        if ($this->hitPoint <= 0) {
            return false;
        }
        foreach ($targets as $target) {
            if ($target->getHitPoint() > 0) {
                return true;
            }
        }
    }

    public function selectTarget($targets)
    {
        $target = $targets[rand(0, count($targets) - 1)];
        while ($target->getHitPoint() <= 0) {
            $target = $targets[rand(0, count($targets) - 1)];
        }
        return $target;
    }
}