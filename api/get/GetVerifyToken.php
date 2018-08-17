<?php
/**
 *
 * @version 1.0
 * @author  Kostas Tsiolis
 * @package POST
 */

header("Content-Type: text/html; charset=utf-8");

function GetVerifyToken (){

    global $server, $app;

    $result = array();
    $result["controller"] = __FUNCTION__;
    $result["function"] = substr($app->request()->getPathInfo(),1);
    $result["method"] = $app->request()->getMethod();
    $params = ApiFunctions::loadParameters();
    $result["parameters"]  = $params;

    if ($server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
        $result["verify"] = true;
        $result["status"] = ExceptionCodes::NoErrors;
        $result["message"] = "[".$result["method"]."][".$result["function"]."]:".ExceptionMessages::NoErrors;
    } else {
        $result["verify"] = false;
        $result["status"] = ExceptionCodes::TokenError;
        $result["message"] = "[".$result["method"]."][".$result["function"]."]:".ExceptionMessages::TokenError;
    }

    return $result;
}
?>