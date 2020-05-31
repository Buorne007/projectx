<?php
$logo= '_content/_img/projx_logob.png';
$avatar= '_content/_img/avatar_m.png';
?><!DOCTYPE HTML>
<div id="sb_acc" class="sidebar-menu">
        <ul>
            <div class="user middle"><img src=<?php echo $avatar?> alt="Avatar" class="avatar center"><br>
                <?php echo $_SESSION['name']. " " .$_SESSION['s_name']."<br>" .$_SESSION['ucf'] ?>
            </div>
            <li> <a href="?q=acc_overview" class="<?php if ($p == 'acc_overview'){echo'active';}?>"><i class="fas fa-home fa-fw icone"></i>Account Summary</a> </li>
<!--            <li> <a href="?q=family" class="--><?php //if ($p == 'family'){echo'active';}?><!--"><i class="fas fa-cog fa-fw icone"></i>Family Members</a> </li>-->
            <li> <a href="?q=chg_pwd" class="<?php if ($p == 'chg_pwd'){echo'active';}?>"><i class="fas fa-calendar-alt fa-fw icone"></i>Change Password</a> </li>
            <li> <a href="logout.php"  class="<?php if ($p == 'logout'){echo'active';}?>"><i class="fas fa-lightbulb fa-fw icone"></i>Logout</a> </li>
        </ul>
</div>

