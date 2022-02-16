<?php

function letturaBody(){


    //prento il file json di configurazione
    $string=file_get_contents("../resources/message.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true);


    echo "<script type='text/javascript'> document.getElementById('oggetto').innerHTML='".$dati['oggetto']."'</script>";
    echo "<br><br><br><br><br><br>";
    $body="<html>";
    $body.="<body>";
    $body.="<h1>".$dati['intestazione']."</h1>";

    foreach($dati as $key => $value){
        if($key!='oggetto' && $key!='intestazione'){
        if(is_array($value)){
            foreach($value as $key => $value2){
                echo $value2;
                echo "<br>";
            }
            echo "<br>";
        }
        else{
            echo $value;
            echo "<br>";
        }
    }
}
echo "<script type='text/javascript'> document.getElementById('corpo').innerHTML='".$body."';</script>";
}
function invioBody($nome,$data){


    //prento il file json di configurazione
    $string=file_get_contents("../resources/message.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true);


    echo "<script type='text/javascript'> document.getElementById('oggetto').innerHTML='".$dati['oggetto']."'</script>";
    echo "<br><br><br><br><br><br>";
    $body="<html>";
    $body.="<body>";
    $body.="<h1>".$dati['intestazione']."</h1>";

    foreach($dati as $key => $value){
        if($key!='oggetto' && $key!='intestazione'){
            if($key=='corpo1'){
                $value+=" ".$nome;
            }
        if(is_array($value)){
            foreach($value as $key => $value2){
                echo $value2;
                echo "<br>";
            }
            echo "<br>";
        }else{
                echo $value;
                echo "<br>";
                }
        }
    }    
    return $body;
} 
           
           
    


       


    ?>