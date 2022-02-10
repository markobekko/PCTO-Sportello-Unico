<?php
    $conn = mysqli_connect("localhost","root","","Sportello Unico");
    $candidato = "SELECT id_candidato, cognome ,nome, codice_fiscale, email, data_esame, sede_esame, spedito_utente, esito_esame, id_esame  FROM Candidato, Sessione_Esame, Storico_Candidato
    WHERE Candidato.id_candidato = Storico_Candidato.id_storico_candidato AND Sessione_Esame.id_esame = Storico_Candidato.id_storico_esame";
    $risultatoCandidato = $conn -> query($candidato);
    
    if($risultatoCandidato -> num_rows > 0){
        echo "
        <div class=\"\" id=\"table\">
            <table class=\"sortable\" id=\"tabella\">
                <thead>
                    <tr>
                        <th>Cognome</th>
                        <th>Nome</th>
                        <th>Codice fiscale</th>
                        <th>Mail</th>
                        <th>Data e Sede</th>
                        <th>Invito Spedito</th>
                        <th>Esito Esame</th>
                    </tr>
                </thead>
                <tbody>
        ";
        while($row=$risultatoCandidato -> fetch_assoc()){
            
            if($row["spedito_utente"] == "Si"){
                $valoreSpedizione = "<input name=\"check_box\" id=\"check_box\" type=\"checkbox\" id=\"spedito_utente\" checked=\"true\">";
            }
            else{
                $valoreSpedizione = "<input name=\"check_box\" id=\"check_box\" type=\"checkbox\" id=\"spedito_utente\">";
            }
            echo "<tr>";
                echo "<td>". "<input name=\"cognome\" id=\"cognome\" type=\"text\" value=\"".$row["cognome"]."\">"."</td>";
                echo "<td>". "<input name=\"nome\" id=\"nome\" type=\"text\" value=\"".$row["nome"]."\">" ."</td>";
                echo "<td>". "<input name=\"codice_fiscale\" id=\"codice_fiscale\" type=\"text\" readonly=\"readonly\" value=\"".$row["codice_fiscale"]."\">" ."</td>";
                echo "<td>". "<input name=\"email\" id=\"email\" type=\"email\" value=\"".$row["email"]."\">" ."</td>";
                echo "<td>";
                    echo "<select name=\"esame\" id=\"esame\">";

                    $connEsame = mysqli_connect("localhost","root","","Sportello Unico");
                    $risultatoEsame = $connEsame -> query("SELECT id_esame, data_esame, sede_esame FROM Sessione_Esame");

                    unset($id_esame, $data_esame, $sede_esame);
                    $id_esame = $row['id_esame'];
                    $data_esame = $row['data_esame']; 
                    $sede_esame = $row['sede_esame'];
                    echo '<option hidden value="'.$id_esame.'">'.$data_esame." - ".$sede_esame.'</option>';

                    while ($row2 = $risultatoEsame->fetch_assoc()){
                        unset($id_esame, $data_esame, $sede_esame);
                        $id_esame = $row2['id_esame'];
                        $data_esame = $row2['data_esame']; 
                        $sede_esame = $row2['sede_esame'];
                        echo '<option value="'.$id_esame.'">'.$data_esame." - ".$sede_esame.'</option>';
                    }
                    echo "</select>";
                echo "</td>";
                echo "<td>". $valoreSpedizione ."</td>";
                echo "<td>";
                        echo "<select name=\"esito\" id=\"esito\">";
                        echo "<option hidden selected value> ".  $row["esito_esame"] ." </option>";
                        echo "<option value=\"Superato\">Superato</option>";
                        echo "<option value=\"Non Superato\">Non Superato</option>";
                        echo "<option value=\"Assente Giustificato\">Assente Giustificato</option>";
                        echo "<option value=\"Assente non Giustificato\">Assente non Giustificato</option>";
                        echo "<option value=\"Non Ammesso\">Non Ammesso</option>";
                        echo "</select>";
                echo "</td>";
                echo "<td><input type=\"button\" value=\"Delete\" onclick=\"cancellaPersona(this)\"/></td>";
            echo "</tr>";
        }
    }else{
        echo "Nessun Risultato";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    $conn -> close();
?>