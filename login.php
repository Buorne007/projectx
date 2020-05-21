<?php
$page_title="Login - Project X";

//load our page title
echo "<title>$page_title</title>";
require ("_content/_template/reg_top.php");

?><!DOCTYPE html>
<!-- body -->
<div id="content" class="content">

    <!-- load main -->
    <div id="main" class="center">

        <h1>Login</h1>

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

        ?>
        <div id="form">
            <form action="_admin/_controller/login-ctrl.php" method="post">
                <label>Codice Fiscale</label><input type="text" name="cf" placeholder="Codice fiscale" minlength="16" maxlength="16"><br>
                <label>E-mail</label><input type="text" name="mail" placeholder="Your e-mail address"><br>
                <label>Password</label><input type="password" name="pwd" minlength="8" placeholder="Your password"><br>
                <button type="submit" name="login-submit"> Login</button>
            </form>
        </div>
        <div id="form-reminder">
            <div id="forgotpwd">
                <a href="signup.php">Forgot Password</a>
            </div>
            <div id="signup">
                <p>Not Registered?
                <a href="signup.php">
                    <button type="button">Signup</button>
                </a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
require ("_content/_template/reg_footer.php");