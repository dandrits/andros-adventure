<?php
/**
 *
 * @version 1.1
 * @author  Dimitris Andritsakis
 * @package DELETE
 */

header("Content-Type: text/html; charset=utf-8");

function DeleteAppointment ( $username, $password_hash, $id ){

    global $app,$entityManager;

    $result = [];
    $params = ApiFunctions::loadParameters();
    if(!is_null($params['id']) && (int)$params['id']>=1 && (int)$params['id']<=99999999999){
      try {
        $sql = "SELECT * FROM tbl_users WHERE username='".$username."' AND password='".hasher($password_hash)."';";
        $stmt = $entityManager->getConnection()->prepare($sql);
        $stmt->execute();
        $apData = $stmt->fetchAll();

        $flag = ($apData!=[]&&$apData!=null&&is_array($apData))?true:false;
        if($flag){
          // user authenticated
          $sql2 = "SELECT * FROM tbl_appointments WHERE id=".$params['id'].";";
          $stmt2 = $entityManager->getConnection()->prepare($sql2);
          $stmt2->execute();
          $apData2 = $stmt2->fetchAll();

          if($apData2!=[]&&$apData2!=null&&is_array($apData2)&&$apData[0]['superuser']==1&&$apData[0]['status']==1){
            // user is active & admin and can delete
            $appointment = $entityManager->getReference('TblAppointments', $params['id']);
            $entityManager->remove($appointment);
            $entityManager->flush();
            $result["status"] = ExceptionCodes::NoErrors;
            $result["message"] = "Successfully deleted appointment with id: ".$params['id'];
          }else{
            $result["status"] = ExceptionCodes::NoErrors;
            $result["message"] = "Insufficient privileges and/or appointment does not exist";
          }
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
