<?php
/**
 *
 * @version 1.1
 * @author  Dimitris Andritsakis
 * @package GET
 */

header("Content-Type: text/html; charset=utf-8");

function GetAppointments ( ){

    global $app,$entityManager;

    $result = [];

    try {
      $qb = $entityManager->createQueryBuilder();
      $qb->select('m')
          ->from('Appointments', 'm')
          ->where('m.start >= :start')
          ->setParameter('start', new \DateTime(), \Doctrine\DBAL\Types\Type::DATETIME);
      $apData = $qb->getQuery()->getResult();
      if($apData!=[]&&$apData!=null&&is_array($apData)){
        foreach ($apData as $key=>$value) {
          $result[$key]['id'] = $value->getId();
	  $result[$key]['email'] = $value->getEmail();
	  $result[$key]['color'] = $value->getColor();
	  $result[$key]['name'] = $value->getName();
	  $result[$key]['persons'] = $value->getPersons();
	  $result[$key]['phone'] = $value->getPhone();
	  $result[$key]['start'] = $value->getStart();
	  $result[$key]['end'] = $value->getEnd();
        }
      }
    } catch (Exception $e) {
        $result["status"] = $e->getCode();
        $result["message"] = "[".$result["method"]."][".$result["function"]."]:".$e->getMessage();
    }
    return $result;
}

?>
