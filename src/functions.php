<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
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

?>
