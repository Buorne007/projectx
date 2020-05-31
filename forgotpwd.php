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
            <h1>Password Reset</h1>
            <?php
            if(!isset($_GET['error'])) {
                echo '<p>Please fill the form below.</p>';
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
            elseif ($_GET['error'] =="cferror"){
                echo '<p class="error">Codice Fiscale does not match any user. Please verify</p>';
            }
            elseif ($_GET['error'] =="mailerror"){
                echo '<p class="error">Mail does not match any User. Please verify</p>';
            }
            elseif ($_GET['error'] =="nouserfound"){
                echo '<p class="error">No user found. Please try again</p>';
            }
            elseif ($_GET['error'] =="badsecreta"){
                echo '<p class="error">Invalid Secret</p>';
            }
            elseif ($_GET['error'] =="badpasswd"){
                echo '<p class="error">Password must be alphanumerical</p>';
            }
            elseif ($_GET['error'] =="connectionerror"){
                echo '<p class="error">Cannot connect to server, please try again later.</p>';
            }
        }

        ?>
        <div id="form" class="login-form">
            <form action="_admin/_controller/resetpwd-ctrl.php" method="post">
                <div id="form-wrapper" class="form-wrapper">
                    <label>Codice Fiscale<input type="text" name="cf"  minlength="16" maxlength="16"></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label>E-mail<input type="text" name="mail"></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label for="secret-q">Secret Question
                        <select id="secret-q" name="secret-q">
                            <option></option>
                            <option value="Whats your hobby">What's your hobby</option>
                            <option value="What brand was your first car">What brand was your first car</option>
                            <option value="What is your best experience">What is your best experience</option>
                            <option value=">What is the name of your favourite aunty">What is the name of your favourite aunty</option>
                            <option value="At what age did you buy your first house">At what age did you buy your first house</option>
                        </select>
                    </label>
                    <label>Answer<input type="text" name="secret-a" placeholder=""></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label class="col-sm-l">New Password<input type="password" name="pwd" minlength="8" placeholder=""></label>
                    <label class="col-sm-r">Repeat password<input type="password" name="repeat-pwd" placeholder=""></label>
                </div>
                <div id="form-wrapper" class="form-wrapper button-submit middle">
                    <button type="submit" name="resetpwd-submit"> Reset</button>
                </div>
            </form>
            <div id="form-cta" class="form-cta form-wrapper middle">
                <div id="login" class="forgotpwd r_login">
                    <a href="login.php">Return to Login</a>
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