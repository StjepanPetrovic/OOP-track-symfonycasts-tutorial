<?php

declare(strict_types=1);

use Entity\Ship;

require_once '../bootstrap.php';

$ship1 = new Ship('Ship 1', 5, 2, 1, 'crveni');

$entityManager->persist($ship1);
$entityManager->flush();

echo 'Ships created.';
