<?php
/* This page controls the dynamic functionality of the website.
 * It renders the request only to the specified "main" section of the website
 * and avoids the re-loading all web elements on page request
 * q is a variable that is used to store the queried name of the page as set in href=""
 * p is a variable that stores the specific name of the page w/o the extension
 */
if(isset($_GET['q'])){
    $p = $_GET['q'];
    $q = "_content/_pages/".$p.".php";
    if(file_exists($q)){
        include($q); //return the requested page if found
    } else if($p==""){
        include("_content/_pages/_home.php"); // always return homepage as default page if no call
    } else{
        include("_content/_pages/_404.php"); // return 404 if the page is not found
    }
} else{
    include("_content/_pages/_home.php"); // always return homepage as default page if no call
}
