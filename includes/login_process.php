<?php

if(isset($_POST["submit"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "db_connect.php";
    require_once "functions.php";

    // error handlers
    if (emptyInputLogin($username, $password) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($db_connect, $username, $password);
  
} else { // this else throws the user back to register page if they accessed the _process.php through url and not through submit button
    header("location: ../login.php");
    exit();
}