<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Iscrizione</title>
    <link rel="stylesheet" href="pcto_label.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
  </head>

<body id="project">

  <button onclick="impostazioni()">Impostazioni</button>
  <script type="text/javascript">
    function impostazioni(){
      window.location.href="pcto_impostazioni.php";
      
    }
  </script>
  <form action="../email/email.php" method="POST">
    <h1>Parametri generali delle e-mail</h1>

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
    <td>Destinatario CC:</td>
    <td><textarea id="destinatarioCC" name="destinatarioCC" rows="1" cols="80"></textarea></td>
  </tr>
  <tr>
  <tr>
    <td>Destinatario CCN:</td>
    <td><textarea id="destinatarioCCN" name="destinatarioCCN" rows="1" cols="80"></textarea></td>
  </tr>
  <tr>
  <tr>
    <td>Oggetto Email Invito al test:</td>
    <td><textarea id="oggetto" name="oggetto" rows="20" cols="80"></textarea></td>
  </tr>
  <tr>
    <td>Corpo Email Invito al test:</td>
    <td><textarea id="corpo" name="corpo" rows="1" cols="80"></textarea></td>
  </tr>
  </table>
<br>

  <input type="submit" value="SALVA">

</form>


 <script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d8346ffde865995',m:'E7kE_UAl188Kx3G4I32Rcb4bqpdxkT5cfKzWxRnAzCE-1643971189-0-AXvZgh0XIxEQxcTZ71cpjySncHJ2c4auEjJLoNl/HDdRz/AJgiSoo5WulqkpAE+nTGL6ZwGGc5MPRFzpZ9G5cUyj4sRggUnklML1egXrof9WHrXBEGRke9sQkOppZMZf0rC+5mt8zWV9yDVYdFFUOd2w4vDoiwXlVYzTwdKjCFPTXF8ot0AJsL3pyKcTKemcGKRedLSGgRne4G+tl8W/obo=',s:[0x0d3286417e,0x3f9b445134],}})();</script></body>
</html>

<?php require('letturaJSON.php');?>
