<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
 * @package SRC
 */

//system
require_once('functions.php');
require_once('config.php');
require_once('controllers.php');

// Doctrine & Entities autoloading
require_once ('../bootstrap.php');
spl_autoload_register(function($class) {
    include 'entities/' . $class . '.php';
});

//Classes
require_once('classes/ApiFunctions.php');
require_once('classes/ApiGeneralControllers.php');
require_once('classes/CRUDUtils.php');
require_once('classes/Filters.php');
require_once('classes/Pagination.php');
require_once('classes/Parameters.php');
require_once('classes/UserRoles.php');
require_once('classes/Validator.php');
require_once('classes/ValidatorFilters.php');

//Exceptions
require_once('exceptions/ExceptionCodes.php');
require_once('exceptions/ExceptionMessages.php');
require_once('exceptions/ExceptionManager.php');

//Rest
require_once('../api/post/PostCheckCredentials.php');

//Extend
require_once('../extend/classes/ExtendUserRoles.php');

?>
