<?php

require('conn.php');

use PHPMailer\PHPMailer\PHPMailer;
require_once "../PHPMailer/PHPMailer.php";
require_once "../PHPMailer/SMTP.php";
require_once "../PHPMailer/Exception.php";
      
        


$query = "SELECT nome,cognome,email,data_esame FROM candidato ";
$q = $pdo->query($query);
$rows=$q->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row){
    $data= new DateTime($row['data_esame']);
    
    
    $myEmail=$_POST['mittente'];//mail del mittente
    $myPassword=$_POST['password'];//password dell'account del mittente
    $smtp=$_POST['smtp'];//server smtp del proprio provider
    $utente=$_POST['utente'];//nome del mittente
    //creo l'oggetto PHPMailer
    $mail = new PHPMailer();
    
    //SMTP Settings
    $mail->isSMTP();
    //server smpt
    $mail->Host =$smtp;
    $mail->SMTPAuth = true;
    $mail->Username = $myEmail;//nome del dominio della propria mail
    $mail->Password = $myPassword; //inserisci la password del proprio account
    $mail->Port = 587;//porta per il server smtp 25(in chiaro non sicura) 465(basato su ssl) 587(basato su tls)
    $mail->SMTPSecure = "tls";//telnet(porta 25), ssl(porta 465), tls(porta 587)
        //intestazione email
        $subject="Convocazione TEST LINGUA ITALIANA per il rilascio PDS lungo periodo CE";
        //corpo del messaggio
        $body = "
        <html>
            <body>
                <h1> Informazioni per il conseguimento dell'esame di italiano</h1>";
        $body .="<h3> Buongiorno ".$row['nome']." ".$row['cognome']."</h3>";
        $body .="<p>Si comunica che il giorno"." ".$data->format('d/m/Y')." </p>";
        $body .="</body>";
        $body .="</html>";        
     
        

        //Impostazioni mail da inviare
         // specifico i gradi di priorità
        
         
        $mail->Priority=1;//1=alta 2=media 3=bassa
        //specifica la priorità della mail  Urgent(urgente) Highest(Molto alta) High(alta)
        // $mail->addCustomHeader("X-MSMail-Priority:Urgeny");
        // $mail->addCustomHeader("Importance:Urgent");
       //email in formato html
        $mail->isHTML(true);
        $mail->setFrom($myEmail, $utente);//nome e mail del mittente
        $mail->addAddress($row['email']); //email destinatario 
        //$mail->addAddress("dalpontandrea03@gmail.com"); //email destinatario 
        if(isset($_POST['destinatarioCC'])){

        }
        $mail->Subject = ("$subject");//intestazione della mail
        $mail->Body = $body;//corpo della mail
        //se la mail viene spedita uscirà con esito positivo
        
        
        if ($mail->send()) {
            $_SESSION['status'] = "Inviata";
            header("location:../formInvioEmail/index.php");
            
        } else {
            
            $_SESSION['status'] = $mail->ErrorInfo;
            echo "<script> alert($mail->ErrorInfo)<script>";
            //header("location:../formInvioEmail/index.php");
        }


    }


?>
