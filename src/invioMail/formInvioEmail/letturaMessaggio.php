<?php
    //prento il file json di configurazione
    $string=file_get_contents("../resources/message.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true);


    echo "<script type='text/javascript'> document.getElementById('oggetto').innerHTML='".$dati['oggetto']."'</script>";
    echo "<br><br><br><br><br><br>";
    foreach($dati as $key => $value){
        if($key!='oggetto'){
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
  
           
           
    


       


    ?>