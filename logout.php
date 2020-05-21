<?php
session_start(); // start the session
session_unset(); // clear all session variables
session_destroy(); //kill the session
header("Location:login.php"); //return to login
exit();
