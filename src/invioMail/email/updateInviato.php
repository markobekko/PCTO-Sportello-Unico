<?php

 function updateCheck($cf){
    require("./conn.php");

    
   

    $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET spedito_utente = ? WHERE id_storico_candidato = 
    (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?) AND archiviato='No'");
    
    $aggiunta -> bindValue(1, 'Si');
    $aggiunta -> bindValue(2, $cf);

    $aggiunta -> execute();
 }


?>