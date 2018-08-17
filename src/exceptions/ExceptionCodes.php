<?php
/**
 *
 * @version 1.0
 * @author  Dimitris Andritsakis
 * @package Exceptions
 */

class ExceptionCodes
{
    //general messages

        const NoErrors = 200;
        const MethodNotFound = 700;
        const FunctionNotFound = 700;
        const TokenError = 800;
        const ClientTokenError = 800;
        const UserNoPermissions = 800;
        const Unauthorized = 800;
        const NoUiUserId = 800;
        const NotFoundUiUserId = 800;
        const MseDataError = 800;
        const DataError = 800;
        const InvalidDateChoiceType = 700;
        const InvalidFromDateType = 700;
        const InvalidToDateType = 700;

    //page,pagesize,orderby,ordertype,searchtype

        const MissingPageValue = 700;
        const InvalidPageNumber = 700;
        const InvalidPageType = 700;
        const InvalidPageArray = 700;
        const InvalidMaxPageNumber = 700;

        const MissingPageSizeValue = 700;
        const MissingPageSizeNegativeValue = 700;
        const InvalidPageSizeNumber = 700;
        const InvalidPageSizeType = 700;
        const InvalidPageSizeArray = 700;

        const InvalidSearchType = 700;
        const InvalidOrderType = 700;
        const InvalidOrderBy = 700;
}
?>
