 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"

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

//rimuovi tutte le opzioni
function removeAllOptions(selectbox){
    $("#emailCC").empty();
}
//rimuovi opzione selezionata
function removeOptions(selectbox){
    for(var i = 0; i < selectbox.options.length; i++){
        if(selectbox.options[i].selected){
            selectbox.remove(i);
            break;
        }
    }
}