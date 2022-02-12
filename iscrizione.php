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

                <span class="detail">Scelta sede e data:</span> <!-- nome davanti alla label -->

                <div class="ciao">
                    <?php
                        $conn = new mysqli('localhost', 'root', '', 'pcto') 
                        or die('Cannot connect to db');
                        
                        $result = $conn -> query("select ID, data_esame, sede_esame from sessione_esame");
                        echo "<select class='provami' data_esame = 'id'>";
                            while ($row = $result->fetch_assoc()){
                                unset($id, $data_esame, $sede_esame);
                                $id = $row['id'];
                                $data_esame = $row['data_esame']; 
                                $sede_esame = $row['sede_esame'];
                                echo '<option value= "'.$id.'">'.$sede_esame." - ".$data_esame.'</option>';
                            }
                        echo "</select>";
                    ?>
                </div>
                <br>
                <br>
                
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