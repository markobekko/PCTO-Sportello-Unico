<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
        <title>Iscrizione</title>
        <link rel="stylesheet" href="parametriMail.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   
<body>
<h1>Parametri generali delle e-mail</h1>

<form action="pcto_impostazioni.php" method="POST"></form>
<element class=Impostazioni> 
  <script>
    function myFunction() {
      window.location.href="pcto_impostazioni.php";
    }
  </script>
  <button class="impostazioni" onClick="myFunction()">Impostazioni</button>
</element> 
</form>

<form method="POST">
<table>
  <tr>
    <td>SMTP:</td>
    <td><textarea id="smtp" name="smtp" rows="1" cols="80"></textarea></td>
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
    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
    });
</script> 
  <tr>
    <td>Mittente:</td>
    <td><textarea id="mittente" name="mittente" rows="1" cols="80"></textarea></td>
  </tr>
  <tr>
    <td>Oggetto Email Esito al test:</td>
    <td><textarea id="oggetto" name="oggetto" rows="1" cols="80"></textarea></td>
  </tr>
  <tr>
    <td>Corpo Email Esito al test:</td>
    <td><textarea id="corpo" name="corpo" rows="20" cols="80"></textarea></td>
  </tr>
</table>
</form> <br>
  <element class=bottoni> 
    <button class="buttonsalva">Salva </button>
    <button class="buttonesci">Salva senza inviare</button>
  </element> 
</body>
</html>

<script type="text/javascript" >
  //rimuovi  tuttte le opzioni
 function removeAllOptions(selectbox)
 {
   var i;
   for(i=selectbox.options.length-1;i>=0;i--)
   {
     //selectbox.options.remove(i);
     selectbox.remove(i);
   }
 }
 //rimuovi  opzione selezionata
 function removeOptions(selectbox)
 {
 
     for(var i = 0; i < selectbox.options.length; i++){
         if(selectbox.options[i].selected){
             selectbox.remove(i);
             console.log(i);
             break;
         }
     }
 }
 
         </script>
         
<script type="text/javascript">
  function addCC() {//nome funzione
      var ddl = document.getElementById("emailCC");//salva su una variabile l'elemento del dpl
      var option = document.createElement("OPTION");//crea l'elemento option per il dpl
      option.innerHTML = document.getElementById("txtCC").value;//imposto il testo dell'option per il dpl
      option.value = document.getElementById("txtCC").value;//imposto il value dell'option per il dpl
      ddl.options.add(option);//aggiungo l'option al dpl
      document.getElementById("txtCC").value = "";
  };
  function addCCN() {//nome funzione
      var ddl = document.getElementById("emailCCN");//salva su una variabile l'elemento del dpl
      var option = document.createElement("OPTION");//crea l'elemento option per il dpl
      option.innerHTML = document.getElementById("txtCCN").value;//imposto il testo dell'option per il dpl
      option.value = document.getElementById("txtCCN").value;//imposto il value dell'option per il dpl
      ddl.options.add(option);//aggiungo l'option al dpl
      document.getElementById("txtCCN").value = "";
  };
</script>


<script type="text/javascript" >
  //rimuovi  tuttte le opzioni
 function removeAllOptions(selectbox)
 {
  for(var i = 0; i < selectbox.options.length; i++){
         if(selectbox.options[i].selected){
             selectbox.remove(i);
             console.log(i);
             break;
         }
     }
 }
 //rimuovi  opzione selezionata
 function removeOptions(selectbox)
 {
 
     for(var i = 0; i < selectbox.options.length; i++){
         if(selectbox.options[i].selected){
             selectbox.remove(i);
             console.log(i);
             break;
         }
     }
 }
 
         </script>
         
<script type="text/javascript">
  
  //tasti per la pulizia del textarea
  var input1= document.querySelector('#btnAdd');
  var textarea = document.querySelector('#txtText');

input.addEventListener('click', function () {
textarea.value = '';
}, false);
input1.addEventListener('click', function () {
textarea.value = '';
}, false);

</script>