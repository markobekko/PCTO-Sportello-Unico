<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    
        <title>Impostazioni</title>
        <link rel="stylesheet" href="./pcto_impostazioni.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        

    <head>
        <title>Impostazioni</title>
    </head>
<body>
  <!-- reindirizzo al salvataggio dei parametri-->
  <form action="./salvaJSON.php" method="post" >
    <table>
        <tr>
          <td>SMTP:</td>
          <td><textarea id="smtp" name="smtp" rows="1" cols="80"></textarea></td>
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
              <input type="password" name="password" id="password" size="93">
              <i class="bi bi-eye-slash" id="togglePassword"></i>
          </p>
          </td>
        </tr>

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
      </table>
      <button class="ritorna button4" name="salva" id="salva">Salva</button>
</form>

<!-- bottone con script per il ritorno alla pagina principale-->
  <button class="ritorna button4" name="ritorna"  onClick="returnP()" >Ritorna alla pagina iniziale</button>
  <script>
    function returnP() {
      window.location.href="index.php"; 
    }
  </script>
  <script>
    // script per la chiusura della pagina

    
    window.onbeforeunload = function() {
                    var Ans = confirm();
                    if(Ans==true)return true;
                    else
                       return false;
               };
  </script>
 

</body>
</html>  

<?php require('./letturaJSON.php');?>