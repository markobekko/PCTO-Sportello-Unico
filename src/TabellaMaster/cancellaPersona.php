<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");

    $aggiunta = $pdo -> prepare("DELETE FROM Storico_Candidato WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale = ?) AND archiviato='No'");
    $aggiunta -> bindValue(1, $_POST['codice_fiscale']);
    $aggiunta -> execute();
?>