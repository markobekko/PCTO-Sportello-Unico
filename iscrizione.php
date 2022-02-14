<!-- @author Thaise Ramos -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Iscrizione</title>
        <link rel="stylesheet" href="iscrizione.css">  
    </head>
    <body>      
        <!-- Form: -->
        <div class="container">
            <div class="titolo">Registrazione</div>
            <form action="#">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail">Cognome:</span> <!-- nome davanti alla label -->
                            <input type="text" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Nome:</span> <!-- nome davanti alla label -->
                            <input type="text" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Indirizzo email:</span> <!-- nome davanti alla label -->
                            <input type="email" required> 
                    </div>
                    <div class="input-box">
                        <span class="detail">Codice Fiscale:</span> <!-- nome davanti alla label -->
                            <input type="text" required> 
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Registra nominativo">
                </div>
            </form>
        </div>

        <script type="text/javascript">
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