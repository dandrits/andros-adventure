<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
 * @package SRC
 */

function UserRole($ui_user_id){

    global $app, $entityManager;

    $controller = substr($app->request()->getPathInfo(),1);
    $method = $app->request()->getMethod();

    try {
        if (Validator::isNull($ui_user_id)){
            throw new Exception(ExceptionMessages::NoUiUserId, ExceptionCodes::NoUiUserId);
        }

        $uiUser = $entityManager->getRepository('Users')->findOneBy(['id' => $ui_user_id]);
        if ( !$uiUser ) {throw new Exception(ExceptionMessages::NotFoundUiUserId, ExceptionCodes::NotFoundUiUserId);}

        $uiUserId = $uiUser->getId();
        $uiUserName = $uiUser->getUsername();
        $uiUserRole = $uiUser->getRole();
        $logExport['RESPONSE-CHECK USER ROLE'] = array('Message' => ExceptionMessages::NoErrors,
                                                        'Status' => ExceptionCodes::NoErrors,
                                                        'UserId' => $uiUserId,
                                                        'Username' => $uiUserName,
                                                        'UserRole' => $uiUserRole
                                                       );

        ApiFunctions::ApiLog($logExport);
        return array("username"=>$uiUserName, "role"=>$uiUserRole);
    } catch (Exception $e) {
        $result["status"] = $e->getCode();
        $result["message"] = "[".$method."][".$controller."]:".$e->getMessage();

        $logExport['RESPONSE-CHECK USER ROLE'] = array('Message' => $result["message"],
                                                        'Status' => $result["status"],
                                                        'Username-Role' => $uiUserName.'-'.$uiUserRole
                                                       );

        ApiFunctions::ApiResponse($result , $logExport);
        $app->stop();
    }
}

function UserRolePermissions(){

    global $app, $entityManager;

    $result = array();
    $controller = substr($app->request()->getPathInfo(),1);
    $method = $app->request()->getMethod();

    try {
        $accessTokenData = OAuthAccessTokenRepository::getAccessToken(OAuth2\Request::createFromGlobals()->query["access_token"]);
        $checkClientData = OAuthClientRepository::getClientDetailsById($accessTokenData["client_id"]);
        $role = $entityManager->getRepository('Users')->findOneBy(['role' => $checkClientData["handler_role_name"]]);

        //check if user is agent or not
        $checkRole = ($checkClientData["client_name"] == $checkClientData["handler_name"]) ?  $role->getRole() : 'agent' ;
        $check = ExtendUserRoles::checkUserRolePermissions($controller, $method, $checkRole);

        var_dump($check);die();

        if ($check!==true){
            throw new Exception(ExceptionMessages::Unauthorized, ExceptionCodes::Unauthorized);
        }
    } catch (Exception $e) {
        $result["user"] = $checkClientData["client_id"];
        $result["user_role"] = $checkRole;
        $result["status"] = $e->getCode();
        $result["message"] = "[".$method."][".$controller."]:".$e->getMessage();

        $logExport['RESPONSE-CHECK USER PERMISSIONS'] = array('Message' => $result["message"],
                                                                'Status' => $result["status"],
                                                                'UserParams' => $result["user"].'-'.$result["user_role"]
                                                               );

        ApiFunctions::ApiResponse($result , $logExport);
        $app->stop();
    }
}

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

function ValidateToken(){

    try {

        global $server,$app;
        $params = ApiFunctions::loadParameters();

        if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals()))
            throw new Exception(ExceptionMessages::TokenError, ExceptionCodes::TokenError);
        else{
           $logExport['RESPONSE-CHECK TOKEN'] = array('Message' => ExceptionMessages::NoErrors,
                                                        'Status' => ExceptionCodes::NoErrors,
                                                        'TokenValidateData' => $params
                                                       );

            ApiFunctions::ApiLog($logExport);
            return;
        }
    } catch (Exception $e) {
        //uncomment to view original error
        //$server->getResponse()->send();
        $result["message"] = "[".$app->request()->getMethod()."][".__FUNCTION__."]:".$e->getMessage();
        $result["status"] = $e->getCode();
        echo json_encode($result);

        $logExport['RESPONSE-CHECK TOKEN'] = array('Message' => $result["message"],
                                                    'Status' => $result["status"],
                                                    'TokenValidateData' => $params
                                                   );

        ApiFunctions::ApiLog($logExport);
        $app->stop();
    }
}

function TokenController(){

    $result = PostToken();

    $logExport['RESPONSE'] = array('Message' => $result["message"],
                                    'Status' => $result["status"],
                                    'UserParams' => $result["parameters"],
                                    'TokenResponseData' => $result["token"],
                                    'ClientResponseData' => $result["checkClientData"]
                                   );

    ApiFunctions::ApiResponse($result , $logExport);
}

function VerifyTokenController(){

    $result = GetVerifyToken();

    $logExport['RESPONSE'] = array('Message' => $result["message"],
                                    'Status' => $result["status"],
                                    'UserParams' => $result["parameters"],
                                    'VerifyTokenResponseData' => $result["verify"]
                                   );

    ApiFunctions::ApiResponse($result , $logExport);
}
?>
