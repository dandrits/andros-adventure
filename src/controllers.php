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
                                    'UserParams' => $result["parameters"]
                                   );

    ApiFunctions::ApiResponse($result , $logExport);
}

function GetAppointmentsController(){

    $result = GetAppointments();

    $logExport['RESPONSE'] = array('Message' => $result["message"],
                                    'Status' => $result["status"]
                                   );

    ApiFunctions::ApiResponse($result , $logExport);
}

function PostAppointmentsController(){

    $params = ApiFunctions::loadParameters();
    $result = PostAppointments($params["id"],
                               $params["name"],
                               $params["start"],
                               $params["end"],
                               $params["color"],
                               $params["email"],
                               $params["phone"]
                              );

    $logExport['RESPONSE'] = array('Message' => $result["message"],
                                    'Status' => $result["status"]
                                   );

    ApiFunctions::ApiResponse($result , $logExport);
}
?>
