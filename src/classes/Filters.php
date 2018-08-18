<?php

/**
 * This file is part of the slim-api-crud package.
 * 
 * @author  Kostas Tsiolis <tsiolis.kostas@gmail.com>
 * @license The MIT License (MIT) Copyright (c) 2015 Kostas Tsiolis
 * @version 2.6
 * @package Classes
 */

class Filters {
    
    /**
     * Set SearchType filter
     * 
     * @param string $searchtype The value of SearchType filter. Default value is `containall`.
     * @param array $params Contain all input parameter by user.
     * 
     * @return string The name of SearchType filter
     * @throws ExceptionMessages::'InvalidSearchType' , ExceptionCodes::'InvalidSearchType'
     */
    public static function getSearchType($searchtype, $params) {
         
        if (Validator::Missing('searchtype', $params))
            $searchtype = Parameters::ContainAll ;
        else if (ValidatorFilters::isSearchType($searchtype ))
            $searchtype = ValidatorFilters::toSearchType($searchtype);
        else
            throw new Exception(ExceptionMessages::InvalidSearchType." : ".$searchtype, ExceptionCodes::InvalidSearchType);
        
        return $searchtype;
    }
       
    /**
     * Set OrderType filter
     * 
     * @param string $ordertype The value of OrderType filter. Default value is `asc`.
     * @param array $params Contain all input parameter by user.
     * 
     * @return string The name of OrderType filter
     * @throws ExceptionMessages::'InvalidOrderType' , ExceptionCodes::'InvalidOrderType'
     */
    public static function getOrderType($ordertype, $params) {
         
        if (Validator::Missing('ordertype', $params))
            $ordertype = Parameters::ASC ;
        else if (ValidatorFilters::isOrderType($ordertype))
            $ordertype = ValidatorFilters::toOrderType($ordertype);
        else
            throw new Exception(ExceptionMessages::InvalidOrderType." : ".$ordertype, ExceptionCodes::InvalidOrderType);
        
        return $ordertype;
    }
        
    /**
     * Set ExportType filter
     * 
     * @param string $export The value of ExportType filter. Default value is `json`.
     * @param array $params Contain all input parameter by user.
     * 
     * @return string The name of ExportType filter
     * @throws ExceptionMessages::'InvalidExportType' , ExceptionCodes::'InvalidExportType'
     */
    public static function getExportType($export, $params) {
        
        if (Validator::Missing('export', $params))
            $export = Parameters::JSON;
        else if (ValidatorFilters::isExportType($export)) {
            $export = ValidatorFilters::toExportType($export);
        } else
            throw new Exception(ExceptionMessages::InvalidExportType." : ".$export, ExceptionCodes::InvalidExportType);
        
        return $export;
    }
    
}
?>