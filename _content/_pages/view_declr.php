<?php
$page_title="View Declaration";

//load our page title
echo "<title>$page_title $site_title</title>";

if(isset($_POST['view_declr'])){
    $id= $_POST['view_declr'];

require '_admin/_controller/_dbhandler/dbh.php';

//fetch data from table
$sql =  "SELECT * FROM declaration WHERE id=? AND u_cf=?";
$query = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($query, $sql)){
    //echo error
    exit();
}
else{
    mysqli_stmt_bind_param($query, "ss", $id, $_SESSION['ucf']);
    mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);

    while($row = mysqli_fetch_assoc($result)){
        /*
        *output all data in table format
        */
        echo"<div id='form' class='form-declaration'>
             <div id='header-title' class='header-title middle'>
                <h2>AUTODICHIARAZIONE AI SENSI DEGLI ARTT. 46 E 47 D.P.R. N. 445/2000</h2>
                </div>
    <form>
        <div id='form-wrapper' class='form-wrapper preview'>
           <label>Il sottoscritto <input readonly placeholder='" .$row['f_name']. "'></label>
           <label>nato il<input readonly placeholder='" .$row['dob']. "'></label>
           <label>a <input readonly placeholder='" .$row['pob']. "'></label>
           <label>residente in <input readonly placeholder='" .$row['res']. "'></label>
           <label>via <input readonly placeholder='" .$row['addr_res']. "'></label>
           <label>e domiciliato in <input readonly placeholder='" .$row['dom']. "'></label>
           <label>via <input readonly placeholder='" .$row['addr_dom']. "'></label>
           <label>identificato a mezzo <input readonly placeholder='" .$row['mezzo']. "'></label>
           <label> nr. <input readonly placeholder='" .$row['no_mezzo']. "'></label>
           <label>rilasciato da <input readonly placeholder='" .$row['release_by']. "'></label>
           <label> in data <input readonly placeholder='" .$row['release_date']. "'></label>
           <label>utenza telefonica <input readonly placeholder='" .$row['phone']. "'></label>
           <label>consapevole delle conseguenze penali previste in caso di dichiarazioni mendaci a pubblico ufficiale (art. 495 c.p.)</label>
       </div>
       <div id='form-wrapper' class='form-wrapper'>
           <h3><u>DICHIARA SOTTO LA PROPRIA RESPONSABILITÀ</u></h3>
           <ul>
               <li>di non essere sottoposto alla misura della quarantena ovvero di non essere risultato positivo al COVID-19 (fattisalvi gli spostamenti disposti dalle Autorità sanitarie);</li>
               <li>che lo spostamento è iniziato da <label><input readonly placeholder='" .$row['depart']. "'>(indicare l'indirizzo da cui è iniziato)</label>
                   <label>con destinazione <input readonly placeholder='" .$row['dest']. "'></label>
               </li>
               <li>di essere a conoscenza delle misure di contenimento del contagio vigenti alla data odierna concernenti le limitazioni alle possibilità di spostamento delle persone fisiche all'interno di tutto il territorio nazionale;</li>
               <li>di essere a conoscenza delle sanzioni previste dall'art. 4 del decreto legge 25 marzo 2020, n. 19;</li>
               <li>che lo spostamento è determinato da: <input readonly placeholder='" .$row['reason']. "'></label>
               </li>
           </ul>
           <label class='reason-stmt'> A questo riguardo, dichiara che <br><textarea readonly placeholder='" .$row['reason_stmt']. "'></textarea></label>
       </div>
       <div id='form-wrapper' class='form-wrapper spacing'>
           <label  class='col-sm-l submit-date'>Data:" .$row['submit_date']. " alle " .$row['submit_time']. "</label>
           <label class='col-sm-r submit-cf'>Codice fiscale del dichiarante: " .$_SESSION['ucf']. "</label>
       </div>
       <div id='prev_declr' class='prev_declr'>
                    <span><a href='?q=pdeclr'>Return to past declarations</a> </span>
       </div>    
   </form>
</div>";

    }

}

}
else{
    header("Location:?q=pdeclr");
    exit();
}