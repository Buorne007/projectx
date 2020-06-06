<?php

if(isset($_POST['user-img-submit'])){
    session_start();

    require '_dbhandler/dbh.php';

    $img = $_FILES['user_img'];
    $imgname=$img['name'];
    $imgtmp = $img['tmp_name'];
    $imgext = explode('.', $imgname);
    $imgactualext =  strtolower(end($imgext));
    $newimgname= "profile_".$_SESSION['ucf'].".".$imgactualext;


    $target = "/xampp/htdocs/projectx/_admin/userimg/".$newimgname;



    if (move_uploaded_file($imgtmp, $target)) {
        echo "Image uploaded successfully";

        $sql= "UPDATE profile_photo SET img=? WHERE u_cf=?";
//        $sql="INSERT INTO profile_photo(u_cf,img) VALUES (?,?)";
        $query = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query, $sql)){
            echo "error connecting to database";
        }
        else{
            mysqli_stmt_bind_param($query, "ss",  $newimgname, $_SESSION['ucf'],);
            mysqli_stmt_execute($query);
            sleep(2);
        }

        header("Location:../../?q=acc_overview");

    }else{
        echo "Failed to upload image";

        sleep(2);
        header("Location:../../?q=acc_overview");

    }



}else{
    header("Location:../../?q=acc_overview");
}
