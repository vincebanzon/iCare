<?php

/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
// array for JSON response

$response = array();

// check for required fields
//if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $blood = $_POST['blood'];


    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql inserting a new row
    $result = mysql_query("INSERT INTO USER(USERNAME, PASSWORD, FNAME, LNAME, BLOODTYPE) 
	VALUES('$username', '$password', '$fname','$lname', '$blood')");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
    header('location: http://localhost/iCare/successSignup.html');
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row

    // success
    header('location: http://localhost/iCare/signup.html');
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
//} else {
    // required field is missing
  //  $response["success"] = 0;
  // $response["message"] = "Required field(s) is missing";

    // echoing JSON response
  //  echo json_encode($response);
//}
?>