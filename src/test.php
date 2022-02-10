<?php
    include 'connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
    $aggiunta = $pdo -> prepare("SELECT archiviato FROM Storico_Candidato WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE Codice_Fiscale='CRCGPP95D02L042G')");
    $aggiunta -> execute();
    $archiviato = $aggiunta->fetch();
    print_r($archiviato);
?>