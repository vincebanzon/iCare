<!DOCTYPE html>
<html>
<body>


<?php




// escape variables for security
$username = $_POST['username'];
$hospital= $_POST['hospital'];
$company = $_POST['company'];
$bags = $_POST['bags'];


    // include db connect class
    require_once __DIR__ . '/db_connect.php';


    // connecting to db
    $db = new DB_CONNECT();


$result=mysql_query("INSERT INTO USERDETAIL (USERNAME , HOSPITAL, COMPANY, BAGS)
VALUES ('$username', '$hospital','$company', '$bags')");

 // check if row inserted or not
    if ($result) {
        // successfully inserted into database
    header('location: http://localhost/iCare/timeLinePage.htm');
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row

    // success
    header('location: http://localhost/iCare/user_detail.html');
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
        
        // echoing JSON response
        echo json_encode($response);
    }
?>

</body>
</html>