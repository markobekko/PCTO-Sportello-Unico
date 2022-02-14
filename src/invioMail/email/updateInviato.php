<?php

 function updateCheck($cf){
    $pdo= new PDO("mysql:host=127.0.0.1;dbname=sportello unico",'root','');

    
   

    $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET spedito_utente = ? WHERE id_storico_candidato = 
    (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?) AND archiviato='No'");
    
    $aggiunta -> bindValue(1, 'Si');
    $aggiunta -> bindValue(2, $cf);

    $aggiunta -> execute();
 }


?>