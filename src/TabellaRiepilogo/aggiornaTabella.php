<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
    if(empty($_POST['esito_esame'])){
        $_POST['esito_esame'] = null;
    }
    aggiornaCognome($pdo);
    aggiornaNome($pdo);
    aggiornaEmail($pdo);
    aggiornaSpedizioneEmail($pdo);
    if(isset($_POST['data_esame']) || isset($_POST['sede_esame'])){
        aggiornaEsitoEsame($pdo);
        aggiornaDataEsame($pdo);
    }

    // Aggiorna il cognome nel DB
    function aggiornaCognome($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Candidato SET cognome = ? WHERE codice_fiscale = ?");
        $aggiunta -> bindValue(1, $_POST['cognome']);
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }

    // Aggiorna il nome nel DB
    function aggiornaNome($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Candidato SET nome = ? WHERE codice_fiscale = ?");
        $aggiunta -> bindValue(1, $_POST['nome']);
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }

    // Aggiorna l'email nel DB
    function aggiornaEmail($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Candidato SET email = ? WHERE codice_fiscale = ?");
        $aggiunta -> bindValue(1, $_POST['email']);
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }

    // Aggiorna la data dell'esame nel DB
    function aggiornaDataEsame($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET id_storico_esame = (SELECT id_esame FROM Sessione_Esame WHERE data_esame=? AND sede_esame=?) WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?) AND archiviato='No'");
        $aggiunta -> bindValue(1, $_POST['data_esame']);
        $aggiunta -> bindValue(2, $_POST['sede_esame']);
        $aggiunta -> bindValue(3, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }

    // Aggiorna il risultato dell'invio dell'email nel DB
    function aggiornaSpedizioneEmail($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET spedito_utente = ? WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?) AND archiviato='No'");
        if($_POST['spedito_utente'] === 'true'){
            $aggiunta -> bindValue(1, 'Si');
        }
        else{
            $aggiunta -> bindValue(1, 'No');
        }
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }
    
    // Aggiorna l'esito dell'esame nel DB
    function aggiornaEsitoEsame($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET esito_esame=? WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?) AND id_storico_esame = (SELECT id_esame FROM Sessione_Esame WHERE data_esame=? AND sede_esame=?) AND archiviato='No'");
        $aggiunta -> bindValue(1, $_POST['esito_esame']);
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> bindValue(3, $_POST['data_esame']);
        $aggiunta -> bindValue(4, $_POST['sede_esame']);
        $aggiunta -> execute();
    }
?>