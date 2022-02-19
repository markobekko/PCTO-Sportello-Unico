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
function controllaCF(CF){
    var cf = CF.toUpperCase();
    var cfReg = /^(?:[A-Z][AEIOU][AEIOUX]|[AEIOU]X{2}|[B-DF-HJ-NP-TV-Z]{2}[A-Z]){2}(?:[\dLMNP-V]{2}(?:[A-EHLMPR-T](?:[04LQ][1-9MNP-V]|[15MR][\dLMNP-V]|[26NS][0-8LMNP-U])|[DHPS][37PT][0L]|[ACELMRT][37PT][01LM]|[AC-EHLMPR-T][26NS][9V])|(?:[02468LNQSU][048LQU]|[13579MPRTV][26NS])B[26NS][9V])(?:[A-MZ][1-9MNP-V][\dLMNP-V]{2}|[A-M][0L](?:[1-9MNP-V][\dLMNP-V]|[0L][1-9MNP-V]))[A-Z]$/i
    if (!cfReg.test(cf)){
        return false;
    }
    return true;
}
function confermaCancellazione(){
    bootbox.dialog({
        title: 'Attenzione',
        message: "<p>Sei sicuro di voler cancellare il nominativo? Questa azione è irreversibile.</p>",
        size: 'medium',
        buttons: {
            cancel: {
                label: "No",
                className: 'btn-danger',
                callback: function(){
                    console.log('Custom cancel clicked');
                }
            },
            ok: {
                label: "Si",
                className: 'btn-success',
                callback: function(){
                    console.log('Custom OK clicked');
                    $codice_fiscale_esistente = document.getElementById("codice_fiscale_esistente").value;
                    $.ajax({
                        type:"POST",
                        url: "cancellazioneCandidato.php",
                        data:"codice_fiscale_esistente="+ codice_fiscale_esistente.value,
                        success: function(){
                            console.log(codice_fiscale_esistente.value);
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
function successoInserimento(){
    document.getElementById("successoInserimento").style.display = "block";
    setTimeout(
        function() {
            document.getElementById("successoInserimento").style.display = "none";
        },2500,
    );
}
function successoCancellazione(){
    document.getElementById("successoCancellazione").style.display = "block";
    setTimeout(
        function() {
            document.getElementById("successoCancellazione").style.display = "none";
        },2500,
    );
}
function erroreCancellazione(){
    document.getElementById("erroreCancellazione").style.display = "block";
    setTimeout(
        function() {
            document.getElementById("erroreCancellazione").style.display = "none";
        },2500,
    );
}
document.getElementById('indietro').onclick = function() {
    window.location = "../index.html";
};