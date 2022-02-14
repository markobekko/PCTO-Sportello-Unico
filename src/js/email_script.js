//funzione per chiamare la funzione dell'invio delle mail
function invioMail(){

    $.ajax({
        type:"POST",
        url: "../invioMail/email/email.php",
        
        success: function(){
            console.log("Inviato");
        },
        unsuccessful: function(){
            console.log("Non inviato");
        }
    });
}