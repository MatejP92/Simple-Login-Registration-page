<?php

// connect to database
$db_connect = mysqli_connect("localhost", "root", "", "project_login_2");
// if connection fails, echo this
if(!$db_connect){
    die("database connection FAILED" . mysqli_connect_error());
}
