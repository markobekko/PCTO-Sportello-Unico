<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrazione Data</title>
        <link rel="stylesheet" href="../css/iscrizione.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Form: -->
        <div class="container">
            <div class="titolo">Inserimento nuova data</div>
            <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail">Sede:</span> <!-- nome davanti alla label -->
                        <select name="sede_esame" id="sede_esame">
                            <option value="Belluno">Belluno</option>
                            <option value="Feltre">Feltre</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="detail">Data:</span> <!-- nome davanti alla label -->
                        <input type="date" name="data_esame" id="data_esame" required> 
                    </div>
                </div>
                <div id="successoInserimento" style="display:none" class="alert alert-success">
                    <strong>Successo!</strong> La data è stata inserita.
                </div>
                <div class="button">
                    <input type="submit" value="Registra nuova data">
                </div>
            </form>
        </div>
        <script>
            document.getElementById('indietro').onclick = function() {
                window.location = "../index.html";
            };
            data_esame.min = new Date().toISOString().split("T")[0];
            var T = document.getElementById("successoInserimento");
            function successo(){
                T.style.display = "block";
            }
            setTimeout(
                function() {
                    T.style.display = "none";
                }
            ,2500);
            
        </script>
        <input id="freccia" onclick='window.location = "../index.html";'type="image" src="../img/freccia.png" width="40px" style="margin-top: -20%; position:absolute">
    </body>
</html>
<?php include "inserimentoData.php"; ?>