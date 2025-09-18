<?php

namespace Model;

class BattleResult
{

    /**
     * @param AbstractShip|null $winningShip
     * @param AbstractShip|null $losingShip
     * @param boolean $usedJediPowers
     */
    public function __construct(
        private $usedJediPowers,
        private ?AbstractShip $losingShip = null,
        private ?AbstractShip $winningShip = null,
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
