// script per la chiusura della pagina
function controlloSeChiusura(){
    window.onbeforeunload = function() {
        if(confirm())
            return true;
        else
           return false;
   };
}