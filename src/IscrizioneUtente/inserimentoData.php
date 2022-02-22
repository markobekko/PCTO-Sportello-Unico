<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");

	if(isset($_POST['data_esame']) && isset($_POST['sede_esame'])){
        if(!controlloSeDataEsiste($pdo,$_POST['data_esame'])){
            // Aggiunta dell'esame
            $aggiunta = $pdo -> prepare("INSERT INTO Sessione_Esame (data_esame,sede_esame) VALUES (?,?)");
            $aggiunta -> bindValue(1, $_POST['data_esame']);
            $aggiunta -> bindValue(2, $_POST['sede_esame']);
            $aggiunta -> execute();
            echo("<script>successoInserimento();</script>");
        }
        else{
            echo("<script>erroreData();</script>");
        }
	}
    // Controllo se il la data dell'esame è già esistente
    // @return true se esiste
    // @return false se non esiste
    function controlloSeDataEsiste($pdo,$data_esame){
        $aggiunta = $pdo -> prepare("SELECT COUNT(*) FROM Sessione_Esame WHERE data_esame=?");
        $aggiunta -> bindValue(1, $data_esame);
        $aggiunta -> execute();
        if($aggiunta->fetchColumn(0) > 0){
            return true;
        }
        return false;
    }
?>