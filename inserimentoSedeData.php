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
            <div class="titolo">Inserimento nuova data</div>
            <form action="#">
                <div class="user-details">
                    <div class="input-box">
                        <span class="detail">Sede:</span> <!-- nome davanti alla label -->
                        
                        <select name="sede" id="sede">
                            <option value="Belluno">Belluno</option>
                            <option value="Feltre">Feltre</option>
                        </select>    

                    </div>
                    <div class="input-box">
                        <span class="detail">Data:</span> <!-- nome davanti alla label -->
                            <input type="date" required> 
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Registra nuova data">
                </div>
            </form>
        </div>

        <script type="text/javascript">
            // script per la chiusura della pagina
            window.onbeforeunload = function(){
                    var Ans = confirm();
                    if(Ans==true)return true;
                    else return false;
            };
        </script>
    </body>
</html>