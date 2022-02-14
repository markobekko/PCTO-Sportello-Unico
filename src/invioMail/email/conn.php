<?php


try{
    $pdo= new PDO("mysql:host=127.0.0.1;dbname=sportello unico",'root','');
    $messaggio=$pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    echo "<script> alert('$messaggio')</script>";
    

}catch(PDOException $e){
    $messaggio=$e->getMessage();
    echo "<script> alert('Non Connesso $messaggio')</script>";
    exit();
}

   


?>