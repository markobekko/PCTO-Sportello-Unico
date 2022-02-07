<!DOCTYPE html>
<html>
    <head>
        <title>Riepilogo iscrizioni</title>
        <link rel = “stylesheet” type = “text/css” href = “stylesheet.css” />
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
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
            <script>
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
            </script>
            <script>
                var table = $("#tabella");
                document.getElementById('aggiorna').onclick = function() {
                    table.load("ricezioneDati.php");
                };
                document.getElementById('esciSenzaSalvare').onclick = function() {
                    table.load("ricezioneDati.php");
                };
                document.getElementById('esciSalva').onclick = function() {
                    $('#tabella tr').each(function(index) {
                        if(index != 0){
                            var id_utente; // Fai in modo che da php prendo l'id utente (facendo una funzione esterna o qualcosa del genere)
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
                            console.log(codice_fiscale);
                            console.log(data_esame);
                            console.log(spedito_utente);
                            console.log(esito_esame);
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
            </script>
            <script>
                function cancellaRiga(bottone) {
                    var row = bottone.parentNode.parentNode;
                    $('#tabella tbody tr').each(function(index) {
                        if(index === (row.rowIndex - 1)){
                            var codice_fiscale = $(this).find("#codice_fiscale").val().trim();
                            console.log(codice_fiscale);
                            if (codice_fiscale != null) {
                                $.ajax({
                                    type:"POST",
                                    url: "cancellaRiga.php",
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
            </script>
          </div>
    </body>
</html>