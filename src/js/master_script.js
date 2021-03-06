// Funzione di ricerca del candidato
function cercaCandidato(){
    $(document).ready(function(){
        // Numero delle colonne da cercare
        var notFoundCount = -7;
        $("#cerca").on("keyup", function() {
        var value = $(this).val().toLowerCase(),
            $tr =  $("#tabella tbody tr");
            $tr.each(function(){
                var found = 0;
                $(this).find("input").each(function(){
                    found += $(this).val().toLowerCase().indexOf(value)
                });
                if (found > notFoundCount){
                    $(this).closest('tr').show();
                }else{
                    $(this).closest('tr').hide();
                }
            });
        });
    });
}
// Aggiorna la tabella
function aggiornaTabella(){
    table.load('ricezioneDati.php');
}
// Salva i dati nella tabella nel DB
function salvaDati(){
    var i = 0;
    $('#tabella tr').each(function(index) {
        // index diverso da 0 ovvero escludendo il nome delle colonne (Cognome, Nome, Codice Fiscale ecc.)
        if(index != 0){
            // Prende il valore degli <input> e li salva nella variabile apposita
            var cognome = $(this).find("#cognome").val().trim();
            var nome = $(this).find("#nome").val().trim();
            var codice_fiscale = $(this).find("#codice_fiscale").val().trim();
            var email = $(this).find("#email").val().trim();
            var data_esame = $(this).find("#esame" + i++).val();
            if($(this).find('#check_box').is(':checked')){
                var spedito_utente = true;
            }
            else{
                var spedito_utente = false;
            }
            var esito_esame = $(this).find('#esito option:selected').text().trim();
            // Se la data dell'esame è nulla allora nella richiesta non verrà inclusa
            if(data_esame == " - "){
                $richiesta = "cognome=" + cognome + "\u0026nome=" + nome + "\u0026codice_fiscale="+ codice_fiscale + "\u0026email="+ email + "\u0026spedito_utente=" + spedito_utente + "\u0026esito_esame=" + esito_esame;
            }
            else{
                var esame = data_esame.split(" - ");
                $richiesta = "cognome=" + cognome + "\u0026nome=" + nome + "\u0026codice_fiscale="+ codice_fiscale + "\u0026email="+ email + "\u0026spedito_utente=" + spedito_utente + "\u0026esito_esame=" + esito_esame + "\u0026data_esame=" + esame[0] + "\u0026sede_esame=" + esame[1];
            }
            
            if (codice_fiscale != null && data_esame != null && spedito_utente != null && esito_esame != null) {
                // Invia una richiesta POST al file php passandogli come parametri le variabili
                $.ajax({
                    type:"POST",
                    url: "aggiornaTabella.php",
                    data: $richiesta,
                    success: function(){
                        console.log("Successo");
                    }
                });
            }
        }
    });
}
// Archivia la persona se ha un esito dell'esame
function archiviaPersona(){
    $('#tabella tr').each(function(index) {
        // index diverso da 0 ovvero escludendo il nome delle colonne (Cognome, Nome, Codice Fiscale ecc.)
        if(index != 0){
            // Prende il valore degli <input> e li salva nella variabile apposita
            var codice_fiscale = $(this).find("#codice_fiscale").val().trim();
            var esito_esame = $(this).find('#esito option:selected').text().trim();
            if (codice_fiscale != null && esito_esame != null) {
                // Invia una richiesta POST al file php passandogli come parametri le variabili
                $.ajax({
                    type:"POST",
                    url: "archiviaPersona.php",
                    data: "codice_fiscale="+ codice_fiscale + "\u0026esito_esame=" + esito_esame,
                    success: function(){
                        console.log("Successo");
                    }
                });
            }
        }
    });
}
// Cancella l'istanza della persona dalla tabella e dal DB
function cancellaPersona(bottone) {
    var row = bottone.parentNode.parentNode;
    $('#tabella tr').each(function(index) {
        // Se l'indice della riga è uguale all'indice del bottone premuto allora cancella la persona
        if(index === (row.rowIndex)){
            var codice_fiscale = $(this).find("#codice_fiscale").val().trim();
            console.log(codice_fiscale);
            if (codice_fiscale != null) {
                $.ajax({
                    type:"POST",
                    url: "cancellaPersona.php",
                    data:"codice_fiscale="+ codice_fiscale,
                    success: function(){
                        console.log("Successo");
                    }
                });
            }
        }
    });
    // Rimuove la persona dalla tabella
    row.parentNode.removeChild(row);
    aggiornaTabella();
}
// Imposta il numero dei candidati che svolgono l'esame nella sede a Belluno/Feltre
function aggiornaSedi(){
    var intervalId = window.setInterval(function(){
        // Inizializza a zero i due valori
        document.getElementById("numBelluno").value = 0;
        document.getElementById("numFeltre").value = 0;
        var i = 0;
        $('table tbody tr').each(function(index) {
            // La data e sede sono considerati un valore unico, perciò bisogna separarli eseguendo uno split
            var esame = $(this).find("#esame" + i++).val().split(" - ");
            // Se la sede è Belluno/Feltre ed è visibile nella tabella allora incrementa il valore di 1
            if(esame[1] == "Belluno" && $(this).is(':visible'))
                document.getElementById("numBelluno").stepUp(1);
            else if(esame[1] == "Feltre" && $(this).is(':visible'))
                document.getElementById("numFeltre").stepUp(1);
        });
    }, 500);
}
// Imposta la data dell'esame per ogni persona dopo aver premuto il pulsante "Salva Data"
function salvaDataPerTutti(){
    if(document.getElementById("esameData").value != "-1"){
        var i = 0;
        $('table tbody tr').each(function(index) {
            element = document.getElementById("esame" + i++);
            element.value = document.getElementById("esameData").value;
        });
    }
    salvaDati();
}