<?php
    //prento il file json di configurazione
    $string=file_get_contents("../resources/configEmail.json");
    $string1=file_get_contents("../resources/fasciaOraria.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true);
    $dati1=json_decode($string1,true);

    //salvo i dati su delle variabili
    $smtp=$dati['smtp'];
    $utente=$dati['utente'];
    $mittente=$dati['mittente'];
    $password=$dati['password'];
    $ora=$dati1['ora'];
   

    //uso js per settare i campi con i valori letti dal json
    echo "<script type='text/javascript'> document.getElementById('smtp').innerHTML ='".$smtp."'</script>";
    echo "<script type='text/javascript'> document.getElementById('utente').innerHTML ='".$utente."'</script>";
    echo "<script type='text/javascript'> document.getElementById('mittente').innerHTML ='".$mittente."'</script>";
    echo "<script type='text/javascript'> document.getElementById('password').value ='".$password."'</script>";
    echo "<script type='text/javascript'> document.getElementById('fascia').value ='".$ora."'</script>";
   
    



?>