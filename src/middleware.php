<?php
/**
 *
 * @version 1.0
 * @author  Kostas Tsiolis
 * @package SRC
 */

ApiGeneralControllers::InitialLogRequest();
ApiGeneralControllers::ApiDocumentation();
ApiGeneralControllers::FunctionMethodNotFound();

//api end-points
$app->map('/appointments', DeleteAppointmentController)->via('DELETE');
$app->map('/appointments', GetAppointmentsController)->via('GET');
$app->map('/appointments', PostAppointmentsController)->via('POST');
?>
