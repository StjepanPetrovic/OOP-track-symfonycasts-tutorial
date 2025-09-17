<?php

class ShipLoader {
    public function __construct(private PDO $pdo)
    {
    }

    /**
     * @return Ship[]
     */
    public function getShips()
    {
        $shipsData = $this->queryForShips();

        $ships = array();

        foreach ($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    public function findOneById($id) {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(array('id' => $id));
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$shipArray) {
            return null;
        }

        return $this->createShipFromData($shipArray);
    }

    private function createShipFromData(array $shipData)
    {
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setStrength($shipData['strength']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['weapon_power']);

        return $ship;
    }

    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $shipsArray;
    }

    private function getPDO()
    {
        return $this->pdo;
    }
}
