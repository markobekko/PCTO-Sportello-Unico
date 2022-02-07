function cercaParole(){
    $(document).ready(function(){
        var notFoundCount = -6;
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
function aggiornaTabella(){
    table.load("ricezioneDati.php");
}
function esciSenzaSalvare(){
    table.load("ricezioneDati.php");
}
function esciSalvando(){
    $('#tabella tr').each(function(index) {
        if(index != 0){
            var cognome = $(this).find("#cognome").val().trim();
            var nome = $(this).find("#nome").val().trim();
            var codice_fiscale = $(this).find("#codice_fiscale").val().trim();
            var email = $(this).find("#email").val().trim();
            var data_esame = $(this).find("#esame option:selected").text().trim();
            const esame = data_esame.split(" - ");
            if($(this).find('#check_box').is(':checked'))
                var spedito_utente = true;
            else
                var spedito_utente = false;
            var esito_esame = $(this).find('#esito option:selected').text().trim();
            if (codice_fiscale != null && data_esame != null && spedito_utente != null && esito_esame != null) {
                $.ajax({
                    type:"POST",
                    url: "aggiornaTabella.php",
                    data: "cognome=" + cognome + "\u0026nome=" + nome + "\u0026codice_fiscale="+ codice_fiscale + "\u0026email="+ email + "\u0026spedito_utente=" + spedito_utente + "\u0026esito_esame=" + esito_esame + "\u0026data_esame=" + esame[0] + "\u0026sede_esame=" + esame[1],
                    success: function(){
                        console.log("Successo");
                    }
                });
            }
        }
    });
}
function archiviaPersona(){
    $('#tabella tr').each(function(index) {
        if(index != 0){
            var codice_fiscale = $(this).find("#codice_fiscale").val().trim();
            var esito_esame = $(this).find('#esito option:selected').text().trim();
            if (codice_fiscale != null && esito_esame != null) {
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
function cancellaPersona(bottone) {
    var row = bottone.parentNode.parentNode;
    $('#tabella tbody tr').each(function(index) {
        if(index === (row.rowIndex - 1)){
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
    row.parentNode.removeChild(row);
}