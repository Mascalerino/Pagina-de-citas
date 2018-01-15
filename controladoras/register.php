<?php

session_start();
require "mydb.php";

$_SESSION['login'] = "0";
$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['login'] = $password;
$_SESSION['user'] = $email;
if (isset($email, $password) && !empty($email) && !empty($password)) {

    $res = get_result_user("select * from mw_user where email = '" . $email . "' and password = '" . $password . "';");
    if (!empty($res)) {
        header("location: index.php");
		//$login = "1";
    }else{
        header("location: noregister.php?nouser=1");
		//$login = "0";
    }
}


?>