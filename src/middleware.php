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
$app->map('/token', TokenController)->via('POST');
$app->map('/verify_token', VerifyTokenController)->via('GET');
// $app->map('/login', ValidateToken, UserCredentialsController)->via('POST');
$app->map('/login', UserCredentialsController)->via('POST');
?>
