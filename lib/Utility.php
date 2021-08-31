<?php
//終了条件の判定
function isFinish($objects)
{
    $deathCnt = 0;
    foreach ($objects as $object) {
        if ($object->getHitPoint() > 0) {
            return false;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($objects)) {
        return true;
    }
}
