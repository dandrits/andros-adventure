<?php
/**
 *
 * @version 1.0
 * @author  Kostas Tsiolis
 * @package SRC
 */
function generateRandomString($length = 10) {
    $randomString = '';
    $crypto = true;
    for ($i = 0; $i < ($length/2); $i++) {
      $bytes = openssl_random_pseudo_bytes(1,$crypto);
      $hex = bin2hex($bytes);
      $randomString .= $hex;
    }
    return $randomString;
}

function hasher($param=''){
    global $salt;
    return hash('sha512',$param.$salt);
}

function validateHasher($param='', $db_hash){
    global $salt;
    $pass =  hash('sha512',$param.$salt);
    return $is_valid = ($pass == $db_hash) ? true : false;
}

function fixForDb($string){
		return str_replace("\\", "", str_replace('"', '\"', str_replace("'", "\'", trim($string))));
	}

function toDatetime($date){
  $datetime = new \DateTime($date);
  return $datetime;
}
?>
