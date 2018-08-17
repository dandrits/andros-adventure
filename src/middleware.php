<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
 * @package SRC
 */

// ApiGeneralControllers::InitialLogRequest();
// ApiGeneralControllers::ApiDocumentation();
// ApiGeneralControllers::FunctionMethodNotFound();

//api end-points
$app->map('/login', UserCredentialsController)->via('POST');
?>
