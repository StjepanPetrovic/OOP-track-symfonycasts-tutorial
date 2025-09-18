<?php

namespace Service;

use Model\AbstractShip;
use Model\RebelShip;
use Model\Ship;

class ShipLoader {
    public function __construct(private ShipStorageInterface $shipStorage)
    {
    }

    /**
     * @return AbstractShip[]
     */
    public function getShips()
    {
        try {
            $shipsData = $this->shipStorage->fetchAllShipsData();
        } catch (\PDOException $e) {
            trigger_error('Database exception! ' . $e->getMessage());
            $shipsData = [];
        }

        $ships = array();

        foreach ($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    /**
     * @param $id
     * @return AbstractShip
     */
    public function findOneById($id)
    {
        $shipArray = $this->shipStorage->fetchSingleShipData($id);

        return $this->createShipFromData($shipArray);
    }

    private function createShipFromData(array $shipData)
    {
        if ($shipData['team'] == 'rebel') {
            $ship = new RebelShip($shipData['name']);
        } else {
            $ship = new Ship($shipData['name']);
            $ship->setJediFactor($shipData['jedi_factor']);
        }

        $ship->setId($shipData['id']);
        $ship->setStrength($shipData['strength']);
        $ship->setStrength($shipData['weapon_power']);

        return $ship;
    }
}
