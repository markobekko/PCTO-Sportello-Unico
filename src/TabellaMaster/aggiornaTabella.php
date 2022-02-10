<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
    if(empty($_POST['esito_esame'])){
        $_POST['esito_esame'] = null;
    }

    if(controllaSeArchiviato($pdo) == "No"){
        aggiornaCognome($pdo);
        aggiornaNome($pdo);
        aggiornaEmail($pdo);
        aggiornaDataEsame($pdo);
        aggiornaSpedizioneEmail($pdo);
        aggiornaEsitoEsame($pdo);
    }

    function controllaSeArchiviato($pdo){
        $aggiunta = $pdo -> prepare("SELECT archiviato FROM Storico_Candidato WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE Codice_Fiscale=?) AND id_storico_esame = (SELECT id_esame FROM Sessione_Esame WHERE data_esame=? AND sede_esame=?)");
        $aggiunta -> bindValue(1, $_POST['codice_fiscale']);
        $aggiunta -> bindValue(2, $_POST['data_esame']);
        $aggiunta -> bindValue(3, $_POST['sede_esame']);
        $aggiunta -> execute();
        $archiviato = $aggiunta->fetch();
        return $archiviato[0];
    }

    function aggiornaCognome($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Candidato SET cognome = ? WHERE codice_fiscale = ?");
        $aggiunta -> bindValue(1, $_POST['cognome']);
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }

    function aggiornaNome($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Candidato SET nome = ? WHERE codice_fiscale = ?");
        $aggiunta -> bindValue(1, $_POST['nome']);
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }

    function aggiornaEmail($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Candidato SET email = ? WHERE codice_fiscale = ?");
        $aggiunta -> bindValue(1, $_POST['email']);
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }

    function aggiornaDataEsame($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET id_storico_esame = (SELECT id_esame FROM Sessione_Esame WHERE data_esame=? AND sede_esame=?) WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?) AND archiviato='No'");
        $aggiunta -> bindValue(1, $_POST['data_esame']);
        $aggiunta -> bindValue(2, $_POST['sede_esame']);
        $aggiunta -> bindValue(3, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }
    function aggiornaSpedizioneEmail($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET spedito_utente = ? WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale = ?) AND archiviato='No'");
        if($_POST['spedito_utente'] === 'true'){
            $aggiunta -> bindValue(1, 'Si');
        }
        else{
            $aggiunta -> bindValue(1, 'No');
        }
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> execute();
    }
    function aggiornaEsitoEsame($pdo){
        $aggiunta = $pdo -> prepare("UPDATE Storico_Candidato SET esito_esame=? WHERE id_storico_candidato = (SELECT id_candidato FROM Candidato WHERE codice_fiscale=?) AND id_storico_esame = (SELECT id_esame FROM Sessione_Esame WHERE data_esame=? AND sede_esame=?) AND archiviato='No'");
        $aggiunta -> bindValue(1, $_POST['esito_esame']);
        $aggiunta -> bindValue(2, $_POST['codice_fiscale']);
        $aggiunta -> bindValue(3, $_POST['data_esame']);
        $aggiunta -> bindValue(4, $_POST['sede_esame']);
        $aggiunta -> execute();
    }
?>