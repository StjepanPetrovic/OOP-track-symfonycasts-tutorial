<?php

declare(strict_types=1);

use Doctrine\Common\Collections\Order;

require_once '../bootstrap.php';

$connection = $entityManager->getConnection();

$sql = '';
$stmt = $connection->prepare($sql);
$stmt->bindValue();
$result = $stmt->executeQuery();
var_dump($result->fetchAssociative());

$dql = 'SELECT category FROM App\Entity\Category as category ORDER BY category.name';
$query = $entityManager->createQuery($dql);
$result = $query->getResult();

$qb = $entityManager->createQueryBuilder('ship_doctrine')
    ->addOrderBy('ship_doctrine.name', Order::Descending->value);
$qb_result = $qb->getQuery()->getResult();
