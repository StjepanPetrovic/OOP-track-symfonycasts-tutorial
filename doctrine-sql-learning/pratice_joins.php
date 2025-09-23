<?php

declare(strict_types=1);

require_once '../bootstrap.php';

$connection = $entityManager->getConnection();

$sql = 'SELECT ship.name, port_depart.name, port_arrival.name FROM voyage INNER JOIN ship_doctrine AS ship ON voyage.ship_id = ship.id INNER JOIN port AS port_depart ON voyage.departurePort_id = port_depart.id INNER JOIN  port AS port_arrival ON voyage.arrivalPort_id = port_arrival.id';
$stmt = $connection->executeQuery($sql);
//$stmt->bindValue();
$result = $stmt->fetchAllAssociative();
var_dump($result);die();
