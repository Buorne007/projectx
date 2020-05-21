<?php
$page_title="Signup - Project X";

//load our page title
echo "<title>$page_title</title>";
require ("_content/_template/reg_top.php");

?><!DOCTYPE html>
<!-- body -->
<div id="content" class="content">

    <!-- load main -->
    <div id="main" class="center">
    <div class="page-title">
        <h1>Signup</h1>
    </div>
        <?php
        /*
         * Echo errors
         */
        if(isset($_GET['error'])){
            if ($_GET['error'] =="emptyfields"){
                echo '<p class="error">Fill in all Fields.</p>';
            }
            elseif ($_GET['error'] =="invalidname" || $_GET['error'] =="invalidsurname"){
                echo '<p class="error">Name & Surname must be letters.</p>';
            }
            elseif ($_GET['error'] =="invalidcodicefiscale"){
                echo '<p class="error">Invalid Codice Fiscale.</p>';
            }
            elseif ($_GET['error'] =="invalidemail"){
                echo '<p class="error">Invalid E-mail.</p>';
            }
            elseif ($_GET['error'] =="badpassword"){
                echo '<p class="error">Password must minimum of 8 and alphanumeric.</p>';
            }
            elseif ($_GET['error'] =="emailexist"){
                echo '<p class="error">E-mail already exist.</p>';
            }
            elseif ($_GET['error'] =="connectionerror"){
                echo '<p class="error">Cannot connect to server, please try again later.</p>';
            }
        }

        ?>
        <div id="form">
            <form action="_admin/_controller/signup-ctrl.php" method="post">
                <label>Name</label><input type="text" name="name" placeholder="Name">
                <label>Surname</label><input type="text" name="surname" placeholder="Surname"><br>
                <label>Codice Fiscale</label><input type="text" name="cf" placeholder="Codice fiscale" minlength="16" maxlength="16"><br>
                <label>E-mail</label><input type="text" name="mail" placeholder="Your e-mail address"><br>
                <label>Password</label><input type="password" name="pwd" minlength="8" placeholder="Your password">
                <label>Repeat password</label><input type="password" name="repeat-pwd" placeholder="Confirm password"><br>
                <label for="secret-q">Secret Question</label>
                    <select id="secret-q" name="secret-q">
                        <option></option>
                        <option value="hobby">What's your hobby</option>
                        <option value="car">What brand was your first car</option>
                        <option value="best-experience">What is your best experience</option>
                        <option value="fav-aunt">What is the name of your favourite aunty</option>
                        <option value="house">At what age did you buy your first house</option>
                    </select>
                <label>Answer</label><input type="text" name="secret-a" placeholder="Response"><br>
                <button type="submit" name="signup-submit"> Signup</button>
            </form>
        </div>
        <div id="form-reminder">
            <p>Already Registered?</p>
            <a href="login.php">
                <button type="button">Login</button>
            </a>
        </div>
    </div>
</div>
<?php
require ("_content/_template/reg_footer.php");