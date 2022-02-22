// Mostra i form per l'iscrizione della persona, nascondendo quelli precedenti
function mostraIscrizionePersona(){
    document.getElementById("aggiuntaNominativo").style.display = "none";
    document.getElementById("codice_fiscale_esistente").style.display = "none";
    document.getElementById("codice_fiscale_esistente_label").style.display = "none";
    document.getElementById("cancellazioneNominativo").style.display = "none";

    document.getElementById("cognome").style.display = "block";
    document.getElementById("nome").style.display = "block";
    document.getElementById("email").style.display = "block";
    document.getElementById("codice_fiscale").style.display = "block";
    document.getElementById("registrazioneNominativo").style.display = "block";

    document.getElementById("cognome_label").style.display = "block";
    document.getElementById("nome_label").style.display = "block";
    document.getElementById("email_label").style.display = "block";
    document.getElementById("codice_fiscale_label").style.display = "block";
    document.getElementById("registrazioneNominativo_label").style.display = "block";
}
// Nasconde i form per l'iscrizione della persona, mostrando quelli precedenti
function nascondiIscrizionePersona(){
    document.getElementById("aggiuntaNominativo").style.display = "block";
    document.getElementById("codice_fiscale_esistente").style.display = "block";
    document.getElementById("codice_fiscale_esistente_label").style.display = "block";
    document.getElementById("cancellazioneNominativo").style.display = "block";

    document.getElementById("cognome").style.display = "none";
    document.getElementById("nome").style.display = "none";
    document.getElementById("email").style.display = "none";
    document.getElementById("codice_fiscale").style.display = "none";
    document.getElementById("registrazioneNominativo").style.display = "none";

    document.getElementById("cognome_label").style.display = "none";
    document.getElementById("nome_label").style.display = "none";
    document.getElementById("email_label").style.display = "none";
    document.getElementById("codice_fiscale_label").style.display = "none";
    document.getElementById("registrazioneNominativo_label").style.display = "none";
}
// Controllo del codice fiscale
// @return false Se il codice fiscale non è valido
// @return true Se il codice fiscale è valido
function controllaCF(CF){
    var cf = CF.toUpperCase();
    var cfReg = /^(?:[A-Z][AEIOU][AEIOUX]|[AEIOU]X{2}|[B-DF-HJ-NP-TV-Z]{2}[A-Z]){2}(?:[\dLMNP-V]{2}(?:[A-EHLMPR-T](?:[04LQ][1-9MNP-V]|[15MR][\dLMNP-V]|[26NS][0-8LMNP-U])|[DHPS][37PT][0L]|[ACELMRT][37PT][01LM]|[AC-EHLMPR-T][26NS][9V])|(?:[02468LNQSU][048LQU]|[13579MPRTV][26NS])B[26NS][9V])(?:[A-MZ][1-9MNP-V][\dLMNP-V]{2}|[A-M][0L](?:[1-9MNP-V][\dLMNP-V]|[0L][1-9MNP-V]))[A-Z]$/i
    if (!cfReg.test(cf)){
        return false;
    }
    return true;
}
// Form per la richiesta di conferma per l'eliminazione del candidato
function confermaCancellazione(){
    bootbox.dialog({
        title: 'Attenzione',
        message: "<p>Sei sicuro di voler cancellare il nominativo? Questa azione è irreversibile.</p>",
        size: 'medium',
        buttons: {
            cancel: {
                label: "No",
                className: 'btn-danger'
            },
            ok: {
                label: "Si",
                className: 'btn-success',
                callback: function(){
                    $codice_fiscale_esistente = document.getElementById("codice_fiscale_esistente").value;
                    $.ajax({
                        type:"POST",
                        url: "cancellazioneCandidato.php",
                        data:"codice_fiscale_esistente="+ codice_fiscale_esistente.value,
                        success: function(){
                            // Se il codice fiscale è valido allora dà messaggio di successo
                            if(controllaCF(codice_fiscale_esistente.value)){
                                successoCancellazione();
                            }
                            else{
                                erroreCancellazione();
                            }
                        },
                    });
                }
            }
        }
    });
}
// Mostra la conferma del successo, che poi scompare dopo 2500ms
function successoInserimento(){
    document.getElementById("successoInserimento").style.display = "block";
    setTimeout(
        function() {
            document.getElementById("successoInserimento").style.display = "none";
        },2500,
    );
}
// Mostra la conferma del successo, che poi scompare dopo 2500ms
function successoCancellazione(){
    document.getElementById("successoCancellazione").style.display = "block";
    setTimeout(
        function() {
            document.getElementById("successoCancellazione").style.display = "none";
        },2500,
    );
}
// Mostra l'errore, che poi scompare dopo 2500ms
function erroreCancellazione(){
    document.getElementById("erroreCancellazione").style.display = "block";
    setTimeout(
        function() {
            document.getElementById("erroreCancellazione").style.display = "none";
        },2500,
    );
}
// Mostra l'errore, che poi scompare dopo 2500ms
function erroreData(){
    document.getElementById("erroreData").style.display = "block";
    setTimeout(
        function() {
            document.getElementById("erroreData").style.display = "none";
        },2500,
    );
}
// Redirect verso la pagina index.html
document.getElementById('indietro').onclick = function() {
    window.location = "../index.html";
};