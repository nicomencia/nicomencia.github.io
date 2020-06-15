"use strict";
class Fotos {
    constructor(){
        this.correcto = "Todo correcto"
    }
    cargarDatos(value){

        $("#outputDiv").empty();
        
        var API_KEY = '17046202-5f69fdecfa3e0eb0518d11817';
        var URL = "https://pixabay.com/api/?key="+API_KEY+"&q="+encodeURIComponent(value);
        $.getJSON(URL, function(data){
            if (parseInt(data.totalHits) > 0)
                $.each(data.hits, function(i, hit){ 
                    $("<img height=400px width=600px>").attr("src", hit.largeImageURL).appendTo("#outputDiv");
                });
            else
            $("#outputDiv").html("Resultado: error");
        });
    }
}
var fotos = new Fotos();