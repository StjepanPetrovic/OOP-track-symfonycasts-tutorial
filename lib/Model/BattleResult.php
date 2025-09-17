<?php

class BattleResult
{

    public function __construct(
        private       $usedJediPowers,
        private ?Ship $losingShip = null,
        private ?Ship $winningShip = null,
    ){
    }

    public function getLosingShip()
    {
        return $this->losingShip;
    }

    public function getWinningShip()
    {
        return $this->winningShip;
    }

    public function wereJesiPowersUsed()
    {
        return $this->usedJediPowers;
    }

    public function isThereAWinner()
    {
        return $this->getWinningShip() !== null;
    }
}
