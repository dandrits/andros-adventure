<?php

/**
 * This file is part of the slim-api-crud package.
 * 
 * @author  Dimitris Andritsakis <andritsakisd@gmail.com>
 * @license The MIT License (MIT) Copyright (c) 2015 Dimitris Andritsakis
 * @version 2.6
 * @package Classes
 */

class UserRoles {
    
    /*
     * Array for user role permissions to api end-points
     * example array(`api end-point`=>array(`method`=>array(`user role`)))
     * 
     * @param array[] Array of functions(api_route_name) with array of method (GET,POST,PUT,DELETE)
     * and user roles
     */
    private static $Permissions = array(
        
        );

    /**
     * Check if user has role permissions to method(GET,POST,PUT,DELETE) and functions(api_route_name) 
     * 
     * @param type $controller The controller set by user.
     * @param string $method The method set by user.
     * @param array $role user role.
     * 
     * @return boolean True if user has roles permission False if not
     * @throws Exception(ExceptionMessages::UserNoPermissions , ExceptionCodes::UserNoPermissions)
     */
    public static function checkUserRolePermissions($controller, $method, $role){

       if (array_key_exists($controller, static::$Permissions)) {
           
            if ( in_array( $role , static::$Permissions[$controller][$method] ) ) {
                return true;
            } else {
                throw new Exception(ExceptionMessages::UserNoPermissions, ExceptionCodes::UserNoPermissions);
            }
       }
       return false;
   }

}
?>