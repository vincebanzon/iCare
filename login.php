<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

$username = $_POST['username'];
$password = $_POST['password'];

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

$result = mysql_query("SELECT `USERNAME`, `PASSWORD` FROM `USER` WHERE USERNAME = '$username' AND PASSWORD = '$password'") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results


    header('location: http://localhost/iCare/timeLinePage.htm');

    // echoing JSON response
    echo json_encode($response);
}
else
{

    // no apartment found
    header('location: http://localhost/iCare/login.html');
    // echo no users JSON
    echo json_encode($response);
}


?>
