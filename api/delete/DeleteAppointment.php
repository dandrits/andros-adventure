<?php
/**
 *
 * @version 1.1
 * @author  Dimitris Andritsakis
 * @package DELETE
 */

header("Content-Type: text/html; charset=utf-8");

function DeleteAppointment ( $username, $password_hash, $id ){

    global $app,$entityManager,$salt;

    $result = [];
    $params = ApiFunctions::loadParameters();
    if(!is_null($params['id']) && $params['id']!='' && (int)$params['id']>=1){
      try {
        $sql = "SELECT * FROM tbl_users WHERE username='".$username."' AND password='".hasher($password_hash)."';";
        $stmt = $entityManager->getConnection()->prepare($sql);
        $stmt->execute();
        $apData = $stmt->fetchAll();

        $flag = ($apData!=[]&&$apData!=null&&is_array($apData))?true:false;
        if($flag){
          // user authenticated
          $result["status"] = $params['id'];
        }else{
          $result["status"] = ExceptionCodes::NoErrors;
          $result["message"] = "You must authenticate";
        }
      } catch (Exception $e) {
          $result["status"] = $e->getCode();
          $result["message"] = "[".$result["method"]."][".$result["function"]."]:".$e->getMessage();
      }
    }
    else {
      $result["status"] = ExceptionCodes::NoErrors;
      $result["message"] = "Appointement id must be a number: 0 < id < 99999999999";
    }
    return $result;
}
?>
