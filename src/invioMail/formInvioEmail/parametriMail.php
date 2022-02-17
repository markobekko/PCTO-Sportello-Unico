<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Iscrizione</title>
    <link rel="stylesheet" href="pcto_label.css">
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
  <button  class="impostazioni" onclick="impostazioni()">Impostazioni</button>
    <button class="impostazioni" onclick="returnI()">Ritorna alla pagina principale</button>
      </div><br>
  <form action="../../index.html">
    

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
              <input type="password" name="password" id="password" size="82" readonly="readonly">
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
    <td>Destinatario CC</td>
    <td>  <select style="width:145px;" id = "emailCC" ></select>
      Inserisci: <input type="text" id = "txtCC" name = "txtCC" size="30px" />
      <input type="button" id = "btnAdd" value = "Add" onclick = "addCC()" />
      <input type="button" id = "btnDelete" value = "Delete All" onclick = "removeAllOptions(emailCC)">
      <input type="button" id = "btnDeleteS" value = "Delete Selected" onclick ="removeOptions(emailCC)">
     </td>
  </tr>
  <tr>
  <tr>  
    <td>Destinatario CCN:</td>
    <td><select style="width:145px;" id = "emailCCN" ></select>
      Inserisci: <input type="text" id = "txtCCN" name = "txtCCN" size="30px"/>
      <input type="button" id = "btnAdd" value = "Add" onclick = "addCCN()" />
      <input type="button" id = "btnDelete" value = "Delete All" onclick = "removeAllOptions(emailCCN)">
      <input type="button" id = "btnDeleteS" value = "Delete Selected" onclick ="removeOptions(emailCCN)">
    </td>
  </tr>
  <tr>
    <td>Oggetto Email Invito al test:</td>
    <td><textarea id="oggetto" name="oggetto" rows="1" cols="80" readonly="readonly"></textarea></td>
  </tr>
  <tr>
    <td>Corpo Email Invito al test:</td>
    <td><textarea id="corpo" name="corpo" rows="20" cols="80" readonly="readonly"></textarea></td>
  </tr>
  </table>
<br>

  

  
  <button class="button button2" formmethod="post">Salva </button>
  <button class="button button3" formaction="../../index.html">Esci senza salvare</button>
</form><br>
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6ddde08dbd7c0e26',m:'PoslWiVE8EDY.dEIcc0dqVQy6qsjV9sRSwo3KfiTDvU-1644921198-0-AQVzkXgsspH6o+lEhpDbvW0J84umFHenDjolIedb/9dx6r3RfiKmllhad8F0RMoFIz3jvtE31PKu3I4Z+X9EjaP+cieM0pDDGi8X6n3CyE7zYnz1IEMISShqpJi0jXY/sypSVS49pclU/iwUfy3tqlZR4QWL8JhpgkcRkGmmkvuKtqc+PdFJxUQKXD5Ly4EIco+QxULVgf5v/TWsR0mjnf0=',s:[0x855dd38c62,0x62b4142bb5],}})();</script>
</body>

</html>

<?php require('letturaJSON.php'); include('letturaMessaggio.php'); letturaBody()?>