<?php

/*
 * Following code will delete a color from table
 * A color is identified by color id (pid)
 */

// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // include db connect class
    require_once __DIR__ . '/db_connect.php';

    // connecting to db
    $db = new DB_CONNECT();

    // mysql update row with matched pid
    $result = mysql_query("DELETE FROM color WHERE id = $id");
    
    // check if row deleted or not
    if (mysql_affected_rows() > 0) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Color successfully deleted";

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
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
?>