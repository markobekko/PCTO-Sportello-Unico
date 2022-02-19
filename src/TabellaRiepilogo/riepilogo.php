<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <title>Riepilogo iscrizioni</title>
        <script src='../js/master_script.js'></script>
        <script src='../js/email_script.js'></script>
        <link rel="stylesheet" href="../css/styleRiepilogo.css">
        <script src='https://code.jquery.com/jquery-3.5.0.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script src='https://www.kryogenix.org/code/browser/sorttable/sorttable.js'></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" />
    </head>
    <body>
        <div class='principale'>
            <div class="wrap">
                <div class="search">
                    <input type='text' id='cerca' placeholder='Cerca'>
                </div>
            </div>
            <button type='button' id='indietro'>Indietro</button>
            <div class='superiore'>
                <button type='button' id='esciSalva'>Salva</button>
                <button type='button' id='esciSenzaSalvare'>Esci senza salvare</button>
                <button type='button' id='spedisci'>Spedisci invito</button>
                <button type='button' id='archivia'>Archivia Tutto</button>
                <button type='button' id='aggiorna' name='aggiorna'>Aggiorna</button>
                <label id="riepilogo">Riepilogo candidati</label>
                <label id="labelBelluno">Belluno</label>
                <label id="labelFeltre">Feltre</label>
                <input type='number' id='numBelluno' name='numBelluno' value='0' disabled>
                <input type='number' id='numFeltre' name='numFeltre' value='0' disabled>
                <select name='esameData' id='esameData'>
                    <option hidden value='-1'>------</option>
                    <?php include 'selezioneData.php';?>
                </select>
                <button type='button' id='salvaData' name='salvaData'>Salva Data</button>
            </div>
            <div id='table'>
                <table class='sortable' id='tabella'>
                    <thead>
                        <tr>
                            <th>Cognome</th>
                            <th>Nome</th>
                            <th>Codice fiscale</th>
                            <th>Mail</th>
                            <th>Data e Sede</th>
                            <th>Invito Spedito</th>
                            <th>Esito Esame</th>
                        </tr>
                    </thead>
                    <tbody id='datiTabella'>
                        <?php include 'ricezioneDati.php';?>
                    </tbody>
                </table>
            </div>
            <!-- Funzione di ricerca del candidato -->
            <script>cercaCandidato();</script>
            <!-- Imposta il numero dei candidati che svolgono l'esame nella sede a Belluno/Feltre  -->
            <script>aggiornaSedi();</script>
        </div>
        <script>
                var table = $('#datiTabella');
                // Aggiorna la tabella prendendo i dati dal DB
                document.getElementById('aggiorna').onclick = function() {
                    aggiornaTabella();
                };
                // Redirect verso la pagina index.html
                document.getElementById('esciSenzaSalvare').onclick = function() {
                    window.location = '../index.html';
                };
                // Salva i dati dalla tabella nel DB
                document.getElementById('esciSalva').onclick = function() {
                    salvaDati();
                };
                // Archivia i candidati con un esito
                document.getElementById('archivia').onclick = function() {
                    archiviaPersona();
                    aggiornaTabella();
                };
                // Salva la data per tutti i candidati
                document.getElementById('salvaData').onclick = function() {
                    salvaDataPerTutti();
                };
                // Redirect verso la pagina index.html
                document.getElementById('indietro').onclick = function() {
                    window.location = '../index.html';
                };
                // Invia l'email ad ogni candidato che non l'ha ancora ricevuta
                document.getElementById('spedisci').onclick = function() {
                   invioMail();
                };
            </script>
    </body>
</html>