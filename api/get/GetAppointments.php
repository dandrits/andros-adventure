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
        foreach ($apData as $apDato) {
          $result['id'] = $apDato->getId();
	  $result['email'] = $apDato->getEmail();
	  $result['color'] = $apDato->getColor();
	  $result['name'] = $apDato->getName();
	  $result['persons'] = $apDato->getPersons();
	  $result['phone'] = $apDato->getPhone();
	  $result['start'] = $apDato->getStart();
	  $result['end'] = $apDato->getEnd();
        }
      }
    } catch (Exception $e) {
        $result["status"] = $e->getCode();
        $result["message"] = "[".$result["method"]."][".$result["function"]."]:".$e->getMessage();
    }
    return $result;
}

?>
