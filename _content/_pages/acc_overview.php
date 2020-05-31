<?php
$page_title="My Account";

//load our page title
echo "<title>$page_title $site_title</title>";
echo "<div id='header-title' class='header-title middle'>
            <h1>My Account</h1>
        </div>
       ";

    require '_admin/_controller/_dbhandler/dbh.php';

    $sql = "SELECT * FROM users WHERE u_cf=? AND u_id=?";
    $query =  mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($query, $sql)){
        //error
        exit();
    }
    else{
        mysqli_stmt_bind_param($query, "ss", $_SESSION['ucf'], $_SESSION['uID']);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <div id='form' class='my_acc'>
                    <form action='_admin/_controller/signup-ctrl.php' method='post'>
                        <div id='form-wrapper' class='form-wrapper'>
                            <label class='col-sm-l'>Name<input type='text' name='name' placeholder='" .$row['u_name']. "' readonly></label>
                            <label class='col-sm-r'>Surname<input type='text' name='surname' placeholder='" .$row['u_surname']. "' readonly></label>
                        </div>
                        <div id='form-wrapper' class='form-wrapper'>
                            <label>Codice Fiscale<input type='text' name='cf' placeholder='" .$_SESSION['ucf']. "' minlength='16' maxlength='16' readonly></label>
                        </div>
                        <div id='form-wrapper' class='form-wrapper'>
                            <label>E-mail<input type='text' name='mail' placeholder='" .$row['u_mail']. "' readonly><br></label>
                        </div>
                        <div id=\"form-wrapper\" class=\"form-wrapper\">
                        <label for=\"secret-q\">Secret Question<input type='text' name='cf' placeholder='" .$row['u_sec_q']. "' readonly></label>
                        </div>
                    </form>
                </div>
                      ";
        }


    }





?>
