<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
 * @package SRC
 */
function UserCredentialsController(){

    $params = ApiFunctions::loadParameters();
    $result = PostCheckCredentials($params["username"],
                          $params["password"]
                        );

    $logExport['RESPONSE'] = array('Message' => $result["message"],
                                    'Status' => $result["status"],
                                    'UserParams' => $result["parameters"],
                                    'uUsername' => $result["username"]
                                   );

    ApiFunctions::ApiResponse($result , $logExport);
}

function GetAppointmentsController(){

    $result = GetAppointments();

    $logExport['RESPONSE'] = array('Message' => $result["message"],
                                    'Status' => $result["status"],
                                    'UserParams' => $result["parameters"],
                                    'GetAppointmentsResponseData' => $result["success"]
                                   );

    ApiFunctions::ApiResponse($result , $logExport);
}
?>
