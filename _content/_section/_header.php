<?php
    session_start();
    if(isset($_SESSION['ucf'])){
        //do nothing
    } else{
        //return to login page
        header("Location:login.php");
        exit();
    }

    $logo= '_content/_img/projx_logob.png';

require '_admin/_controller/_dbhandler/dbh.php';
$sql="SELECT * FROM profile_photo WHERE u_cf=?";
$query = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($query, $sql)){
    $avatar= '_content/_img/avatar_m.png';
}
else{
    mysqli_stmt_bind_param($query, "s", $_SESSION['ucf']);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    if($row = mysqli_fetch_assoc($result)){
        $avatar= '_admin/userimg/'. $row['img'];
    }else{
        $avatar= '_content/_img/avatar_m.png';
    }
}
//$avatar= '_content/_img/avatar_m.png';
?><!DOCTYPE HTML>
<div id="logo" class="logo">
    <a href="?q=">
        <img src=<?php echo $logo?> alt="logo">
    </a>
</div>

<div id="nav" class="nav">
    <ul>
        <!--<li><a href="?q=">Home</a></li> -->
        <li><a href="#">Self-Declaration</a>
            <div id="submenu" class="submenu">
                <ul>
                    <li><a href="?q=ndeclr">New Declaration</a> </li>
                    <li><a href="?q=pdeclr">Past Declarations</a></li>
                    <li><a href="?q=requests">Requests</a></li>
                </ul>
            </div>
        </li>
        <li><a href="#"><img src=<?php echo $avatar?> alt="Avatar" class="avatar">Profile</a>
            <div id="submenu" class="submenu">
                <ul>
                    <li><a href="?q=acc_overview">My Account</a> </li>
                    <li><a href="logout.php">Logout</a> </li>
                </ul>
            </div>
        </li>

    </ul>
</div>