<?php

class RebelShip extends AbstractShip
{
    public function getFavoriteJedi()
    {
        $coolJedis = array('Yoda', 'Ben Kenobi');
        $key = array_rand($coolJedis);

        return $coolJedis[$key];
    }

    public function getType()
    {
        return 'Rebel';
    }

    public function isFunctional()
    {
        return true;
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        return parent::getNameAndSpecs($useShortFormat) . ' (Rebel)';
    }

    public function getJediFactor()
    {
        return rand(10, 30);
    }
}
