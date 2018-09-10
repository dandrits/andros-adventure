<?php
/**
 *
 * @version 1.1
 * @author  Dimitris Andritsakis
 * @package POST
 */

header("Content-Type: text/html; charset=utf-8");

function PostUsers ( $username,$password ){

    global $app,$entityManager;
    $result = [];
    $params = ApiFunctions::loadParameters();
    try {
	$qb = $entityManager->createQueryBuilder();
	$qb->select('u')
          ->from('Users', 'u')
          ->where('u.username = :user')
	  ->andWhere('u.password = :pass')
          ->setParameters(['user'=>$username,'pass'=>hasher($password)]);
	$apData = $qb->getQuery()->getResult();
        $flag = ($apData!=[]&&$apData!=null&&is_array($apData))?true:false;
	$result['success'] = $flag;
	$result['activkey'] = ($flag)?$apData[0]->getActivkey():'';
     }catch (Exception $e) {
          $result["status"] = $e->getCode();
          $result["message"] = "[".$result["method"]."][".$result["function"]."]:".$e->getMessage();
     }
     return $result;
}
?>
