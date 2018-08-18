<?php
/**
 *
 * @version 1.0
 * @author  Kostas Tsiolis
 * @package classes
 */

class ExtendUserRoles extends UserRoles{

    public static $Permissions = array(

        'login'                   => array(
                                                'POST' => array('admin')
                                            ),
        );

}
?>
