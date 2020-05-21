<?php
//check that user click the signup button
if (isset($_POST['signup-submit'])){

    //request db handler
    require '_dbhandler/dbh.php';

    //assign data to temp variables
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $cf = $_POST['cf'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $repeatpwd = $_POST['repeat-pwd'];
    $secretq = $_POST['secret-q'];
    $secreta = $_POST['secret-a'];

    /*
     * Error handlers
     */
    if(empty($name) || empty($surname) || empty($cf) || empty($email) || empty($password) || empty($repeatpwd) || empty($secretq) || empty($secreta)){

        //link user back to previous page showing error and already filled data
       header("Location:../../signup.php?error=emptyfields&name=".$name."&surname=".$surname."&cf=".$cf."&email="
     .$email."&secretq=".$secretq);
       exit();

    }

    //check for that names data is alphabet
    elseif (!preg_match("/^[a-zA-Z ]*$/", $name)){
        //link user back to previous page showing error and already filled data
        header("Location:../../signup.php?error=invalidname&surname=".$surname."&cf=".$cf."&secretq=".$secretq."&email="
            .$email."&secretq=".$secretq);
    exit();
    }
    //check for that surname data is alphabet
    elseif (!preg_match("/^[a-zA-Z ]*$/", $surname)){
        //link user back to previous page showing error and already filled data
        header("Location:../../signup.php?error=invalidsurname&name=".$name."&cf=".$cf."&secretq=".$secretq."&email="
            .$email."&secretq=".$secretq);
    exit();
    }
    //check for that codice fiscale data is alphanumeric
    elseif (!preg_match("/^[a-zA-Z0-9]*$/",$cf)){
        //link user back to previous page showing error and already filled data
        header("Location:../../signup.php?error=invalidcodicefiscale&name=".$name."&surname=".$surname."&secretq=".$secretq."&email="
            .$email."&secretq=".$secretq);
        exit();
    }

    //check mail validation
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //link user back to previous page showing error and already filled data
        header("Location:../../signup.php?error=invalidemail&name=".$name."&surname=".$surname."&cf=".$cf."&secretq=".$secretq);
        exit();
    }

    //check password valid and match
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $password) || $password !== $repeatpwd){
        //link user back to previous page showing error and already filled data
        header("Location:../../signup.php?error=badpassword&name=".$name."&surname=".$surname."&secretq=".$secretq."&email="
            .$email."&secretq=".$secretq);
        exit();
    }
    // check if user exist (using the email as KEY)
    else {
        $sql = "SELECT u_mail FROM users WHERE u_mail=?";
        $query = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query, $sql)){
            header("Location:../../signup.php?error=connectionerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($query, "s", $email);  //s -> String, I -> Integer, B -> blob, d -> double
            mysqli_stmt_execute($query); //execute the query
            mysqli_stmt_store_result($query); //fetch info from db
            $result = mysqli_stmt_num_rows($query); //save the number of rows (0 or 1)
            if($result > 0){
                header("Location:../../signup.php?error=emailexist&name=".$name."&surname=".$surname."&secretq=".$secretq."&email="
                    .$email."&secretq=".$secretq);
                exit();
            }
            //write values to table
            else{
                $sql = "INSERT INTO users (u_name, u_surname, u_cf, u_mail, u_pwd, u_sec_q, u_sec_a) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
                $query =  mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($query, $sql)){
                    header("Location:../../signup.php?error=connectionerror");
                    exit();
                }
                else{
                    $hashpwd = password_hash($password, PASSWORD_DEFAULT); // we hash the password here and store in a temp variable

                    mysqli_stmt_bind_param($query, "sssssss", $name, $surname, $cf, $email, $hashpwd, $secretq, $secreta);
                    mysqli_stmt_execute($query); //execute the query
                    //start user session
                    session_start();
                    $_SESSION['uID'] = $email;
                    $_SESSION['ucf'] = $cf;
                    header("Location:../../?q=_home");
                    exit();


                }
            }


        }

    }
    // close all connections
    mysqli_stmt_close($query);
    mysqli_close($conn);
} else {
    //if user didnt get here via the signup page, return to signup page
    header("Location:../../signup.php");
    exit();
}

