<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
    $aggiunta = $pdo -> prepare("SELECT esito_esame FROM Storico_Candidato WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?)");
    $aggiunta -> bindValue(1, $_POST['codice_fiscale']);
    $aggiunta->execute();
    $valoreEsame = $valoreEsameggiunta->fetch();
    if($valoreEsame[0] == "Superato" || $valoreEsame[0] == "Non Superato" || $valoreEsame[0] == "Assente Giustificato" || $valoreEsame[0] == "Assente non Giustificato" || $valoreEsame[0] == "Non Ammesso"){
        $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET archiviato='Si' WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?)");
        $aggiunta -> bindValue(1, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }
    else{
        $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET archiviato='No' WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?)");
        $aggiunta -> bindValue(1, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }
?>