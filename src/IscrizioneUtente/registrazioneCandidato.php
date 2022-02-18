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
        <div class="container">
            <div class="titolo">Registrazione</div>
            <button type="button" id="indietro">Indietro</button>
            <form action="">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail">Cognome:</span> <!-- nome davanti alla label -->
                        <input type="text" id="cognome" name="cognome" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Nome:</span> <!-- nome davanti alla label -->
                        <input type="text" id="nome" name="nome" required>  
                    </div>
                    <div class="input-box">
                        <span class="detail">Indirizzo email:</span> <!-- nome davanti alla label -->
                        <input type="email" id="email" name="email" required>  
                    </div>
                    <div class="input-box">
                        <span class="detail">Codice Fiscale:</span> <!-- nome davanti alla label -->
                        <input type="text" id="codice_fiscale" name="codice_fiscale" required> 
                    </div>
                </div>
                <div class="button">
                    <br><br><input type="submit" id="registrazioneNominativo" name="registrazioneNominativo" formmethod="POST" value="Registra nominativo">
                </div>
            </form>
            <!-- Aggiunta Nominativo già esistente Ed Eliminazione Nominativo -->
            <br>
            <form action="">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail">Codice Fiscale:</span>
                        <input type="text" id="codice_fiscale_esistente" name="codice_fiscale_esistente" required> 
                    </div>
                </div>
                <div id="successoInserimento" style="display:none" class="alert alert-success">
                    <strong>Successo!</strong> Il candidato è stato inserito.
                </div>
                <div class="button">
                    <br><br><input type="submit" id="aggiuntaNominativo" name="aggiuntaNominativo" formmethod="POST" value="Aggiungi Nominativo Esistente">
                </div>
            </form>
            <div class="button">
                <br><input type="submit" href="#confermaEliminazione" class="trigger-btn" data-toggle="modal" value="Elimina nominativo">
            </div>
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
        <!-- Conferma Eliminazione -->
        <div id="confermaEliminazione" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">			
                        <h4 class="modal-title">Attenzione</h4>	
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>L'eliminazione di un candidato è un'azione irreversibile.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-info" data-dismiss="modal">Cancella</a>
                        <a formaction="#" formmethod="POST" data-dismiss="modal" id="cancellazioneNominativo" name="cancellazioneNominativo" class="btn btn-danger">Conferma</a>
                    </div>
                </div>
            </div>
        </div>     

        <script>
            document.getElementById('indietro').onclick = function() {
                window.location = "../index.html";
            };
            var T = document.getElementById("successoInserimento");
            function successo(){
                T.style.display = "block";
            }
            setTimeout(
                function() {
                    T.style.display = "none";
                }
            ,2500);
        </script>
        <input id="freccia" onclick='window.location = "../index.html";'type="image" src="../img/freccia.png" width="40px" style="margin-left: -30%; position:absolute">
    </body>
</html>
<?php include "inserimentoCandidato.php"; ?>