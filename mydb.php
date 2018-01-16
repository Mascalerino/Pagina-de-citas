<?php

function get_result_user($query){

    $db = new mysqli('localhost', 'root', '', 'tfc_javi');
//check connexion is successfully
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    }

    if (!$result = $db->query($query)) {
        echo "without results.";
        exit;
    }

    $res = array();

    while ($row = $result->fetch_assoc()) {

        array_push($res, array(
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $row['password']
        ));
    }

    $db->close();

    return $res;
}


function get_result_subject($query){
    $db = new mysqli('localhost', 'root', '', 'tfc_javi');
    //check connexion is successfully
    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    }

    if (!$result = $db->query($query)) {
        echo "without results.";
        exit;
    }

    $res = array();

    while ($row = $result->fetch_assoc()) {

        array_push($res, array(
            'name' => $row['name'],
            'sname' => $row['sname'],
            'mark' => $row['mark']
        ));
    }

    $db->close();

    return $res;
}
