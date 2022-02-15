<?php include "inserimentoData.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iscrizione</title>
        <link rel="stylesheet" href="../css/iscrizione.css">  
    </head>
    <body>
        <!-- Form: -->
        <div class="container">
            <div class="titolo">Inserimento nuova data</div>
            <button type="button" id="indietro">Indietro</button>
            <form action="#" method="POST">
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
                            <input type="date" name="data_esame" id="data_esame"required> 
                    </div>
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
        </script>
    </body>
</html>