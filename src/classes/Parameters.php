<?php

/**
 * This file is part of the slim-api-crud package.
 * 
 * @author  Dimitris Andritsakis <andritsakisd@gmail.com>
 * @license The MIT License (MIT) Copyright (c) 2015 Dimitris Andritsakis
 * @version 2.6
 * @package Classes
 */

header("Content-Type: text/html; charset=utf-8");

class Parameters {
    
    const DefaultPageSize = 200;
    const AllPageSize = 0;
    const MaxPageSize = 500;
    const DefaultPage = 1;
    const ASC = 'ASC';
    const DESC = 'DESC';
    const JSON = "JSON";
    const XML = "XML";
    const XLSX = "XLSX";
    const PDF = "PDF";
    const CSV = "CSV";
    const PHPARRAY = "PHPARRAY";
    const Exact = "EXACT";
    const Contain = "CONTAIN";
    const ContainAll = "CONTAINALL";
    const ContainAny = "CONTAINANY";
    const StartWith = "STARTWITH";
    const EndWith = "ENDWITH";
    
}
?>