<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
	if(isset($_POST['cognome']) && isset($_POST['nome']) && isset($_POST['codice_fiscale']) && isset($_POST['email']) && isset($_POST['registrazioneNominativo'])){
        $cognome = $_POST['cognome'];
        $nome =  $_POST['nome'];
        $codice_fiscale = $_POST['codice_fiscale'];
        $email = $_POST['email'];

        if(!controlloCodiceFiscale($codice_fiscale)){
            echo '<script>$("#erroreCF").modal("show");</script>';
            exit();
        }
        if(!controlloEmail($email)){
            echo '<script>$("#erroreMail").modal("show");</script>';
            exit();
        }
        if(controlloSeCFEsiste($pdo,$codice_fiscale)){
            echo '<script>$("#erroreCFEsistente").modal("show");</script>';
            exit();
        }

        // Aggiunta del Candidato
        $aggiunta = $pdo -> prepare("INSERT INTO Candidato (cognome,nome,codice_fiscale,email) VALUES (?,?,?,?)");
        $aggiunta -> bindValue(1, $cognome);
        $aggiunta -> bindValue(2, $nome);
        $aggiunta -> bindValue(3, $codice_fiscale);
        $aggiunta -> bindValue(4, $email);
        $aggiunta -> execute();

        // Selezione del suo ID
        $aggiunta = $pdo -> prepare("SELECT id_candidato FROM Candidato WHERE codice_fiscale = ?");
        $aggiunta -> bindValue(1, $codice_fiscale);
        $aggiunta -> execute();
        $risultato = $aggiunta -> fetch();

        // Aggiunta del Candidato alla tabella Storico_Candidato
        $aggiunta = $pdo -> prepare("INSERT INTO Storico_Candidato (id_storico_candidato) VALUES (?)");
        $aggiunta -> bindValue(1, $risultato[0]);
        $aggiunta -> execute();

        echo("<script>successo();</script>");
	}
    if(isset($_POST['codice_fiscale_esistente']) && isset($_POST['aggiuntaNominativo'])){
        $codice_fiscale = $_POST['codice_fiscale_esistente'];
        if(controlloSeCFEsiste($pdo,$codice_fiscale)){
            // Selezione del suo ID
            $aggiunta = $pdo -> prepare("SELECT id_candidato FROM Candidato WHERE codice_fiscale = ?");
            $aggiunta -> bindValue(1, $codice_fiscale);
            $aggiunta -> execute();
            $risultato = $aggiunta -> fetch();

            // Aggiunta dell'utente alla tabella Storico_Candidato
            $aggiunta = $pdo -> prepare("INSERT INTO Storico_Candidato (id_storico_candidato) VALUES (?)");
            $aggiunta -> bindValue(1, $risultato[0]);
            $aggiunta -> execute();
            echo("<script>successo();</script>");
            exit();
        }
        else{
            echo '<script>$("#erroreCF").modal("show");</script>';
            exit();
        }
	}
    if(isset($_POST['cancellazioneNominativo'])){
        // Cancellazione Candidato
        $aggiunta = $pdo -> prepare("DELETE FROM Candidato WHERE codice_fiscale=?");
        $aggiunta -> bindValue(1, $codice_fiscale);
        $aggiunta -> execute();
    }

    // Controllo del codice fiscale
    // @return true se il codice fiscale è valido
    // @return false se il codice fiscale non è valido
    function controlloCodiceFiscale($codice_fiscale){
        if(!preg_match('/^(?:[A-Z][AEIOU][AEIOUX]|[AEIOU]X{2}|[B-DF-HJ-NP-TV-Z]{2}[A-Z]){2}(?:[\dLMNP-V]{2}(?:[A-EHLMPR-T](?:[04LQ][1-9MNP-V]|[15MR][\dLMNP-V]|[26NS][0-8LMNP-U])|[DHPS][37PT][0L]|[ACELMRT][37PT][01LM]|[AC-EHLMPR-T][26NS][9V])|(?:[02468LNQSU][048LQU]|[13579MPRTV][26NS])B[26NS][9V])(?:[A-MZ][1-9MNP-V][\dLMNP-V]{2}|[A-M][0L](?:[1-9MNP-V][\dLMNP-V]|[0L][1-9MNP-V]))[A-Z]$/i', $codice_fiscale)){
            return false;
        }
        return true;
    }
    // Controllo dell'email
    // @return true se l'email è valida
    // @return false se l'email non è valida
    function controlloEmail($email){
        if(!preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD',$email)){
            return false;
        }
        return true;
    }
    // Controllo se il codice fiscale esiste già tra gli utenti
    // @return true se esiste
    // @return false se non esiste
    function controlloSeCFEsiste($pdo,$codice_fiscale){
        $aggiunta = $pdo -> prepare("SELECT COUNT(*) FROM Candidato WHERE codice_fiscale=?");
        $aggiunta -> bindValue(1, $codice_fiscale);
        $aggiunta -> execute();
        if($aggiunta->fetchColumn(0) > 0){
            return true;
        }
        return false;
    }
?>