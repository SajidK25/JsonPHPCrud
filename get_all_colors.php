<?php

/*
 * Following code will list all the colors
 */

// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all colors from colors table
$result = mysql_query("SELECT *FROM color") or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // colors node
    $response["colors"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $color = array();
        $color["id"] = $row["id"];
        $color["name"] = $row["name"];
        $color["red"] = $row["red"];
        $color["green"] = $row["green"];
        $color["blue"] = $row["blue"];
        


        // push single color into final response array
        array_push($response["colors"], $color);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no colors found
    $response["success"] = 0;
    $response["message"] = "No colors found";

    // echo no users JSON
    echo json_encode($response);
}
?>
