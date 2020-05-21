<?php
    if (isset($_POST['login-submit'])){
        require '_dbhandler/dbh.php';

        //define temp variables to hold data
        $cf = $_POST['cf'];
        $email = $_POST['mail'];
        $password = $_POST['pwd'];

        //check if fields are empty
        if(empty($cf) || empty($email) || empty($password)){
            header("Location:../../login.php?error=emptyfields&cf=".$cf."&email=".$email);
            exit();
        }
        //verify data
        else{
            $sql = "SELECT * FROM users WHERE u_cf=? AND u_mail=?";
            $query = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($query, $sql)){
                header("Location:../../login.php?error=connectionerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($query, "ss", $cf, $email); // fetch row data in table
                mysqli_stmt_execute($query);
                $result = mysqli_stmt_get_result($query);
                if($row = mysqli_fetch_assoc($result)){
                    //check that password entered corresponds to saved password
                    $pwdcheck = password_verify($password, $row['u_pwd']);
                    //if wrong show errror
                    if($pwdcheck == false){
                        header("Location:../../login.php?error=wrongpassword");
                        exit();
                    }

                    //if they corresponds
                    elseif ($pwdcheck == true){
                        //start user session
                        session_start();
                        $_SESSION['uID'] = $row['u_id'];
                        $_SESSION['ucf'] = $row['u_cf'];
                        header("Location:../../?q=_home");
                        exit();

                    }
                }
                else{
                    header("Location:../../login.php?error=nouserfound");
                    exit();
                }
            }
        }


    }
    else{
        header("Location:../../login.php");
        exit();
    }