<?php
    function connessione($host,$dbname,$username,$password){
        try{
            $pdo = new PDO('mysql:host='. $host .'; dbname='.$dbname.';', $username, $password);
        }catch(PDOException $e){
            echo 'Connessione al database fallita';
            exit();
        }
        return $pdo;
    }
?>