<?php
/**
 *
 * @version 1.1
 * @author  Dimitris Andritsakis
 * @package GET
 */

header("Content-Type: text/html; charset=utf-8");

function GetAppointments ( ){

    global $app,$entityManager,$salt;

    $result = [];

    try {
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
    } catch (Exception $e) {
        $result["status"] = $e->getCode();
        $result["message"] = "[".$result["method"]."][".$result["function"]."]:".$e->getMessage();
    }
    return $result;
}

?>
