<?php
    $site_icon= '_content/_img/projx_icon.jpg';
    $site_title="- Project X";
?><!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8" http-equiv="Content-Type" content="text/html">
        <!--    load site icon-->
        <link rel="icon" href="<?php echo $site_icon ?>">
        <!--    load stylesheet-->
        <link rel="stylesheet" type="text/css" href="_content/_scss/temp1.css">
        <!--    load jQuery via CDN-->
        <script src="//code.jquery.com/jquery-3.5.0.slim.min.js" integrity="sha256-MlusDLJIP1GRgLrOflUQtshyP0TwT/RHXsI1wWGnQhs=" crossorigin="anonymous"></script>
        <!--    check if jQuery has been loaded via CDN else load from local repo-->
        <script>window.jQuery || document.write('<script src="_content/_js/jquery-3.5.0.min.js"><\/script>');</script>
        <!--    load our global js file-->
        <script src="_content/_js/global.js"></script>
        <!-- Load Fontawsome via CDN -->
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    </head>

    <body>
        <div id="container" class="container">

            <!-- load header -->
            <div id="header" class="header sticky">
                <?php require ("_content/_section/_header.php"); ?>
            </div>

            <!-- body -->
            <div id="content" class="content">
                <!-- load side nav    -->
                <div id="sidebar" class="<?php if ($p == ''|| $p == '_home'){echo'hidden';} else{echo 'sidebar';}?>">
                    <?php
                    if($p=="acc_overview" || $p=="family" || $p=="chg_pwd"){
                        require_once ("_content/_section/_account_sidebar.php");
                    } else/*if ($p=="ndeclr" || $p=="pdeclr" || $p=="requests")*/{
                        require_once ("_content/_section/_declr_sidebar.php");
                    }
                    ?>
                </div>



                <!-- load main -->
                <div id="main" class="<?php if ($p == '' || $p == '_home'){echo'f_width';} else{echo 'main';}?>">
                    <?php require_once ("_content/_section/_main.php"); ?>
                </div>
            </div>
            <!-- load footer -->
            <div id="footer" class="footer">
                <?php require_once ("_content/_section/_footer.php"); ?>
            </div>
        </div>
    </body>
</html>