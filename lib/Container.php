<?php

class Container
{
    private $pdo;

    private $shipLoader;

    private $battleManager;

    public function __construct(private array $configuration)
    {
    }

    /**
     * @return PDO
     */
    public function getPDO()
    {
        if (null === $this->pdo) {
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass'],
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    /**
     * @return ShipLoader
     */
    public function getShipLoader()
    {
        if (null === $this->shipLoader){
            $this->shipLoader = new ShipLoader($this->getPDO());
        }

        return $this->shipLoader;
    }

    /**
     * @return BattleManager
     */
    public function getBattleManager()
    {
        if (null === $this->battleManager) {
            $this->battleManager = new BattleManager();
        }

        return $this->battleManager;
    }
}
