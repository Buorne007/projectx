<?php
/*
 * define connection details
 */
$dBhost = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBname= "project-x";

/*
 * connect to db
 */
$conn = mysqli_connect($dBhost, $dBUsername, $dBPassword, $dBname);

/*
 * validate connection
 */
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}

