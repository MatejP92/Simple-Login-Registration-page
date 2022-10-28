<?php

// connect to database
$db_connect = mysqli_connect("localhost", "root", "", "<Your Database Name>"); 
// if connection fails, echo this
if(!$db_connect){
    die("database connection FAILED" . mysqli_connect_error());
}
