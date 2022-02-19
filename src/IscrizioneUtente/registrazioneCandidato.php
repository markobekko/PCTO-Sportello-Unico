<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iscrizione</title>
        <link rel="stylesheet" href="../css/iscrizione.css">
        <link rel="stylesheet" href="../css/popupErrore.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <script>
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
            document.getElementById('indietro').onclick = function() {
                window.location = "../index.html";
            };
            function successo(){
                document.getElementById("successoInserimento").style.display = "block";
            }
            setTimeout(
                function() {
                    document.getElementById("successoInserimento").style.display = "none";
                }
            ,2500);
        </script>
        <div class="container">
            <div class="titolo">Registrazione</div>
            <form action="">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail" id="codice_fiscale_esistente_label" name="codice_fiscale_esistente_label">Codice Fiscale:</span>
                        <input type="text" id="codice_fiscale_esistente" name="codice_fiscale_esistente" required> 
                    </div>
                </div>
                <div class="button">
                    <br><input type="submit" id="aggiuntaNominativo" name="aggiuntaNominativo" formmethod="POST" onclick="prendiCF();" value="Aggiungi Nominativo">
                </div><br>
                <div id="successoInserimento" style="display:none" class="alert alert-success">
                    <strong>Successo!</strong> Il candidato è stato inserito.
                </div>
                <div class="button">
                    <br><input type="submit" id="cancellazioneNominativo" name="cancellazioneNominativo" formmethod="POST" value="Elimina nominativo">
                </div>
            </form>
            <form action="">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail" style="display:none;" id="cognome_label" name="cognome_label">Cognome:</span> <!-- nome davanti alla label -->
                        <input type="text" style="display:none;" id="cognome" name="cognome" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail" style="display:none;" id="nome_label" name="nome_label">Nome:</span> <!-- nome davanti alla label -->
                        <input type="text" style="display:none;" id="nome" name="nome" required>
                    </div>
                    <div class="input-box">
                        <span class="detail" style="display:none;" id="email_label" name="email_label">Indirizzo email:</span> <!-- nome davanti alla label -->
                        <input type="email" style="display:none;" id="email" name="email" required>  
                    </div>
                    <div class="input-box">
                        <span class="detail" style="display:none;" id="codice_fiscale_label" name="codice_fiscale_label">Codice Fiscale:</span> <!-- nome davanti alla label -->
                        <input type="text" style="display:none;" id="codice_fiscale" name="codice_fiscale" required> 
                    </div>
                </div>
                <div class="button">
                    <br><br><input style="display:none;" type="submit" id="registrazioneNominativo" name="registrazioneNominativo" formmethod="POST" value="Registra nominativo">
                </div>
            </form>
            <!-- Aggiunta Nominativo già esistente Ed Eliminazione Nominativo -->
            <br>
        </div>
        
        <!-- Errore Codice Fiscale -->
        <div id="erroreCF" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Errore!</h4>	
                        <p>Il codice fiscale inserito non è valido</p>
                        <button class="btn btn-success" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Errore Email -->
        <div id="erroreMail" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Errore!</h4>	
                        <p>L'email inserita non è valida</p>
                        <button class="btn btn-success" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Errore CF Esistente -->
        <div id="erroreCFEsistente" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Errore!</h4>	
                        <p>Il Codice Fiscale inserito è già esistente</p>
                        <button class="btn btn-success" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Errore CF Esistente -->
        <div id="erroreCFNonEsistente" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Errore!</h4>	
                        <p>Il Codice Fiscale inserito non esiste</p>
                        <button class="btn btn-success" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <input id="freccia" onclick='window.location = "../index.html";'type="image" src="../img/freccia.png" width="40px" style="margin-top: -20%; position:absolute">
    </body>
</html>
<?php include "inserimentoCandidato.php"; ?>