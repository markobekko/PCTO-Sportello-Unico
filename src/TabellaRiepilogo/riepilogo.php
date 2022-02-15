<!DOCTYPE html>
<html>
    <head>
        <title>Riepilogo iscrizioni</title>
        <link rel = “stylesheet” type = “text/css” href = “stylesheet.css” />
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <script src="../js/master_script.js"></script> 
    </head>
    <body>
        <div class="principale">
        <button type="button" id="indietro">Indietro</button>
            <div class="superiore">
                <input type="text" id="cerca" placeholder="Cerca">
                <button type="button" id="salva">Salva</button>
                <button type="button" id="esciSenzaSalvare">Esci senza salvare</button>
                <button type="button" id="spedisci">Spedisci invito</button>
                <button type="button" id="archivia">Archivia Tutto</button>
                <button type="button" id="aggiorna" name="aggiorna">Aggiorna</button>
                <input type="number" id="numBelluno" name="numBelluno" value="0" disabled>
                <input type="number" id="numFeltre" name="numFeltre" value="0" disabled>
                <?php include "selezioneData.php";?>
                <button type="button" id="salvaData" name="salvaData">Salva Data</button>
            </div>
            <?php include "ricezioneDati.php";?>
            <script>cercaParole();</script>
            <script>aggiornaSedi();</script>
            <script>
                var table = $("#tabella");
                document.getElementById('aggiorna').onclick = function() {
                    aggiornaTabella();
                };
                document.getElementById('esciSenzaSalvare').onclick = function() {
                    esciSenzaSalvare();
                    aggiornaTabella();
                };
                document.getElementById('salva').onclick = function() {
                    salvaDati();
                };
                document.getElementById('archivia').onclick = function() {
                    archiviaPersona();
                    aggiornaTabella();
                };
                document.getElementById('salvaData').onclick = function() {
                    salvaDataPerTutti();
                };
                document.getElementById('indietro').onclick = function() {
                    window.location = "../index.html";
                };
            </script>
        </div>
    </body>
</html>