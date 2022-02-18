<?php
    include '../connessione.php';
    $pdo = connessione("localhost","Sportello Unico","root","");
	if(isset($_POST['data_esame']) && isset($_POST['sede_esame'])){
        $data_esame = $_POST['data_esame'];
        $sede_esame =  $_POST['sede_esame'];

        // Aggiunta dell'esame
        $aggiunta = $pdo -> prepare("INSERT INTO Sessione_Esame (data_esame,sede_esame) VALUES (?,?)");
        $aggiunta -> bindValue(1, $data_esame);
        $aggiunta -> bindValue(2, $sede_esame);
        $aggiunta -> execute();
        echo("<script>successo();</script>");
	}
?>