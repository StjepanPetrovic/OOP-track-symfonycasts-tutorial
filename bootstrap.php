<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;

require __DIR__ . '/vendor/autoload.php';

$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=oo_battle',
    'db_user' => 'root',
    'db_pass' => null,
);

$applicationMode = 'development';

if ($applicationMode === "development") {
    $queryCache = new ArrayAdapter();
    $metadataCache = new ArrayAdapter();
} else {
    $queryCache = new PhpFilesAdapter('doctrine_queries');
    $metadataCache = new PhpFilesAdapter('doctrine_metadata');
}

$config = new Configuration;
$config->setMetadataCache($metadataCache);
$driverImpl = new AttributeDriver([__DIR__ . '/lib/Entity'], true);
$config->setMetadataDriverImpl($driverImpl);
$config->setQueryCache($queryCache);

if (PHP_VERSION_ID > 80400) {
    $config->enableNativeLazyObjects(true);
} else {
    $config->setProxyDir(__DIR__ . '/lib/Proxies');
    $config->setProxyNamespace('Proxies');
    if ($applicationMode === "development") {
        $config->setAutoGenerateProxyClasses(true);
    } else {
        $config->setAutoGenerateProxyClasses(false);
    }
}

$connection = DriverManager::getConnection([
    'driver' => 'pdo_sqlite',
    'path' => 'database.sqlite',
], $config);

$em = new EntityManager($connection, $config);
