<?php

/*
 * Following code will update a color information
 * A color is identified by color id (pid)
 */

// array for JSON response
$response = array();

// check for required fields
//if (isset($_PUT['HTTP_ID']) && isset($_PUT['HTTP_NAME']) && isset($_PUT['HTTP_RED']) && isset($_PUT['HTTP_GREEN'])&& isset($_PUT['HTTP_BLUE'])) {
//    
//    $id = $_SERVER['HTTP_ID'];
//    $name = $_SERVER['HTTP_NAME'];
//    $red = $_SERVER['HTTP_RED'];
//    $green = $_SERVER['HTTP_GREEN'];
//    $blue = $_SERVER['HTTP_BLUE'];
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['red']) && isset($_POST['green'])&& isset($_POST['blue'])) {
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $red = $_POST['red'];
    $green = $_POST['green'];
    $blue = $_POST['blue'];

    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched pid
    $result = mysql_query("UPDATE color SET name = '$name', red = '$red', green = '$green', blue = '$blue' WHERE id = $id");

    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Color successfully updated.";
        
        // echoing JSON response
        echo json_encode($response);
    } else {
        
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>
