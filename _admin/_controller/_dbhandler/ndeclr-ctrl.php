<?php
session_start();
$cf = $_SESSION['ucf'];
/*
 * key for global shall be session vairables
 */
if(isset($_POST['ndeclr-submit'])){
    require 'dbh.php';

    $f_name = $_POST['f_name'];
    $dob = $_POST['dob'];
    $pob = $_POST['pob'];
    $res = $_POST['res'];
    $addr_res = $_POST['addr_res'];
    $dom = $_POST['dom'];
    $addr_dom = $_POST['addr_dom'];
    $mezzo = $_POST['mezzo'];
    $no_mezzo = $_POST['no_mezzo'];
    $release_by = $_POST['release_by'];
    $release_date = $_POST['release_date'];
    $phone = $_POST['phone'];
    $depart = $_POST['depart'];
    $dest = $_POST['dest'];
    $reason = $_POST['reason'];
    $reason_stmt = $_POST['reason_stmt'];
    $submit_date = $_POST['submit_date'];
    $submit_time = $_POST['submit_time'];

    /*
     * Custom Error handlers

    if(empty($f_name)|| empty($dob)|| empty($pob )|| empty($res )|| empty($addr_res)|| empty($dom)|| empty($addr_dom)||
        empty($mezzo)|| empty($no_mezzo)|| empty($release_by)|| empty($release_dat)|| empty($phone)|| empty($depart )||
        empty($dest )|| empty($reason )|| empty($reason_stmt) || empty($submit_date)){

        //link user back to previous page showing error and already filled data
        header("Location:../signup.php?error=emptyfields&name=".$name."&surname=".$surname."&cf=".$cf."&email="
            .$email."&secretq=".$secretq);
        exit();

    }

    */

    /*add below to elseif condition if error handler above is enabled*/
    $sql = "INSERT INTO declaration (u_cf, f_name, dob, pob, res, addr_res, dom, addr_dom, mezzo, no_mezzo, release_by, 
            release_date, phone, depart, dest, reason, reason_stmt, submit_date, submit_time) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $query = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($query, $sql)){
        exit();
    }
    else{
        mysqli_stmt_bind_param($query, "sssssssssssssssssss", $cf, $f_name, $dob, $pob, $res,
            $addr_res, $dom, $addr_dom, $mezzo, $no_mezzo, $release_by, $release_date, $phone, $depart, $dest, $reason,
            $reason_stmt, $submit_date, $submit_time);
        mysqli_stmt_execute($query);

        header("Location:../../../?q=ndeclr");
        exit();
    }
    // close all connections
    mysqli_stmt_close($query);
    mysqli_close($conn);




}
else {
    header("Location:?q=ndeclr");
    exit();
}
