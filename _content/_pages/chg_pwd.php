<?php
$page_title="My Account";

//load our page title
echo "<title>$page_title $site_title</title>";
?><!DOCTYPE html>
<!-- body -->
<div id="content" class="content">

    <!-- load main -->
        <div id="header-title" class="header-title middle">
            <h1>Change Password</h1>
            <?php
            if(!isset($_GET['error']) ) {
                if(!isset($_GET['success']) ){
                    echo '<p>Please fill the form below.</p>';
                }
            }
            ?>
        </div>
        <?php
        /*
         * Echo errors
         */
        if(isset($_GET['error'])){
            if ($_GET['error'] =="emptyfields"){
                echo '<p class="error">Fill in all Fields.</p>';
            }
            elseif ($_GET['error'] =="connectionerror"){
                echo '<p class="error">Cannot connect to server, please try again later.</p>';
            }
        }

        ?>
        <div id="form" class="login-form">
            <form action="_admin/_controller/resetpwd-ctrl.php" method="post">
                <div id="form-wrapper" class="form-wrapper">
                    <label>Codice Fiscale<input type="text" name="cf" placeholder="<?php echo $_SESSION['ucf'] ?>" readonly></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label class="col-sm-l">New Password<input type="password" name="pwd" minlength="8" placeholder=""></label>
                    <label class="col-sm-r">Repeat password<input type="password" name="repeat-pwd" placeholder=""></label>
                </div>
                <div id="form-wrapper" class="form-wrapper button-submit middle">
                    <button type="submit" name="changepwd-submit">Change</button>
                </div>
            </form>
        </div>
    </div>