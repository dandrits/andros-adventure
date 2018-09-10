<?php
/**
 *
 * @version 1.0
 * @author  Kostas Tsiolis
 * @package SRC
 */
function DeleteAppointmentController(){

    $params = ApiFunctions::loadParameters();
    $result = DeleteAppointment($params["activkey"],
                                $params["id"]
                                );

    $logExport['RESPONSE'] = array('Message' => $result["message"],
                                    'Status' => $result["status"]
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

function PostUsersController(){

    $params = ApiFunctions::loadParameters();
    $result = PostUsers($params["username"],
                        $params["password"]
                       );

    $logExport['RESPONSE'] = array('Message' => $result["message"],
                                    'Status' => $result["status"]
                                   );

    ApiFunctions::ApiResponse($result , $logExport);
}
?>
