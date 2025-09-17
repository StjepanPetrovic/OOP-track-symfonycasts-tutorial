<?php

class Ship
{
    private $name;

    private $weaponPower = 0;

    private $jediFactor = 0;

    private $strength = 0;

    private $underRepair;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->underRepair = mt_rand(1, 100) < 30;
    }

    public function isFunctional()
    {
        return !$this->underRepair;
    }

    public function sayHello(){
        echo 'HALO';
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function setStrength($value)
    {
        if (!is_numeric($value)) {
            throw new Exception('Invalid strength passed ' . $value);
        }

        $this->strength = $value;
    }

    public function getWeaponPower()
    {
        return $this->weaponPower;
    }

    public function setWeaponPower($weaponPower)
    {
        $this->weaponPower = $weaponPower;
    }

    public function getJediFactor()
    {
        return $this->jediFactor;
    }

    public function setJediFactor($jediFactor)
    {
        $this->jediFactor = $jediFactor;
    }

    public function getNameAndSpecs($shortEcho)
    {
        if ($shortEcho) {
            return sprintf(
                '%s: %s,%s,%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        } else {
            return sprintf(
                '%s: w:%s, j:%s, s:%s',
                $this->name,
                $this->weaponPower,
                $this->jediFactor,
                $this->strength
            );
        }
    }

    public function doesGivenShipHaveMoreStrength($givenShip)
    {
        return $givenShip->strength > $this->strength;
    }
}
