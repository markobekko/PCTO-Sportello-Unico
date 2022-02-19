<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
    if(isset($_POST['codice_fiscale_esistente'])){
        // Cancellazione Candidato in "Storico_Candidato"
        $aggiunta = $pdo -> prepare("DELETE FROM Storico_Candidato WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale = ?)");
        $aggiunta -> bindValue(1, $_POST['codice_fiscale_esistente']);
        $aggiunta -> execute();
        // Cancellazione Candidato in "Candidato"
        $aggiunta = $pdo -> prepare("DELETE FROM Candidato WHERE codice_fiscale=?");
        $aggiunta -> bindValue(1, $_POST['codice_fiscale_esistente']);
        $aggiunta -> execute();
        exit();
    }
    else{
        die("Errore");
    }
    
?>