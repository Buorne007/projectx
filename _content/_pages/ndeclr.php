<?php
$page_title="New Declaration";

//load our page title
echo "<title>$page_title $site_title</title>";

    require '_admin/_controller/_dbhandler/dbh.php';
/*get data to prefill form*/
$sql = "SELECT * FROM users WHERE u_cf=?";
$query = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($query, $sql)){
    //header("Location:../../login.php?error=connectionerror");
    exit();
}
else{
    mysqli_stmt_bind_param($query, "s", $_SESSION['ucf']);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
    if($row = mysqli_fetch_assoc($result)){
        $f_name = $row['u_name'];
        $s_name = $row['u_surname'];

    }
}
// close all connections
mysqli_stmt_close($query);
mysqli_close($conn);

?><!DOCTYPE html>
<div id="header-title" class="header-title middle">
    <h2>AUTODICHIARAZIONE AI SENSI DEGLI ARTT. 46 E 47 D.P.R. N. 445/2000</h2>
    <p>Please fill the form below.</p>
    <?php
    if(!isset($_GET['error'])) {
        echo '';
    }
    ?>
</div>
<div id="form" class="form-declaration">
    <form action="_admin/_controller/_dbhandler/ndeclr-ctrl.php" method="post">
        <div id="form-wrapper" class="form-wrapper">
            <label>Il sottoscritto <input type="text" name="f_name" size="42" value="<?php echo $f_name. " " .$s_name; ?>" required></label>
            <label>nato il <input type="date" name="dob" required></label>
            <label>a <input type="text" name="pob" size="10" required></label>
            <label>residente in <input type="text" name="res" size="10" required></label>
            <label>via <input type="text" name="addr_res" size="30" required></label>
            <label>e domiciliato in <input type="text" name="dom" size="10"></label>
            <label>via <input type="text" name="addr_dom" size="30" ></label>
            <label>identificato a mezzo <input type="text" name="mezzo" size="15"></label>
            <label> nr. <input type="text" name="no_mezzo" maxlength="7" size="10"></label>
            <label>rilasciato da <input type="text" name="release_by" size="20"></label>
            <label> in data <input type="date" name="release_date"></label>
            <label>utenza telefonica <input type="tel" name="phone" max="13" required></label>
            <label>consapevole delle conseguenze penali previste in caso di dichiarazioni mendaci a pubblico ufficiale (art. 495 c.p.)</label>
        </div>
        <div id="form-wrapper" class="form-wrapper">
            <h3><u>DICHIARA SOTTO LA PROPRIA RESPONSABILITÀ</u></h3>
            <ul>
                <li>di non essere sottoposto alla misura della quarantena ovvero di non essere risultato positivo al COVID-19 (fattisalvi gli spostamenti disposti dalle Autorità sanitarie);</li>
                <li>che lo spostamento è iniziato da <label><input type="text" name="depart" size="15" required>(indicare l'indirizzo da cui è iniziato)</label>
                    <label>con destinazione<input type="text" name="dest" size="15" required></label>
                </li>
                <li>di essere a conoscenza delle misure di contenimento del contagio vigenti alla data odierna concernenti le limitazioni alle possibilità di spostamento delle persone fisiche all'interno di tutto il territorio nazionale;</li>
                <li>di essere a conoscenza delle sanzioni previste dall'art. 4 del decreto legge 25 marzo 2020, n. 19;</li>
                <li>che lo spostamento è determinato da:
                    <div id="reason" class="reason">
                        <label for="r1"><input type="radio" id="r1" name="reason" value="comprovate esigenze lavorative" required> comprovate esigenze lavorative;</label>
                        <label for="r2"><input type="radio" id="r2" name="reason" value="assoluta urgenza" required> assoluta urgenza;</label>
                        <label for="r3"> <input type="radio" id="r3" name="reason" value="situazione di necessità" required> situazione di necessità;</label>
                        <label for="r4"> <input type="radio" id="r4" name="reason" value="motivi di salute" required> motivi di salute.</label>
                    </div>
                </li>
            </ul>
            <label class="reason-stmt"> A questo riguardo, dichiara che <br> <textarea name="reason_stmt" maxlength="100" rows="5" cols="60"></textarea></label>
        </div>
        <div id="form-wrapper" class="form-wrapper spacing">
            <label  class="col-sm-l submit-date">Data: <input type="text" name="submit_date" value="<?php echo  date('d-m-Y'); ?>" readonly>alle
                <input type="text" name="submit_time" value="<?php echo  date('H:i:s'); ?>" readonly></label>
            <label class="col-sm-r submit-cf">Codice fiscale del dichiarante: <?php echo $_SESSION['ucf']; ?></label>
        </div>
        <div id="form-wrapper" class="form-wrapper button-submit middle">
            <button type="submit" name="ndeclr-submit"> Submit</button>
        </div>
    </form>
</div>