<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
 * @package SRC
 */

ApiGeneralControllers::InitialLogRequest();
ApiGeneralControllers::ApiDocumentation();
ApiGeneralControllers::FunctionMethodNotFound();

//api end-points
$app->map('/login', UserCredentialsController)->via('POST');
$app->map('/appointments', GetAppointmentsController)->via('GET');
$app->map('/appointments', PostAppointmentsController)->via('POST');
?>
