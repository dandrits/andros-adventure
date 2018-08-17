<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
 * @package INIT
 */

require_once "vendor/autoload.php";
OAuth2\Autoloader::register();

// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Doctrine & Entities autoloading
spl_autoload_register(function($class) {
    include 'src/entities/' . $class . '.php';
    include 'src/oauth-repositories/' . $class . '.php';
});

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$paths = array(__DIR__."/src/entities");
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

// database configuration parameters
require_once (__DIR__.'/src/config.php');
$conn = array(
    'driver'   => $conOptions['Driver'],
    'host'     => $conOptions['Host'],
    'user'     => $conOptions['Username'],
    'password' => $conOptions['Password'],
    'dbname'   => $conOptions['Database'],
    'charset'  => $conOptions['Charset']
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

//added enum fields to doctrine
$platform = $entityManager->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

// $clientStorage  = $entityManager->getRepository('OAuthClient');
?>
