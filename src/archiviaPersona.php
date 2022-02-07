<?php
    include 'connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
    echo "connesso";
    $aggiunta = $pdo -> prepare("SELECT esito_esame FROM Storico_Candidato WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?)");
    $aggiunta -> bindValue(1, $_POST['codice_fiscale']);
    $aggiunta->execute();
    $a = $aggiunta->fetch();
    if($a[0] == "Superato"){
        $aggiunta = $pdo -> prepare("UPDATE Candidato SET archiviato='Si' WHERE codice_fiscale=?");
        $aggiunta -> bindValue(1, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }
    else{
        $aggiunta = $pdo -> prepare("UPDATE Candidato SET archiviato='No' WHERE codice_fiscale=?");
        $aggiunta -> bindValue(1, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }
?>