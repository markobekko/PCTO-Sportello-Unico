//funzione per chiamare la funzione dell'invio delle mail
function invioMail(){
    src ="./master_script.js";
    $.ajax({
        type:"POST",
        url: "../invioMail/email/email.php",
        
        success: function(){//email inviate con successo
            console.log("Inviato");
            aggiornaTabella();
        },
        unsuccessful: function(){//email non inviate
            console.log("Non inviato");
            aggiornaTabella();
        },
    });
    
}