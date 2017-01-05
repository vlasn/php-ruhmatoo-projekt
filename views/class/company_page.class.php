<?php

/**
 * Created by PhpStorm.
 * User: henrysavi
 * Date: 03/01/17
 * Time: 23:18
 */
class company_page
{
    public static function fetchcompanyData($companyId, $apikey){

        $url="http://naturaalmajand.us/tipit/api/request.php/apikey/$apikey/view/companyView/companyId/$companyId";
        $result = file_get_contents($url);
        return $result;
    }

    public static function fetchCompanyByEmployee($employeeId, $apikey){

        $url="http://naturaalmajand.us/tipit/api/request.php/apikey/$apikey/view/fetchCompanyByEmployee/employeeId/$employeeId";
        $result = file_get_contents($url);
        return json_decode($result);
    }
}