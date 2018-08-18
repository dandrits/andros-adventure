<?php

/**
 * This file is part of the slim-api-crud package.
 * 
 * @author  Kostas Tsiolis <tsiolis.kostas@gmail.com>
 * @license The MIT License (MIT) Copyright (c) 2015 Kostas Tsiolis
 * @version 2.6
 * @package Classes
 */

class ValidatorFilters {

    protected static $orderTypeValues = array('ASC','DESC');
    protected static $exportTypeValues = array('JSON','XML','XLSX','CSV','PDF','PHPARRAY');
    protected static $searchTypeValues = array('EXACT','CONTAIN','CONTAINALL','CONTAINANY','STARTWITH','ENDWITH');
      
    /**
     * 
     * Validates that the value has the right representation of type orderType.
     *
     * @param string The value of type orderType. 
     * @return bool True if valid, false if not.
     */
    public static function isOrderType($value) {
        $upper = strtoupper(trim($value));
        if (in_array($upper, self::$orderTypeValues, true)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * Forces the value to the right representation of type orderType.
     * 
     * @param string The value of type orderType.
     * @return orderType value if valid, false if not.
     */
    public static function toOrderType($value) {
        $upper = strtoupper(trim($value));
        if (in_array($upper, self::$orderTypeValues, true)) {
            return $upper;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * Validates that the value has the right representation of type exportType.
     *
     * @param string The value of type exportType. 
     * @return bool True if valid, false if not.
     */
    public static function isExportType($value) {
        $upper = strtoupper(trim($value));
        if (in_array($upper, self::$exportTypeValues, true)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * Forces the value to the right representation of type exportType.
     * 
     * @param string The value of type exportType.
     * @return exportType value if valid, false if not.
     */
    public static function toExportType($value) {
        $upper = strtoupper(trim($value));
        if (in_array($upper, self::$exportTypeValues, true)) {
            return $upper;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * Validates that the value has the right representation of type searchType.
     *
     * @param string The value of type searchType. 
     * @return bool True if valid, false if not.
     */
    public static function isSearchType($value) {
        $upper = strtoupper(trim($value));
        if (in_array($upper, self::$searchTypeValues, true)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * Forces the value to the right representation of type searchType.
     * 
     * @param string The value of type searchType.
     * @return searchType value if valid, false if not.
     */
    public static function toSearchType($value) {
        $upper = strtoupper(trim($value));
        if (in_array($upper, self::$searchTypeValues, true)) {
            return $upper;
        } else {
            return false;
        }
    }
}
?>