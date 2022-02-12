<?php

session_start();

if(!isset($_SESSION['status'])){
    $_SESSION['status']="";
}

   
?>
<!DOCTYPE html>
<html>
  
    <head>

    </head>
    <body>
        <form action="email.php" method="POST">
            <label for="name">Nome</label><br>
            <input type="text" name="name" id="name"><br>
            <label for="email">Email</label><br>
            <input type="text" name="email" id="email"><br>
            <label for="oggetto">Ogetto</label><br>
            <input type="text" name="subject" id="subject"><br>
            <label for="body">testo del messaggio</label><br>
            <input type="text" name="body" id="body"><br>
            <input type="submit" value="invia"><br>
            <?php
                if($_SESSION['status']==""){
                    exit();
                }else if($_SESSION['status']=="Inviata"){
                   echo "<script> alert('Esito della mail $_SESSION[status]')</script>";
                   $_SESSION['status']="";
                }else{
                    echo "<script> alert('Esito della mail $_SESSION[status]')</script>";
                    $_SESSION['status']="";

                }
                ?>
             
               
               

        </form>
    </body>
</html>