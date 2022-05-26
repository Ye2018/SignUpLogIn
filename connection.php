<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_sample_db";

//if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
//    die("failed to connect!");
//}

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($con->connect_error){
    die("Connection failed: ".$con->connect_error);
}  
?>