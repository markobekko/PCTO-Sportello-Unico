<?php

require('conn.php');
include('updateInviato.php');


use PHPMailer\PHPMailer\PHPMailer;
require_once "../PHPMailer/PHPMailer.php";
require_once "../PHPMailer/SMTP.php";
require_once "../PHPMailer/Exception.php";
      
        


    $query = "SELECT nome,cognome,email,codice_fiscale FROM candidato ";
    $q = $pdo->query($query);
    $rows=$q->fetchAll(PDO::FETCH_ASSOC);
    //prento il file json di configurazione
    $string=file_get_contents("../resources/configEmail.json");

    //decodifico il json di configurazione in un oggetto
    $dati= json_decode($string,true); 

    //salvo i dati su delle variabili
    $smtp=$dati['smtp'];
    $utente=$dati['utente'];
    $myEmail=$dati['mittente'];
    $myPassword=$dati['password'];

foreach($rows as $row){
    
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

        //leggo la data dell'esame
        $p= $pdo->prepare("SELECT sede_esame,data_esame FROM sessione_esame,storico_candidato
        WHERE id_storico_candidato = (SELECT id_candidato FROM candidato WHERE codice_fiscale = ?) 
         AND id_storico_esame = id_esame AND archiviato='No'");
         $p->bindValue(1,$row['codice_fiscale']);
        $p->execute();
        $cf=$p->fetch();
        $dataF=$cf[1];
        //cambio il formato del giorno
        $dataG=date("d-m-Y",strtotime($dataF));

        //intestazione email
        $subject="Convocazione TEST LINGUA ITALIANA per il rilascio PDS lungo periodo CE";
        //corpo del messaggio
        $body = "
        <html>
            <body>
                <h1> Informazioni per il conseguimento dell'esame di italiano</h1>";
        $body .="<h3> Buongiorno ".$row['nome']." ".$row['cognome']."</h3>";
        $body .="<p>Si comunica che il giorno ".$dataG." </p>";
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
         $mail->Subject = ("$subject");//intestazione della mail
        $mail->Body = $body;//corpo della mail
        //se la mail viene spedita uscirà con esito positivo
       
        $a = $mail->send();
        updateCheck($row['codice_fiscale']);
        if ($a == true) {
            echo "<script>console.log(".$row['email'].", Inviata);</script>";
            //header("location:../../TabellaMaster/master.php");
            
        } else {
            
           
            echo "<script> alert($mail->ErrorInfo)<script>";
            //header("location:../formInvioEmail/index.php");
        }


    }


?>

