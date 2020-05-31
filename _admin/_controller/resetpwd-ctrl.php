<?php
if (isset($_POST['resetpwd-submit'])){
    require '_dbhandler/dbh.php';

    //define temp variables to hold data
    $cf = $_POST['cf'];
    $email = $_POST['mail'];
    $secretq = $_POST['secret-q'];
    $secreta = $_POST['secret-a'];
    $password = $_POST['pwd'];
    $repeatpwd = $_POST['repeat-pwd'];

    //check if fields are empty
    if(empty($cf) || empty($email) || empty($password) || empty($repeatpwd) || empty($secretq) || empty($secreta)){

        //link user back to previous page showing error and already filled data
        header("Location:../../forgotpwd.php?error=emptyfields&cf=".$cf."&email="
            .$email);
        exit();
    }
    //verify data
    else{
        $sql = "SELECT * FROM users WHERE u_cf=? AND u_mail=?";
        $query = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query, $sql)){
            header("Location:../../forgotpwd.php?error=connectionerror");
            exit();
        }
        //check for that codice fiscale data is alphanumeric
        elseif (!preg_match("/^[a-zA-Z0-9]*$/",$cf)){
            //link user back to previous page showing error and already filled data
            header("Location:../../forgotpwd.php?error=invalidcodicefiscale&secretq=".$secretq."&email="
                .$email."&secretq=".$secretq);
            exit();
        }
        //check mail validation
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            //link user back to previous page showing error and already filled data
            header("Location:../../forgotpwd.php?error=invalidemail&cf=".$cf."&secretq=".$secretq);
            exit();
        }
        //check password valid and match
        elseif ($password !== $repeatpwd){
            //link user back to previous page showing error and already filled data
            header("Location:../../signup.php?error=badpassword&cf=".$cf."&secretq=".$secretq."&email="
                .$email."&secretq=".$secretq);
            exit();
        }
        // check if user exist (using the email as KEY)
        else {
            $sql = "SELECT * FROM users WHERE u_cf=? AND u_mail=?";
            $query = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($query, $sql)) {
                header("Location:../../forgotpwd.php?error=connectionerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($query, "ss", $cf, $email);
                mysqli_stmt_execute($query);
                $result=mysqli_stmt_get_result($query);
                if($row = mysqli_fetch_assoc($result)){
                    if($row < 1){
                        header("Location:../../forgotpwd.php?error=nouserfound");
                        exit();
                    }else{
                        if($cf !== $row['u_cf']){
                            header("Location:../../forgotpwd.php?error=cferror");
                            exit();
                        }
                        elseif ($email !== $row['u_mail']){
                            header("Location:../../forgotpwd.php?error=mailerror");
                            exit();
                        }
                        elseif($secretq !== $row['u_sec_q']){
                            header("Location:../../forgotpwd.php?error=badsecretq");
                            exit();
                        }
                        elseif($secretq !== $row['u_sec_q']){
                            header("Location:../../forgotpwd.php?error=badsecreta");
                            exit();
                        }
                        elseif ($password !== $repeatpwd){
                            header("Location:../../forgotpwd.php?error=badpasswd");
                            exit();
                        }
                        else{
                            $sql= "UPDATE users SET u_pwd=? WHERE u_cf=? AND u_mail=?";
                            $query = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($query, $sql)) {
                                header("Location:../../forgotpwd.php?error=connectionerror");
                                exit();
                            }
                            else{
                                $hashpwd = password_hash($password, PASSWORD_DEFAULT);

                                mysqli_stmt_bind_param($query, "sss", $hashpwd, $cf, $email);
                                mysqli_stmt_execute($query);
                                sleep(2);
                                header("Location:../../login.php?success=true");
                                exit();
                            }

                        }
                    }
                }

            }

        }
    }


}
/*PASSWORD CHANGE FROM LOGGED IN SESSION*/
elseif (isset($_POST['changepwd-submit'])) {
    session_start();

    require '_dbhandler/dbh.php';

    $cf = $_POST['cf'];
    $password = $_POST['pwd'];

    $sql = "UPDATE users SET u_pwd=? WHERE u_cf=?";
    $query=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($query, $sql)){
        echo  "error";
    }
    else{
        $hashpwd = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($query, "ss", $hashpwd, $_SESSION['ucf']);
        mysqli_stmt_execute($query);
        header("Location:../../?q=chg_pwd");
        exit();
    }


}
else{
    header("Location:../../login.php");
    exit();
}