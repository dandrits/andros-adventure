<?php
/**
 *
 * @version 1.0
 * @author  Kostas Tsiolis
 * @package Exceptions
 */

class ExceptionMessages
{
    //general messages

        const NoErrors = 'Api Request Success';
        const MethodNotFound = 'Method not found (GET/POST/PUT/DELETE)';
        const FunctionNotFound = 'Function not found (Api Function Name)';
        const TokenError = 'Token Error';
        const ClientTokenError = 'ClientToken Error';
        const UserNoPermissions = 'User has no permissions';
        const Unauthorized = 'HTTP Error 401 Unauthorized';
        const NoUiUserId = 'Ui not send user id';
        const NotFoundUiUserId = 'Ui not found user id';
        const MseDataError = 'Mse data errors';
        const DataError = 'Data errors';
        const InvalidDateChoiceType = 'Values must be day,month,year';
        const InvalidFromDateType = 'Invalid FromDate type';
        const InvalidToDateType = 'Invalid ToDate type';

    //page,pagesize,orderby,ordertype,searchtype

        const MissingPageValue = 'The Page number must be rated';
        const InvalidPageNumber = 'The Page number can not be negatively rated nor be less than zero (0)';
        const InvalidPageType = 'The Page number must be numeral';
        const InvalidPageArray = 'The Page number can not be multiple rated';
        const InvalidMaxPageNumber = 'The Page number is bigger than the maximum price of pagination.Maximum Page = ';

        const MissingPageSizeValue = 'The Pagesize number must be rated';
        const MissingPageSizeNegativeValue = 'The Pagesize number cannot be negatively rated nor be less than 0';
        const InvalidPageSizeNumber = 'The Pagesize number must be from 0 to 500';
        const InvalidPageSizeType = 'The Pagesize number must be numeral';
        const InvalidPageSizeArray = 'The Pagesize number cannot be multiple rated';

        const InvalidSearchType = 'Invalid Search Type value';
        const InvalidOrderType = 'The Order Type value must be ASC or DESC';
        const InvalidOrderBy = 'Invalid Order By value';

}
?>
