<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_2 = $_POST["password_2"];


    require_once "db_connect.php";
    require_once "functions.php";

    //error handling, if users left any fields blank...
    
    if (emptyInputSignup($name, $email, $username, $password, $password_2) !== false) {
            header("location: ../register.php?error=emptyinput");
            exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../register.php?error=invalidUsername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidEmail");
        exit();
    }

    if (password_match($password, $password_2) !== false) {
        header("location: ../register.php?error=passwordsDontMatch");
        exit();
    }

    if (usernameExists($db_connect, $username, $email) !== false) {
        header("location: ../register.php?error=usernameTaken");
        exit();
    }


    createUser($db_connect, $name, $email, $username, $password);

} else { // this else throws the user back to register page if they accessed the .process.php through url and not through submit button
    header("location: ../register.php");
    exit();
}