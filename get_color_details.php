<?php

/*
 * Following code will get single color details
 * A color is identified by color id (pid)
 */

// array for JSON response
$response = array();


// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// check for post data
if (isset($_GET["id"])) {
    $id = $_GET['id'];

    // get a color from colors table
    $result = mysql_query("SELECT *FROM color WHERE id = $id");

    if (!empty($result)) {
        // check for empty result
        if (mysql_num_rows($result) > 0) {

            $result = mysql_fetch_array($result);


            $color = array();
            $color["id"] = $row["id"];
            $color["name"] = $row["name"];
            $color["red"] = $row["red"];
            $color["green"] = $row["green"];
            $color["blue"] = $row["blue"];
            // success
            $response["success"] = 1;

            // user node
            $response["color"] = array();

            array_push($response["color"], $color);

            // echoing JSON response
            echo json_encode($response);
        } else {
            // no color found
            $response["success"] = 0;
            $response["message"] = "No color found";

            // echo no users JSON
            echo json_encode($response);
        }
    } else {
        // no color found
        $response["success"] = 0;
        $response["message"] = "No color found";

        // echo no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>