<?php

class ShipLoader {
    public function getShips()
    {
        $ships = array();

        $ship = new Ship('Jedi Starfighter');
        $ship->setWeaponPower(5);
        $ship->setJediFactor(15);
        $ship->setStrength(30);
        $ships['starfighter'] = $ship;

        $ship2 = new Ship('CloakShape Fighter');
        $ship2->setWeaponPower(2);
        $ship2->setJediFactor(2);
        $ship2->setStrength(70);
        $ships['CloakShape'] = $ship2;

        $ship3 = new Ship('Super Star Destroyer');
        $ship3->setWeaponPower(7);
        $ship3->setJediFactor(0);
        $ship3->setStrength(500);
        $ships['Destroyer'] = $ship3;

        $ship4 = new Ship('RZ-1 A-wing interceptor');
        $ship4->setWeaponPower(4);
        $ship4->setJediFactor(4);
        $ship4->setStrength(50);
        $ships['interceptor'] = $ship4;

        return $ships;
    }
}
