<?php
$page_title="Signup - Project X";

//load our page title
echo "<title>$page_title</title>";
require ("_content/_template/reg_top.php");

?><!DOCTYPE html>
<!-- body -->
<div id="content" class="content">

    <!-- load main -->
    <div id="main" class="center form-area">
    <div id="header-title" class="header-title middle">
        <h1>Signup</h1>
        <?php
         if(!isset($_GET['error'])) {
             echo '<p>Please fill the form below to register.</p>';
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
        <div id="form" class="signup-form">
            <form action="_admin/_controller/signup-ctrl.php" method="post">
                <div id="form-wrapper" class="form-wrapper">
                    <label class="col-sm-l">Name<input type="text" name="name" placeholder=""></label>
                    <label class="col-sm-r">Surname<input type="text" name="surname" placeholder=""></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label>Codice Fiscale<input type="text" name="cf" placeholder="" minlength="16" maxlength="16"></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label>E-mail<input type="text" name="mail" placeholder=""><br></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                     <label class="col-sm-l">Password<input type="password" name="pwd" minlength="8" placeholder=""></label>
                     <label class="col-sm-r">Repeat password<input type="password" name="repeat-pwd" placeholder=""></label>
                </div>
                <div id="form-wrapper" class="form-wrapper">
                    <label for="secret-q">Secret Question
                        <select id="secret-q" name="secret-q">
                            <option></option>
                            <option value="What is your hobby">What's your hobby</option>
                            <option value="What brand was your first car">What brand was your first car</option>
                            <option value="What is your best experience">What is your best experience</option>
                            <option value=">What is the name of your favourite aunty">What is the name of your favourite aunty</option>
                            <option value="At what age did you buy your first house">At what age did you buy your first house</option>
                        </select>
                    </label>
                    <label>Answer<input type="text" name="secret-a" placeholder="Response"></label>
                </div>
                <div id="form-wrapper" class="form-wrapper button-submit middle">
                    <button type="submit" name="signup-submit"> Signup</button>
                </div>
            </form>
        </div>
        <div id="form-reminder" class="form-reminder form-wrapper middle">
            <div id="login" class="login">
                <span>Already Registered? <a href="login.php">Login</a></span>
            </div>
        </div>
    </div>
</div>
<?php
require ("_content/_template/reg_footer.php");