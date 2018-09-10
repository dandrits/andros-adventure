<?php
/**
 *
 * @version 1.1
 * @author  Dimitris Andritsakis
 * @package DELETE
 */

header("Content-Type: text/html; charset=utf-8");

function DeleteAppointment ( $activkey, $id ){

    global $app,$entityManager;

    $result = [];
    $params = ApiFunctions::loadParameters();
    try {
      if($id!=''&&$activkey!=''){
	$qb = $entityManager->createQueryBuilder();
        $qb->select('a')
          ->from('Appointments', 'a')
          ->where('a.id = :id')
          ->setParameter('id',$id);
        $apData = $qb->getQuery()->getResult();

        $flag = ($apData!=[]&&$apData!=null&&is_array($apData))?true:false;
        if($flag){
	$qb2 = $entityManager->createQueryBuilder();
        $qb2->select('u')
            ->from('Users', 'u')
            ->where('u.activkey = :key')
            ->setParameter('key',$activkey);
        $apData2 = $qb2->getQuery()->getResult();
          if($apData2!=[]&&$apData2!=null&&is_array($apData2)&&$apData2[0]->getSuperuser()==1&&$apData2[0]->getStatus()==1){
            // user is active & admin and can delete
            $appointment = $entityManager->getReference('Appointments', $id);
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
          $result["message"] = "Invalid appointment id";
        }
       }else{
	$result["status"] = '800';
	$result["message"] = 'Id and/or activkey must not be empty!';
       }
      } catch (Exception $e) {
          $result["status"] = $e->getCode();
          $result["message"] = "[".$result["method"]."][".$result["function"]."]:".$e->getMessage();
      }
    return $result;
}
?>
