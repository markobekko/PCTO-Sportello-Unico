<?php
    //prento il file json di configurazione
    $string=file_get_contents("../resources/configEmail.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true);

    //salvo i parametri su una viariabile
    $smtp=$_POST['smtp'];
    $utente=$_POST['utente'];
    $mittente=$_POST['mittente'];
    $password=$_POST['password'];
    $dati['smtp']=$smtp;
    $dati['utente']=$utente;
    $dati['mittente']=$mittente;
    $dati['password']=$password;

    //codifico l'oggetto in json
    $json_object = json_encode($dati);

    //salvo il json
    file_put_contents('../resources/configEmail.json', $json_object);
    
    //reindirizo alla pagina principale
    header("Location:index.php");
?>