//funzione per chiamare la funzione dell'invio delle mail
function invioMail(){
    src ="./master_script.js";
    $.ajax({
        type:"POST",
        url: "../invioMail/email/email.php",
        success: function(temp){//email inviate con successo
            if(temp.includes("NotSent")){
                alert("Non Inviato\nPossibile errore nel server,nella mail o la password del proprio account");
            }else{
            console.log("Inviato");
            alert("Inviato");
            aggiornaTabella();
            }
        },
        unsuccessful: function(){//email non inviate
            console.log("Non inviato");
            alert("Non inviato");
            aggiornaTabella();
        },
    });
    
}