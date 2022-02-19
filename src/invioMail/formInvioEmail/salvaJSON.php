<?php
    //prento il file json di configurazione
    $string=file_get_contents("../resources/configEmail.json");
    $string1=file_get_contents("../resources/fasciaOraria.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true);
    $dati1=json_decode($string1,true);

    //salvo i parametri su una viariabile
    $smtp=$_POST['smtp'];
    $utente=$_POST['utente'];
    $mittente=$_POST['mittente'];
    $password=$_POST['password'];
    $fasciaO=$_POST['fascia'];
    $dati['smtp']=$smtp;
    $dati['utente']=$utente;
    $dati['mittente']=$mittente;
    $dati['password']=$password;
    $dati1['ora']=$fasciaO;
    

    //codifico l'oggetto in json
    $json_object = json_encode($dati);
    $json_object1=json_encode($dati1);

    //salvo il json
    file_put_contents('../resources/configEmail.json', $json_object);
    file_put_contents('../resources/fasciaOraria.json', $json_object1);

    //reindirizo alla pagina principale
    header("Location:parametriMail.php");
?>