<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require __DIR__ . '/vendor/autoload.php';

$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=oo_battle',
    'db_user' => 'root',
    'db_pass' => null,
);

$dbParamsDoctrine = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'oo_battle_2',
];

$configDoctrine = ORMSetup::createAttributeMetadataConfig(
    paths: [__DIR__ . '/lib/Entity'],
    isDevMode: true,
);
$configDoctrine->enableNativeLazyObjects(true);
$connection = DriverManager::getConnection($dbParamsDoctrine, $configDoctrine);
$entityManager = new EntityManager($connection, $configDoctrine);
