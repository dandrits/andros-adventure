<?php

/**
 * This file is part of the slim-api-crud package.
 *
 * @author  Dimitris Andritsakis <andritsakisd@gmail.com>
 * @license The MIT License (MIT) Copyright (c) 2015 Dimitris Andritsakis
 * @version 2.6
 * @package Classes
 */

class ApiFunctions {

    function ApiResponse($result, $logExport){

        global $app;

        self::PrepareHeaders();
        $app->response()->setBody( self::toGreek( json_encode( $result ) ) );
        $jsonLogExport = self::toGreek(json_encode($logExport));
        $result["status"] == 200 ? $app->log->info($jsonLogExport) : $app->log->error($jsonLogExport);
    }

    function PrepareHeaders(){

        global $app;

        $app->contentType('application/json');
        $app->response()->headers()->set('Content-Type', 'application/json; charset=utf-8');
        $app->response()->headers()->set('X-Powered-By', 'SlimPHP');
    }

    function ApiLog($logExport){

        global $app;

        $jsonLogExport = self::toGreek(json_encode($logExport));
        $logExport['RESPONSE-CHECK TOKEN']["Status"] == 200 || $logExport['RESPONSE-CHECK USER ROLE']["Status"] == 200 ? $app->log->info($jsonLogExport) : $app->log->error($jsonLogExport);
    }

    function UrlParamstoArray($params){

        $items = array();
        foreach (explode('&', $params) as $chunk){
            $param = explode("=", $chunk);
            $items = array_merge($items, array($param[0] => urldecode($param[1])));
        }

        return $items;
    }

    function loadParameters(){

        global $app;

     //$params = ($app->request->getBody()) ? self::UrlParamstoArray($app->request->getBody()) : $_REQUEST;
     if ($app->request->getBody()) {
        if ( json_decode( $app->request->getBody() ) )
            $params = get_object_vars( json_decode($app->request->getBody(), false) );
        else
            $params = self::UrlParamstoArray($app->request->getBody() );
     } else {
            $params = $_REQUEST;
     }

        return $params;
    }

    function replace_unicode_escape_sequence($match){
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-8');
    }

    function toGreek($value){
        return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $value ? $value : array());
    }

}
