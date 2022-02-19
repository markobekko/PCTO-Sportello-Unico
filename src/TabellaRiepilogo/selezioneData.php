<?php
    $conn = mysqli_connect("localhost","root","","Sportello Unico");
    $risultatoEsame = $conn -> query("SELECT id_esame, data_esame, sede_esame FROM Sessione_Esame");
    while ($row = $risultatoEsame->fetch_assoc()){
        // Se la data dell'esame è maggiore della data di oggi allora aggiunge la data come option
        if (new DateTime() <= new DateTime($row['data_esame']) && !empty($row['data_esame']))
            echo '<option value="'. $row['data_esame'] ." - ". $row['sede_esame'] .'">'. $row['data_esame'] ." - ". $row['sede_esame'] .'</option>';
    }
?>