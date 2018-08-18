<?php

/**
 * This file is part of the slim-api-crud package.
 *
 * @author  Kostas Tsiolis <tsiolis.kostas@gmail.com>
 * @license The MIT License (MIT) Copyright (c) 2015 Kostas Tsiolis
 * @version 2.6
 * @package Classes
 */

class ApiGeneralControllers {

    public function FunctionMethodNotFound(){

        global $app;

        $app->notFound(function () use ($app) {

            $controller = $app->environment();
            $controller = substr($controller["PATH_INFO"], 1);

            try {
               if ( !in_array( strtoupper($app->request()->getMethod()), array('GET', 'POST', 'PUT', 'DELETE')))
                    throw new Exception(ExceptionMessages::MethodNotFound, ExceptionCodes::MethodNotFound);
                else
                    throw new Exception(ExceptionMessages::FunctionNotFound, ExceptionCodes::FunctionNotFound);
            } catch (Exception $e) {
                $result["status"] = $e->getCode();
                $result["message"] = "[".$app->request()->getMethod()."][".$controller."]:".$e->getMessage();
            }

            echo $result = ApiFunctions::toGreek( json_encode( $result ) );
            $app->log->error($result);
        });
    }

    public function ApiDocumentation(){

        global $app;

        $app->get('/docs/*', function () use ($app) {
            $app->redirect($ServerOptions['ApiDocumentationLink']);
        });
    }

    public function InitialLogRequest(){

        global $app;

        $logExport['REQUEST'] = array('Function' => $app->request()->getPathInfo(),
                                        'Method' => $app->request()->getMethod(),
                                        'Host:Port' => $app->request()->getHostWithPort(),
                                        'RemoteAddress' => $app->request()->getHostWithPort(),
                                        'ContentType' => $app->request()->getContentType(),
                                        'Ip' => $app->request()->getIp(),
                                        'Url' => $app->request()->getUrl()
                                       );

        $jsonLogExport = ApiFunctions::toGreek(json_encode($logExport));
        $app->log->info($jsonLogExport);
    }

}
