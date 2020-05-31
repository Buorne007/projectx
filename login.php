<?php
$page_title="Login - Project X";

//load our page title
echo "<title>$page_title</title>";
require ("_content/_template/reg_top.php");

?><!DOCTYPE html>
<!-- body -->
<div id="content" class="content">

    <!-- load main -->
    <div id="main" class="center form-area">
        <div id="header-title" class="header-title middle">
            <h1>Login</h1>
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
            elseif ($_GET['error'] =="wrongpassword"){
                echo '<p class="error">Password is incorrect.</p>';
            }
            elseif ($_GET['error'] =="nouserfound"){
                echo '<p class="error">No user found. Please try again</p>';
            }
            elseif ($_GET['error'] =="connectionerror"){
                echo '<p class="error">Cannot connect to server, please try again later.</p>';
            }
        }
        elseif (isset($_GET['success'])){
            if ($_GET['success'] =="true") {
                echo '<p class="success">Password reset was successful..<br>Please Fill the form below to Login</p>';
            }
        }

        ?>
        <div id="form" class="login-form">
            <form action="_admin/_controller/login-ctrl.php" method="post">
                <div id="form-wrapper" class="form-wrapper">
                    <label>Codice Fiscale<input type="text" name="cf"  minlength="16" maxlength="16"></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label>E-mail<input type="text" name="mail"></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label>Password<input type="password" name="pwd" minlength="8"></label>
                </div>
                <div id="form-wrapper" class="form-wrapper button-submit middle">
                    <button type="submit" name="login-submit"> Login</button>
                </div>
            </form>
            <div id="form-cta" class="form-cta form-wrapper middle">
                <div id="forgotpwd" class="forgotpwd">
                    <a href="forgotpwd.php">Forgot Password</a>
                </div>
                <div id="signup" class="signup">
                    <span>Not Registered? <a href="signup.php">Signup</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require ("_content/_template/reg_footer.php");