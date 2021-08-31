<?php

class Enemy extends Lives
{
    const MAX_HITPOINT = 50;

    public function __construct($name, $attackPoint)
    {
        $hitPoint = 50;
        $intelligence = 0;
        parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
    }
}