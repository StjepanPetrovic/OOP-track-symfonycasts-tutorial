<?php

namespace Model;

final class BountyHunterShip extends AbstractShip
{
    use SettableJediFactorTrait;

    public function getType()
    {
        return 'Bounty Hunter';
    }

    public function isFunctional()
    {
        return true;
    }
}
