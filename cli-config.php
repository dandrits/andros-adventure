<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
 * @package INIT
 */

// cli-config.php
require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);