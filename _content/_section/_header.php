<?php
    session_start();
    if(isset($_SESSION['uID'])){
        //do nothing
    } else{
        //return to login page
        header("Location:login.php");
        exit();
    }
    $logo= '_content/_img/projx_logob.png';
    $avatar= '_content/_img/avatar_m.png';
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