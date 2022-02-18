<?php
    $conn = mysqli_connect("localhost","root","","Sportello Unico");
    $candidato = "SELECT id_candidato, cognome ,nome, codice_fiscale, email, data_esame, sede_esame, spedito_utente, esito_esame, id_esame, archiviato  FROM Candidato, Sessione_Esame, Storico_Candidato
    WHERE Candidato.id_candidato = Storico_Candidato.id_storico_candidato AND Sessione_Esame.id_esame = Storico_Candidato.id_storico_esame";
    $risultatoCandidato = $conn -> query($candidato);
    
    if($risultatoCandidato -> num_rows > 0){
        $idEsame = 0;
        while($row=$risultatoCandidato -> fetch_assoc()){
            if($row["archiviato"] == "Si"){
                $risultatoEsame = $conn -> query("SELECT id_esame, data_esame, sede_esame FROM Sessione_Esame");
                echo "<tr>";
                echo "<td>". "<input name='cognome' id='cognome' type='text' value='". $row["cognome"] ."' readonly='readonly'>"."</td>";
                echo "<td>". "<input name='nome' id='nome' type='text' value='". $row["nome"] ."' readonly='readonly'>" ."</td>";
                echo "<td>". "<input name='codice_fiscale' id='codice_fiscale' type='text' readonly='readonly' value='". $row["codice_fiscale"] ."' readonly='readonly'>" ."</td>";
                echo "<td>". "<input name='email' id='email' type='email' value='". $row["email"] ."' readonly='readonly'>" ."</td>";
                echo "<td>". "<input name='esame' id='esame". $idEsame++ . "'" ."type='text' value='". $row["data_esame"] . " - " . $row["sede_esame"] ."' disabled>" ."</td>";
                echo "<td>";
                        echo "<select name='esito' id='esito' disabled>";
                        echo "<option hidden selected value> ".  $row["esito_esame"] ." </option>";
                        echo "</select>";
                echo "</td>";
                echo "</tr>";
            }
        }
    }else{
        echo "Nessun Risultato";
    }
    $conn -> close();
?>