<?php
    $conn = mysqli_connect("localhost","root","","Sportello Unico");
    $candidato = "SELECT id_candidato, cognome ,nome, codice_fiscale, email, data_esame, sede_esame, spedito_utente, esito_esame, id_esame, archiviato  FROM Candidato, Sessione_Esame, Storico_Candidato
    WHERE Candidato.id_candidato = Storico_Candidato.id_storico_candidato AND Sessione_Esame.id_esame = Storico_Candidato.id_storico_esame";
    $risultatoCandidato = $conn -> query($candidato);
    
    if($risultatoCandidato -> num_rows > 0){
        $idEsame = 0;
        while($row=$risultatoCandidato -> fetch_assoc()){
            // Se il candidato non è stato archiviato allora lo aggiungerà alla tabella Riepilogo
            if($row["archiviato"] == "No"){
                // Se nel DB il flag per l'invio dell'email è impostato a 'Si' allora aggiunge al checkbox checked='true'
                if($row["spedito_utente"] == "Si"){
                    $valoreSpedizione = "<input data-label='spedizione invito' name='check_box' id='check_box' type='checkbox' id='spedito_utente' checked='true'>";
                }
                else{
                    $valoreSpedizione = "<input data-label='spedizione invito' name='check_box' id='check_box' type='checkbox' id='spedito_utente'>";
                }
                $risultatoEsame = $conn -> query("SELECT id_esame, data_esame, sede_esame FROM Sessione_Esame");
                echo "<tr>";
                    echo "<td>". "<input scope='row' data-label='cognome' name='cognome' id='cognome' type='text' value='". $row["cognome"] ."'>"."</td>";
                    echo "<td>". "<input data-label='nome' name='nome' id='nome' type='text' value='". $row["nome"] ."'>" ."</td>";
                    echo "<td>". "<input data-label='codice fiscale' name='codice_fiscale' id='codice_fiscale' type='text' readonly='readonly' value='". $row["codice_fiscale"] ."'>" ."</td>";
                    echo "<td>". "<input data-label='email' name='email' id='email' type='email' value='". $row["email"] ."'>" ."</td>";
                    echo "<td>". "<input data-label='data esame' name='esame' id='esame". $idEsame++ . "'" ."type='text' value='". $row["data_esame"] . " - " . $row["sede_esame"] ."' disabled>" ."</td>";
                    echo "<td>". $valoreSpedizione ."</td>";
                    echo "<td>";
                            echo "<select data-label='esito esame' name='esito' id='esito'>";
                            echo "<option hidden selected value> ". $row["esito_esame"] ." </option>";
                            echo "<option value='Superato'>Superato</option>";
                            echo "<option value='Non Superato'>Non Superato</option>";
                            echo "<option value='Assente Giustificato'>Assente Giustificato</option>";
                            echo "<option value='Assente non Giustificato'>Assente non Giustificato</option>";
                            echo "<option value='Non Ammesso'>Non Ammesso</option>";
                            echo "</select>";
                    echo "</td>";
                    echo "<td><input type='button' value='Elimina' onclick='cancellaPersona(this)'/></td>";
                echo "</tr>";
            }
        }
    }else{
        echo "Nessun Risultato";
    }
    $conn -> close();
?>