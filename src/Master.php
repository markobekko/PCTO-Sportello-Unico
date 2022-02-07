<!DOCTYPE html>
<html>
    <head>
        <title>Riepilogo iscrizioni</title>
        <link rel = “stylesheet” type = “text/css” href = “stylesheet.css” />
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <script src="js/master_script.js"></script> 
    </head>
    <body>
        <div class="principale">
            <div class="superiore">
                <input type="text" id="cerca" placeholder="Cerca">
                <button type="button" id="esciSalva">Salva ed esci</button>
                <button type="button" id="esciSenzaSalvare">Esci senza salvare</button>
                <button type="button" id="spedisci">Spedisci invito</button>
                <button type="button" id="archivia">Archivia Tutto</button>
                <button type="button" id="aggiorna" name="aggiorna">Aggiorna</button>
            </div>
            <?php include "ricezioneDati.php";?>
            <script>cercaParole();</script>
            <script>
                var table = $("#tabella");
                document.getElementById('aggiorna').onclick = function() {
                    aggiornaTabella();
                };
                document.getElementById('esciSenzaSalvare').onclick = function() {
                    esciSenzaSalvare();
                };
                document.getElementById('esciSalva').onclick = function() {
                    esciSalvando();
                }
                document.getElementById('archivia').onclick = function() {
                    archiviaPersona();
                };
            </script>
        </div>
    </body>
</html>