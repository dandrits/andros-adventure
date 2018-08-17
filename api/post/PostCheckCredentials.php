<?php
/**
 *
 * @version 1.1
 * @author  Dimitris Andritsakis
 * @package POST
 */

header("Content-Type: text/html; charset=utf-8");

function PostCheckCredentials ( $username, $password_hash ){

    global $app,$entityManager,$salt;

    $result = array();
    $result["controller"] = __FUNCTION__;
    $result["function"] = substr($app->request()->getPathInfo(),1);
    $result["method"] = $app->request()->getMethod();
    $params = ApiFunctions::loadParameters();
    // $result["parameters"]  = $params;
    $result["success"] = false;

    try {

      $sql = "SELECT * FROM tbl_users WHERE username='".$username."' AND password='".hasher($password_hash)."';";
      $stmt = $entityManager->getConnection()->prepare($sql);
      $stmt->execute();
      $apData = $stmt->fetchAll();

      $flag = ($apData!=[]&&$apData!=null&&is_array($apData))?true:false;
      $result["success"] = $flag;

    //result_messages
        $result["status"] = ExceptionCodes::NoErrors;
        $result["message"] = "[".$result["method"]."][".$result["function"]."]:".ExceptionMessages::NoErrors;
    } catch (Exception $e) {
        $result["status"] = $e->getCode();
        $result["message"] = "[".$result["method"]."][".$result["function"]."]:".$e->getMessage();
    }
    return $result;
}

?>
