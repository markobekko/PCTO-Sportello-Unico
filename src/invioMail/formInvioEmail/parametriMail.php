<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Parametri mail</title>
    <link rel="stylesheet" href="../../css/parametriMail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../../js/parametri_script.js"></script>
  </head>

<body id="project">

  <script type="text/javascript">
    function impostazioni(){

      window.location.href="pcto_impostazioni.php";
      
    }
    function returnI(){
          window.location.href="../../index.html";
        }
    </script>

<div class="allineamento">
    <h1>Parametri generali delle e-mail</h1>
    <button class="impostazioni" onclick="returnI()">Indietro</button>
  <button  class="impostazioni" onclick="impostazioni()">Impostazioni</button>
      </div><br>
  <form method="post" action="../../TabellaRiepilogo/riepilogo.php"> 
    

    <table width="960" height="416" border="0" cellpadding="0" cellspacing="0" >
      <tr>
        <td>SMTP:</td>
        <td><textarea id="smtp" name="smtp" rows="1" cols="80" readonly="readonly"></textarea></td>
      </tr>
      <tr>
        <td>Utente:</td>
        <td><textarea id="utente" name="utente" rows="1" cols="80" readonly="readonly"></textarea></td>
      </tr>
     <tr>
          <td>Password:</td>
        <td>
            <p>
              <input type="password" name="password" id="password" style="width: 603px;height: 16px;" readonly="readonly">
              <i class="bi bi-eye-slash" id="togglePassword"></i>
          </p>
        </td>
      </tr>
          <script>
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
      <tr>
        <td>Mittente:</td>
        <td><textarea id="mittente" name="mittente" rows="1" cols="80" readonly="readonly"></textarea></td>
      </tr>
 


 

  <tr>
     <td>Oggetto Email Invito al test:</td>
    <td><textarea id="oggetto" name="oggetto" rows="1" cols="80" readonly="readonly"></textarea></td>
  </tr>
  <tr>
    <td>Corpo Email Invito al test:</td>
    <td><textarea id="corpo" name="corpo" rows="20" cols="80" readonly="readonly"></textarea></td>
  </tr>
  <tr>
    <td>Fascia oraria</td>
    <td><textarea id="fascia" name="fascia" rows="1" cols="80" readonly=readonly></textarea></td>
  </tr>
  </table>
<br>
<br>

  
  <input type="submit" class="buttonsalva"  name="salva" id="salva" value="Salva">     
</form><br>
<button class="buttonesci" onclick=ritornaH() name="Nsalva" id="Nsalva">Esci senza salvare</button>
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6ddde08dbd7c0e26',m:'PoslWiVE8EDY.dEIcc0dqVQy6qsjV9sRSwo3KfiTDvU-1644921198-0-AQVzkXgsspH6o+lEhpDbvW0J84umFHenDjolIedb/9dx6r3RfiKmllhad8F0RMoFIz3jvtE31PKu3I4Z+X9EjaP+cieM0pDDGi8X6n3CyE7zYnz1IEMISShqpJi0jXY/sypSVS49pclU/iwUfy3tqlZR4QWL8JhpgkcRkGmmkvuKtqc+PdFJxUQKXD5Ly4EIco+QxULVgf5v/TWsR0mjnf0=',s:[0x855dd38c62,0x62b4142bb5],}})();</script>

</body>
<script>
  function ritornaH(){
    window.location.href="../../index.html";
  }
</script>

</html>

<?php require('letturaJSON.php'); include('letturaMessaggio.php'); letturaBody();?>