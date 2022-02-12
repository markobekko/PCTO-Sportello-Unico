<?php
session_start();
require('conn.php');
    use PHPMailer\PHPMailer\PHPMailer;


        $name = $_POST['name'];//nome del mittente che viene visualizzato come intestazione della mail
        //$email = $_POST['email'];//mail del destinatario
        

        $query = "SELECT nome,cognome,email,data_esame FROM candidato ";
        $q = $pdo->query($query);
        $rows=$q->fetchAll(PDO::FETCH_ASSOC);
        foreach($rows as $row){
        $data= new DateTime($row['data_esame']);

        
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
     
        
        $myEmail="dalpontandrea03@gmail.com";//mail del mittente
        $myPassword="";//password dell'account del mittente
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
        //creo l'oggetto PHPMailer
        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        //server smpt
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = $myEmail;//nome del dominio della propria mail
        $mail->Password = $myPassword; //inserisci la password del proprio account
        $mail->Port = 587;//porta per il server smtp 25(in chiaro non sicura) 465(basato su ssl) 587(basato su tls)
        $mail->SMTPSecure = "tls";//telnet(porta 25), ssl(porta 465), tls(porta 587)

        //Impostazioni mail da inviare
         // specifico i gradi di priorità
        $mail->Priority=1;//1=alta 2=media 3=bassa
        //specifica la priorità della mail  Urgent(urgente) Highest(Molto alta) High(alta)
        $mail->addCustomHeader("X-MSMail-Priority:Urgeny");
        $mail->addCustomHeader("Importance:Urgent");
       //email in formato html
        $mail->isHTML(true);
        $mail->setFrom($myEmail, $name);//nome e mail del mittente
        //$mail->addAddress($row['email']); //email destinatario 
        $mail->addAddress("massimodalpont8@gmail.com");
        $mail->Subject = ("$subject");//intestazione della mail
        $mail->Body = $body;//corpo della mail
        //se la mail viene spedita uscirà con esito positivo
        
        
        if ($mail->send()) {
            $_SESSION['status'] = "Inviata";
            header("location:index.php");
            
        } else {
            
            $_SESSION['status'] = $mail->ErrorInfo;
            header("location:index.php");
        }


    }

?>
