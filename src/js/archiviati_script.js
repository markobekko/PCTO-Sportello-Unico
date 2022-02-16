// Funzione di ricerca della parole per ogni valore degli <input> nella tabella
function cercaParole(){
    $(document).ready(function(){
        // Numero delle colonne da cercare
        var notFoundCount = -5;
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
    table.load("ricezioneArchiviati.php");
}
// Imposta il numero dei candidati che svolgono l'esame nella sede a Belluno/Feltre
function aggiornaSedi(){
    var intervalId = window.setInterval(function(){
        // Inizializza a zero i due valori
        document.getElementById("numBelluno").value = 0;
        document.getElementById("numFeltre").value = 0;
        var i = 0;
        $('table tbody tr').each(function(index) {
            var esame = $('#tabella').find("#esame" + i++).val().split(" - ");
            if(esame[1] == "Belluno" && $('#tabella').is(':visible'))
                document.getElementById("numBelluno").stepUp(1);
            else if(esame[1] == "Feltre" && $('#tabella').is(':visible'))
                document.getElementById("numFeltre").stepUp(1);
        });
    }, 500);
}