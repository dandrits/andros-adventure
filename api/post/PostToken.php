<?php
/**
 *
 * @version 1.0
 * @author  Kostas Tsiolis
 * @package POST
 */

header("Content-Type: text/html; charset=utf-8");

function PostToken (){

    global $server, $app;

    $result = array();
    $result["controller"] = __FUNCTION__;
    $result["function"] = substr($app->request()->getPathInfo(),1);
    $result["method"] = $app->request()->getMethod();

    $params = ApiFunctions::loadParameters();
    unset($params[client_secret]);
    $result["parameters"] = $params;

    $checkClientData = OAuthClientRepository::getClientDetails(OAuth2\Request::createFromGlobals()->request["client_id"]);

    if ($checkClientData["blocked"] === false) {
        $token = $server->handleTokenRequest(OAuth2\Request::createFromGlobals())->getResponseBody();
        $result["token"] = json_decode($token,true);

            if (array_key_exists('access_token',  $result["token"])) {
                $result["status"] = ExceptionCodes::NoErrors;
                $result["message"] = "[".$result["method"]."][".$result["function"]."]:".ExceptionMessages::NoErrors;
            } else {
                $result["status"] = ExceptionCodes::TokenError;
                $result["message"] = "[".$result["method"]."][".$result["function"]."]:".ExceptionMessages::TokenError;
            }

    } else {
        $result["checkClientData"]=$checkClientData;
        $result["status"] = ExceptionCodes::ClientTokenError;
        $result["message"] = "[".$result["method"]."][".$result["function"]."]:".ExceptionMessages::ClientTokenError;
    }

    return $result;
}
?>
