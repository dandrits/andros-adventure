<?php
/**
 *
 * @version 1.1
 * @author  Dimitris Andritsakis
 * @package POST
 */

header("Content-Type: text/html; charset=utf-8");

function PostAppointments ( $id,$name,$start,$end,$color,$email,$phone ){

    global $app,$entityManager;

    $result = [];
    $params = ApiFunctions::loadParameters();
    if($params['start']<$params['end']){
      try {
        // create new appointment
        $appointment = new \TblAppointments();
        $appointment->setName(fixForDb($params['name']));
        $appointment->setStart(toDatetime($params['start']));
        $appointment->setEnd(toDatetime($params['end']));
        $appointment->setColor(fixForDb($params['color']));
        $appointment->setEmail(fixForDb($params['email']));
        $appointment->setPhone(fixForDb($params['phone']));
        $entityManager->persist($appointment);
        $entityManager->flush($appointment);
      } catch (Exception $e) {
          $result["status"] = $e->getCode();
          $result["message"] = "[".$result["method"]."][".$result["function"]."]:".$e->getMessage();
      }
      // fetch appointments from now on
      $qb = $entityManager->createQueryBuilder();
      $qb->select('m')
          ->from('TblAppointments', 'm')
          ->where('m.start >= :start')
          ->setParameter('start', new \DateTime(), \Doctrine\DBAL\Types\Type::DATETIME);
      $apData = $qb->getQuery()->getResult();
      if($apData!=[]&&$apData!=null&&is_array($apData)){
        foreach ($apData as $apDato) {
          $result[] = (array)$apDato;
        }
      }
    }
    else {
      $result["status"] = ExceptionCodes::NoErrors;
      $result["message"] = "Start datetime must precedes of end datetime";
    }
    return $result;
}
?>
