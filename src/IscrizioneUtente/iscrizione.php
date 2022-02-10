<?php
    include_once("connessione.php");
    $pdo = connessione("localhost","Sportello Unico","root","");
    //$pdo = new PDO('mysql:host=localhost; dbname=Sportello Unico;', "root", "");
	if(isset($_POST['cognome']) && isset($_POST['nome']) && isset($_POST['codice_fiscale']) && isset($_POST['email']) && isset($_POST['data_esame']) && isset($_POST['sede_esame'])){
        $cognome = $_POST['cognome'];
        $nome =  $_POST['nome'];
        $codice_fiscale = $_POST['codice_fiscale'];
        $email = $_POST['email'];
        $data_esame = $_POST['data_esame'];
        $sede_esame = $_POST['sede_esame'];

        if(!controlloCodiceFiscale($codice_fiscale)){
            # TODO: Aggiungi messaggio errore
            exit();
        }
        if(!controlloEmail($email)){
            # TODO: Aggiungi messaggio errore
            exit();
        }
        //Aggiungo l'utente
        $aggiunta = $pdo -> prepare("INSERT INTO Candidato (cognome, nome, codice_fiscale, email, data_esame, sede_esame ) values (?, ?, ?, ?, ?, ?)");
        $aggiunta -> bindValue(1, $cognome);
        $aggiunta -> bindValue(2, $nome);
        $aggiunta -> bindValue(3, $codice_fiscale);
        $aggiunta -> bindValue(4, $email);
        $aggiunta -> bindValue(5, $data_esame);
        $aggiunta -> bindValue(6, $sede_esame);
        $aggiunta -> execute();
	}

    function controlloCodiceFiscale($codice_fiscale){
        if(!preg_match('/^[a-zA-Z]{6}[0-9]{2}[abcdehlmprstABCDEHLMPRST]{1}[0-9]{2}([a-zA-Z]{1}[0-9]{3})[a-zA-Z]{1}$/', $codice_fiscale)){
            return false;
        }
        return true;
    }

    function controlloEmail($email){
        if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email)){
            return false;
        }
        return true;
    }
?>

<!-- @author Thaise Ramos -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iscrizione</title>
        <link rel="stylesheet" href="css/iscrizione.css">

        <script>
            //window.addEventListener("beforeunload", function (e){
            //    var confirmationMessage = "\o/";
            //    (e || window.event).returnValue = confirmationMessage;
            //    return confirmationMessage;
            //});
        </script>
    </head>
    <body >
        <!-- Form: -->
        <div class="container">
            <div class="titolo">Registrazione</div>
            <form method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail">Cognome:</span> <!-- nome davanti alla label -->
                            <input type="text" id="cognome" name="cognome" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Nome:</span> <!-- nome davanti alla label -->
                            <input type="text" name="nome" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Indirizzo email:</span> <!-- nome davanti alla label -->
                            <input type="email" name="email" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Codice Fiscale:</span> <!-- nome davanti alla label -->
                            <input type="text" name="codice_fiscale" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Data dell'esame:</span> <!-- nome davanti alla label -->
                            <input type="date" name="data_esame" required>
                    </div>
                </div>

                <div class="scelta-sede">
                    <input type="radio" name="sede_esame" value="Belluno" id="belluno" required>
                    <input type="radio" name="sede_esame" velue="Feltre" id="feltre" required>
                    <span class="scelta-sede-titolo">Sede:</span>
                    <div class="scelta">
                        <label for="belluno">
                            <span class="bottone uno"></span>
                            <span class="sede">Belluno</span>
                        </label>
                        <label for="feltre">
                            <span class="bottone due"></span>
                            <span class="sede">Feltre</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Registra nominativo">
                </div>
            </form>
        </div>
    </body>
</html>