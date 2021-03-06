<?php

function letturaBody(){


    //prento il file json di configurazione
    $string=file_get_contents("../resources/messageBL.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true);


    echo "<script type='text/javascript'> document.getElementById('oggetto').innerHTML='".$dati['oggetto']."'</script>";
   

    foreach($dati as $key => $value){
        if($key!='oggetto' && $key!='intestazione'){
            if(is_array($value)){
                foreach($value as $key => $value2){
                    echo "<script type='text/javascript'> document.getElementById('corpo').innerHTML+='".$value2."';</script>";
                    echo "<script type='text/javascript'> document.getElementById('corpo').innerHTML+= '&#13;&#10;';</script>";
                    
                }
            }else{
                    echo "<script type='text/javascript'> document.getElementById('corpo').innerHTML+='".$value."';</script>";
                    echo "<script type='text/javascript'> document.getElementById('corpo').innerHTML+= '&#13;&#10;';</script>";
                
                }
        }
    }
}

//funzione per la lettura del file json e l'invio con i relativi nomi e data
function invioBody($nome,$data,$sede){
    $string=null;

    //prento il file json di configurazione
    if($sede=='Belluno'){
        $string=file_get_contents("../resources/messageBL.json");
    }else if($sede=='Feltre'){
        $string=file_get_contents("../resources/messageFL.json");
    }
    $string1=file_get_contents("../resources/fasciaOraria.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true);
    $dati1=json_decode($string1,true);
    //inzio a costruire il body del messaggio
    $body="<!DOCTYPE html>";
    $body.="<html>";
    $body.="<body>";
 
    $body.="<h1>".$dati['intestazione']."</h1>";
    

   

    foreach($dati as $key => $value){

        //salto l'oggetto e l'intestazione perchè già letti in mail.php
        if($key!='oggetto' && $key!='intestazione'){
            //primo corpo per il buongiorno con il relativo nome e cognome\
            if($key=='corpo1'){
                 $body.="<p>".$value." <b>".$nome."</b></p>"; 
                //secondo corpo per la data dell'esame
                }else if($key=='corpo2'){
                    $strR=$data;
                    $strR=str_replace("-","/",$strR);
                   // $body.="<p>".$value." <b>".$strR."</b></p>";
                    $body.="<p>".$value." <b>".$strR."</b>"." nella fascia oraria: <b>".$dati1['ora']."</b></p>";
                    //$body.="<p>".$value."<b>".$data."</b></p>"; 
                }else{
                      if(is_array($value)){//qui c'è una lista puntata
                        $body.="<ul>";
                        foreach($value as $key => $value2){
                            $body.="<li><b>".$value2."</b></li>";                
                        }
                        $body.="</ul>";  
                    
                    }else {
                        $body.="<p>".$value."</p>";
                            }
                     }
        }
    }  
    $body.="</body></html>";
    return $body;
} 
?>