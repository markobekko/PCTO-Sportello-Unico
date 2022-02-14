<?php
    include "inserimentoDati.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iscrizione</title>
        <link rel="stylesheet" href="../css/iscrizione.css">  
        <script src="../js/iscrizione_script.js"></script> 
    </head>
    <body>
        <div class="container">
            <div class="titolo">Registrazione</div>
            <form action="#" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail">Cognome:</span> <!-- nome davanti alla label -->
                        <input type="text" id="cognome" name="cognome" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Nome:</span> <!-- nome davanti alla label -->
                        <input type="text" id="nome" name="nome" required>  
                    </div>
                    <div class="input-box">
                        <span class="detail">Indirizzo email:</span> <!-- nome davanti alla label -->
                        <input type="email" id="email" name="email" required>  
                    </div>
                    <div class="input-box">
                        <span class="detail">Codice Fiscale:</span> <!-- nome davanti alla label -->
                        <input type="text" id="codice_fiscale" name="codice_fiscale" required> 
                    </div>
                </div>
                <div class="button">
                    <br><br><input type="submit" value="Registra nominativo">
                </div>
            </form>
        </div>
        
        <script>
            //controlloSeChiusura();
        </script>
    </body>
</html>