<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
	if(isset($_POST['data_esame']) && isset($_POST['sede_esame'])){
        // Aggiunta dell'esame
        $aggiunta = $pdo -> prepare("INSERT INTO Sessione_Esame (data_esame,sede_esame) VALUES (?,?)");
        $aggiunta -> bindValue(1, $_POST['data_esame']);
        $aggiunta -> bindValue(2, $_POST['sede_esame']);
        $aggiunta -> execute();
        echo("<script>successoInserimento();</script>");
	}
?>