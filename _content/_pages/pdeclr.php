<?php
$page_title="Past Declarations";

//load our page title
echo "<title>$page_title $site_title</title>";

require '_admin/_controller/_dbhandler/dbh.php';
//fetch data from table
    $sql =  "SELECT * FROM declaration WHERE u_cf=?";
    $query = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($query, $sql)){
        //echo error
        exit();
    }
    else{
        mysqli_stmt_bind_param($query, "s", $_SESSION['ucf']);
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        $no_rows = mysqli_num_rows($result); //get the number of rows

        /*
         * check if atleast 1 row exist for the user else return error.
         */

        if($no_rows < 1){
            echo "No result Found";
        }
        else {
            echo "<table class='table_header'>
            <tr>
                <th>Index</th>
                <th>Codice Fiscale</th>
                <th>Nome</th>
                <th>Punto di Partenza</th>
                <th>Destinazione</th>
                <th>Data</th>
                <th></th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                /*
                *output all data in table format
                */
                echo "<tr class='table_body'>";
                echo "<td>" . $id = $row['id'] . "</td>";
                echo "<td>" . $_SESSION['ucf'] . "</td>";
                echo "<td>" . $row['f_name'] . "</td>";
                echo "<td>" . $row['depart'] . "</td>";
                echo "<td>" . $row['dest'] . "</td>";
                echo "<td>" . $row['submit_date'] . " - " . $row['submit_time'] . "</td>";
                echo "<td>
                    <form action='?q=view_declr' method='post'>
                        <button name='view_declr' value='$id'></button>
                    </form>
                  </td>";
                echo "</tr>";
            }

            echo "</table>";
        }

    }

?>
