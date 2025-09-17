<?php

class BattleResult
{

    /**
     * @param Ship $winningShip
     * @param Ship $losingShip
     * @param boolean $usedJediPowers
     */
    public function __construct(
        private       $usedJediPowers,
        private ?Ship $losingShip = null,
        private ?Ship $winningShip = null,
    ){
    }

    /**
     * @return boolean
     */
    public function wereJediPowersUsed()
    {
        return $this->usedJediPowers;
    }

    /**
     * @return Ship|null
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     * @return Ship|null
     */
    public function getLosingShip()
    {
        return $this->losingShip;
    }

    /**
     * Was there a winner? Or did everybody die :(
     *
     * @return bool
     */
    public function isThereAWinner()
    {
        return $this->getWinningShip() !== null;
    }
}
