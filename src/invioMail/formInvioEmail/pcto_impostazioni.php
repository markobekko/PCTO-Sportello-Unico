<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    
        <title>Impostazioni</title>
        <link rel="stylesheet" href="./pcto_impostazioni.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        

    <head>
        <title>Impostazioni</title>
    </head>
<body>
 
  <!-- reindirizzo al salvataggio dei parametri-->
  <form action="./salvaJSON.php" method="post">
    <table>
        <tr>
          <td>SMTP:</td>
          <td><textarea id="smtp" name="smtp" rows="1" cols="80" ></textarea></td>
        </tr>
        <tr>
            <td>Mittente:</td>
            <td><textarea id="mittente" name="mittente" rows="1" cols="80"></textarea></td>
          </tr>
        <tr>
          <td>Utente:</td>
          <td><textarea id="utente" name="utente" rows="1" cols="80"></textarea></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td>
            <p>
              <input type="password" name="password" id="password" size="97">
              <i class="bi bi-eye-slash" id="togglePassword"></i>
          </p>
          </td>
        </tr>
        <tr>
          <td>Fascia oraria</td>
          <td><textarea id="fascia" name="fascia" rows="1" cols="80" ></textarea></td>
       </tr>
      </table>
        <script>
        //blocco in javascript per insierire l'icona dell psw e premendola poterla vederla o non
          const togglePassword = document.querySelector("#togglePassword");
          const password = document.querySelector("#password");
      
          togglePassword.addEventListener("click", function () {
              // toggle the type attribute
              const type = password.getAttribute("type") === "password" ? "text" : "password";
              password.setAttribute("type", type);
              // toggle the icon
              this.classList.toggle("bi-eye");
          });

      </script> 
      <input type="submit" class="impostazioni button1" name="salva" id="salva" value="Salva">
    </form>
    <button class="button button1" name="ritornaB" id="ritornaB" onclick=ritornaP() >Ritorna ai parametri</button>
          <script type="text/javascript">
            function ritornaP(){
            window.location.href="./parametriMail.php";
            }
          </script>
</body>
</html>  

<?php
 require('./letturaJSON.php');

?>
