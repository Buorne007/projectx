<?php
/*
 * This is a custom theme for the registration and login page
 */
$site_icon= '_content/_img/projx_icon.jpg';
$logo= '_content/_img/projx_logob.png';
$site_title="- Project X";
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" http-equiv="Content-Type" content="text/html">
    <!--    load site icon-->
    <link rel="icon" href="<?php echo $site_icon ?>">
    <!--    load stylesheet-->
    <link rel="stylesheet" type="text/css" href="_content/_scss/temp1.css">
    <!--    load our global js file-->
    <script src="_content/_js/global.js"></script>
</head>

<body>
<div id="container" class="container">

    <!-- load header -->
    <div id="header" class="header sticky">
        <div id="logo" class="logo center">
            <a href="#">
                <img src=<?php echo $logo?> alt="logo">
            </a>
        </div>
    </div>

</div>
</body>
</html>
