<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrazione Data</title>
        <link rel="stylesheet" href="../css/iscrizione.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="../js/iscrizione_utente.js"> </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="titolo">Inserimento nuova data</div>
            <form action="" method="POST">
                <div class="user-details">
                    <!-- Selezione sede dell'esame -->
                    <div class="input-box select">
                        <span class="detail">Sede:</span>
                        <select name="sede_esame" id="sede_esame">
                            <option value="Belluno">Belluno</option>
                            <option value="Feltre">Feltre</option>
                        </select>
                    </div>
                    <!-- Selezione data dell'esame -->
                    <div class="input-box">
                        <span class="detail">Data:</span>
                        <input type="date" name="data_esame" id="data_esame" required> 
                    </div>
                </div>
                <!-- Bottone di conferma -->
                <br><div class="button">
                    <input type="submit" value="Registra nuova data">
                </div><br>
                <div id="successoInserimento" style="display:none" class="alert alert-success">
                    <strong>Successo!</strong> La data è stata inserita.
                </div>
                <div id="erroreData" style="display:none" class="alert alert-danger">
                    <strong>Errore!</strong> La data inserita è già esistente.
            </div>
            </form>
        </div>
        <script>
            // Prende la data di oggi e lo aggiunge come attributo min a data_esame
            var oggi = new Date().toISOString().split('T')[0];
            document.getElementsByName("data_esame")[0].setAttribute('min', oggi);
        </script>
        <input id="freccia" onclick='window.location = "../index.html";'type="image" src="../img/freccia.png" width="40px" style="margin-top: -20%; position:absolute">
    </body>
</html>
<?php include "inserimentoData.php"; ?>