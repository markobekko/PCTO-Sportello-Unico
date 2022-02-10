// Funzione di ricerca della parole per ogni valore degli <input> nella tabella
function cercaParole(){
    $(document).ready(function(){
        // Numero delle colonne da cercare
        var notFoundCount = -4;
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
function aggiornaSedi(){
    var intervalId = window.setInterval(function(){
        document.getElementById("numBelluno").value = 0;
        document.getElementById("numFeltre").value = 0;
        $('#tabella tr').each(function(index) {
            if(index != 0){
                var data_esame = $(this).find("#esame option:selected").text().trim();
                const esame = data_esame.split(" - ");
                if(esame[1] == "Belluno"){
                    document.getElementById("numBelluno").stepUp(1);
                }
                else{
                    document.getElementById("numFeltre").stepUp(1);
                }
            }
        });
    }, 500);
}