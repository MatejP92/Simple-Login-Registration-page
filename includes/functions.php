<?php

// REGISTRATION FUNCTIONS

function emptyInputSignup($first_name,$last_name, $email, $username, $password, $password_2) {
    $result;
    if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($password_2)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username){
    $result;
    if(!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { // built in function to check if the email is inputed
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function password_match($password, $password_2){
    $result;
    if($password !== $password_2){
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameExists($db_connect, $username, $email){
    $sql = "SELECT * FROM users WHERE user_username = ? OR user_email = ?;";
    $stmt = mysqli_stmt_init($db_connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // run the sql statement and check if there is any errors
        header("location: ../register.php?error=stmtfailed");
        exit();
    } 

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    } else {
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($db_connect, $first_name, $last_name, $email, $username, $password){
    $sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_username, user_password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($db_connect);
    if(!mysqli_stmt_prepare($stmt, $sql)){ // run the sql statement and check if there is any errors
        header("location: ../register.php?error=stmtfailed");
        exit();
    } 

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
        exit();
   
}

// LOGIN FUNCTIONS

function emptyInputLogin($username, $password) {
    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($db_connect, $username, $password){
    $userExists = usernameExists($db_connect, $username, $username);

    if($userExists === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    }

    $passwordHashed = $userExists["user_password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false){
        header("location: ../login.php?error=wrongLogin");
        exit();
    } elseif ($checkPassword === true) {
        session_start();
        $_SESSION["user_id"] = $userExists["user_id"];
        $_SESSION["user_username"] = $userExists["user_username"];
        header("location: ../index.php");
        exit();
    }

}