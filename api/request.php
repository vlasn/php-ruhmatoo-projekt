<?php
/**
 * splitting url
 */

$params = array();
$parts = explode('/', $_SERVER['REQUEST_URI']);
//skip through the segments by 2
for($i = 0; $i < count($parts); $i = $i + 2){
    $params[$parts[$i]] = $parts[$i+1];
}

$_GET = $params;
if(isset($_GET['apikey'])) {
    //do autenthication thing with API key
    if (isset($_GET['view'])) {

        if ($_GET['view'] == 'employeePrivateStats') {
            echo "performance analysis stuff for employee";
        }
        if ($_GET['view'] == 'employeePage') {
            echo "View for client, allows reading employee description and";
        }
        if ($_GET['view'] == 'employeesByCompany') {
            echo "returns names, photo-urls and ratings of employees in company";
        }
        if ($_GET['view'] == 'getNearbyCompanies') {
            echo "nearby restaurants view based on coordinates";
        }
        if ($_GET['view'] == 'submitRating') {
            echo "leaves rating";
        }
    }
    if (isset($_GET['submit'])){
        if($_GET['submit']=='login'){
            echo "loginiskript jookseb siin";
        }
        if($_GET['submit']=='rateEmployee'){
            echo "hindamise script";
        }
        if($_GET['submit']=='employeeAddDetails'){
            echo "loginiskript jookseb siin";
        }
        if($_GET['submit']=='register'){
            echo "registreerimisskript jookseb siin";
        }
    }
    else {
        echo 'You have no power here';
    }
}