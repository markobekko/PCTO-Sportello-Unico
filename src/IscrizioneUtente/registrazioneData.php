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
            <form action="#" method="POST">
                <div class="user-details">

                    <div class="input-box">
                        <span class="detail">Sede:</span> <!-- nome davanti alla label -->
                        
                        <details class="custom-select">
                            <summary class="radios">
                                <input type="radio" name="item" id="default" title="Seleziona la sede" checked>
                                <input type="radio" name="item" id="item1" title="Belluno">
                                <input type="radio" name="item" id="item2" title="Feltre">
                            </summary>
                            <ul class="list">
                                <li>
                                    <label for="item1">Belluno</label>
                                </li>
                                <li>
                                    <label for="item2">Feltre</label>
                                </li>
                            </ul>
                        </details>
                    </div>
                    <div class="input-box">
                        <span class="detail">Data:</span> <!-- nome davanti alla label -->
                            <input type="date" name="data_esame" id="data_esame"required> 
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
            data_esame.min = new Date().toISOString().split("T")[0];
            var T = document.getElementById("successoInserimento");
            function successo(){
                T.style.display = "block";
            }
            setTimeout(
                function(){
                    T.style.display = "none";
                }
            ,2500);
            
        </script>

        <input id="freccia" onclick='window.location = "../index.html";'type="image" src="../img/freccia.png" width="40px" style="margin-top: -20%; position:absolute">
    </body>
</html>