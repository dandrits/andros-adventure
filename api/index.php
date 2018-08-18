<?php
/**
 *
 * @version 1.0
 * @author  Kostas Tsiolis
 * @package API
 */

header("Content-Type: text/html; charset=utf-8");
header('Content-Type: application/json');

require_once('../src/includes.php');
require_once "../vendor/slim/slim/Slim/Slim.php";

\Slim\Slim::registerAutoloader();

$logger = new \Flynsarmy\SlimMonolog\Log\MonologWriter(array(
    'name' => 'SlimApiLogger',
    'handlers' => [
            new \Monolog\Handler\StreamHandler(__DIR__ .'/../logs/'.date('Y-m-d').'-api.log', \Monolog\Logger::DEBUG),
            new \Monolog\Handler\StreamHandler(__DIR__ .'/../logs/'.date('Y-m-d').'-api-errors.log', \Monolog\Logger::ERROR),
            //new \Monolog\Handler\RotatingFileHandler(__DIR__ . "/../logs/api.log", 3, \Monolog\Logger::INFO)
    ],
    'processors' => [
    //new Monolog\Processor\WebProcessor(),
    new Monolog\Processor\UidProcessor()
    ]
));

$app = new \Slim\Slim([
    'log.enabled' => true,
    'log.writer'  => $logger,
    'log.level'   => \Slim\Log::DEBUG,
]);

$app->config('debug', true);
require __DIR__ . '/../src/middleware.php';
$app->run();

?>
