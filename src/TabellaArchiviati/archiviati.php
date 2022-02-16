<!DOCTYPE html>
<html>
    <head>
        <title>Riepilogo iscrizioni</title>
        <link rel = “stylesheet” type = “text/css” href = “stylesheet.css” />
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <script src="../js/archiviati_script.js"></script> 
    </head>
    <body>
        <div class="principale">
            <button type="button" id="indietro">Indietro</button>
            <div class="superiore">
                <input type="text" id="cerca" placeholder="Cerca">
                <button type="button" id="esci" name="esci">Esci</button>
                <button type="button" id="aggiorna" name="aggiorna">Aggiorna</button>
                <input type="number" id="numBelluno" name="numBelluno" value="0" disabled>
                <input type="number" id="numFeltre" name="numFeltre" value="0" disabled>
            </div>
            <div id="table">
                <table class="sortable" id="tabella">
                    <thead>
                        <tr>
                            <th>Cognome</th>
                            <th>Nome</th>
                            <th>Codice fiscale</th>
                            <th>Mail</th>
                            <th>Data e Sede</th>
                            <th>Esito Esame</th>
                        </tr>
                    </thead>
                    <tbody id="datiTabella">
                        <?php include "ricezioneArchiviati.php";?>
                    </tbody>
                </table>
            </div>
            <script>cercaParole();</script>
            <script>aggiornaSedi();</script>
            <script>
                var table = $("#datiTabella");
                document.getElementById('aggiorna').onclick = function() {
                    aggiornaTabella();
                };
                document.getElementById('indietro').onclick = function() {
                    window.location = "../index.html";
                };
            </script>
        </div>
    </body>
</html>