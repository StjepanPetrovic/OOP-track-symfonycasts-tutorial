<?php

declare(strict_types=1);

use Entity\Voyage;

require_once '../bootstrap.php';

$connection = $entityManager->getConnection();

// daj dva putovanja
$sql = '
    SELECT 
        * 
    FROM voyage
    LIMIT 2
';
$stmt = $connection->executeQuery($sql);
//$stmt->bindValue();
$result = $stmt->fetchAllAssociative();
var_dump($result);


// Prikaži ime broda, ime luke iz koje je isplovio, ime luke u koju je uplovio i datume putovanja samo za brodove tipa 'passenger'.
$sql = '
    SELECT 
        ship.name,
        port_depart.name AS luka_polaska, 
        port_arrival.name AS luka_dolaska,
        ship.team
    FROM voyage
        INNER JOIN ship_doctrine AS ship ON voyage.ship_id = ship.id
        INNER JOIN port AS port_depart ON voyage.departurePort_id = port_depart.id
        INNER JOIN port AS port_arrival ON voyage.arrivalPort_id = port_arrival.id
    WHERE ship.team = "crveni"
';

$stmt = $connection->executeQuery($sql);
//$stmt->bindValue();
$result = $stmt->fetchAllAssociative();
var_dump($result);

//Prikaži ime svakog broda i ukupan broj putovanja koje je napravio.
//(Rezultat treba sadržavati ime broda i broj njegovih putovanja, sortirano po broju putovanja od najviše prema najmanje.)
//Bonus: Prikaži samo brodove koji su imali barem 2 putovanja
$sql = '
    SELECT 
        ship.name,
        COUNT(voyage.id) AS broj_putovanja
    FROM voyage
        INNER JOIN ship_doctrine AS ship ON voyage.ship_id = ship.id
    GROUP BY ship.name
    HAVING COUNT(voyage.id) >= 7
    ORDER BY broj_putovanja DESC 
';

$stmt = $connection->executeQuery($sql);
//$stmt->bindValue();
$result = $stmt->fetchAllAssociative();
var_dump($result);



//Prikaži sve luke i, ako postoji, ime broda koji je posljednji isplovio iz te luke (prema datumu polaska).
//Ako iz neke luke nije isplovio nijedan brod, prikaži NULL umjesto imena broda.
$sql = '
    SELECT 
        p.name AS luka,
        s.name AS brod,
        v.departureDate
    FROM port AS p
    LEFT JOIN voyage AS v ON p.id = v.departurePort_id
    LEFT JOIN ship_doctrine AS s ON v.ship_id = s.id
    WHERE v.departureDate = (
        SELECT MAX(v2.departureDate)
        FROM voyage AS v2
        WHERE v2.departurePort_id = p.id
    )
    OR v.departureDate IS NULL;
';

$stmt = $connection->executeQuery($sql);
//$stmt->bindValue();
$result = $stmt->fetchAllAssociative();
var_dump($result);



//Prikaži ime broda, ime luke dolaska, i datum dolaska za sva putovanja koja su završila u lukama u Drzavi 1 (country = 'drzava 1'), sortirano po datumu dolaska od najnovijeg prema najstarijem.
$qb = $entityManager->createQueryBuilder();

$qb->select('s.name AS brod', 'p.name AS luka_dolaska', 'v.arrivalDate')
    ->from(Voyage::class, 'v')
    ->join('v.ship', 's')
    ->join('v.arrivalPort', 'p')
    ->where('p.country = :country')
    ->setParameter('country', 'drzava 1')
    ->orderBy('v.arrivalDate', 'DESC');

$results = $qb->getQuery()->getResult();
var_dump($result);
