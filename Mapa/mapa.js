"use strict";
class Mapa {

    constructor(){
        navigator.geolocation.getCurrentPosition(this.getPosicion.bind(this), this.verErrores.bind(this));
    }

    getPosicion(posicion){
        this.latit=posicion.coords.latitude;
        this.longit=posicion.coords.longitude;
    }

    verErrores(error){
        switch(error.code) {
            case error.PERMISSION_DENIED:
                this.mensaje = "El usuario no permite la petición de geolocalización"
                break;
            case error.POSITION_UNAVAILABLE:
                this.mensaje = "Información de geolocalización no disponible"
                break;
            case error.TIMEOUT:
                this.mensaje = "La petición de geolocalización ha caducado"
                break;
            case error.UNKNOWN_ERROR:
                this.mensaje = "Se ha producido un error desconocido"
                break;
        }
    }

    mostrar(){
        var situar=document.getElementById('situar');
        var ciudad=document.getElementById('ciudad');
        var tiempo=document.getElementById('tiempo');

        //Leaflet API
        var mymap = L.map('mapid').setView([41.6551800, -4.7237200], 5)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        }).addTo(mymap);
        
        L.marker([this.latit, this.longit]).addTo(mymap);
        L.marker([40.4340401, -3.7037899]).addTo(mymap);

        var latlngs = [
            [this.latit, this.longit],
            [40.4340401, -3.7037899]
        ];



        //OpenWeatherMap API
        var apikey = "7ebd05f34706216cd71b3c640553d05f";

        var unidades = "&units=metric";
        var idioma = "&lang=es";
        var url = "https://api.openweathermap.org/data/2.5/weather?lat=" + this.latit + "&lon=" + this.longit + unidades + idioma + "&APPID=" + apikey;
        var correcto = "Todo correcto";
        
        $.ajax({
                    dataType: "json",
                    url: url,
                    method: 'GET',
                    success: function(datos){
                            $("pre").text(JSON.stringify(datos, null, 2));
                            
                            var ciudadDatos = "<h2>" +datos.name + ", " + datos.sys.country +"</h2>";
                        
                            var stringDatos = "<ul><li>Hora de la medida: " + new Date(datos.dt *1000).toLocaleTimeString() + "</li>";
                                stringDatos += "<li>Temperatura: " + datos.main.temp + " ºC</li>";
                                stringDatos += "<li>Descripción: " + datos.weather[0].description + "</li>";
                                stringDatos += "<li>Nubosidad: " + datos.clouds.all + " %</li>";
                                stringDatos += "<li>Tiempo de luz: " + new Date(datos.sys.sunrise *1000).toLocaleTimeString()+" - " + new Date(datos.sys.sunset *1000).toLocaleTimeString() + "</li></ul>";
                            
                            ciudad.innerHTML=ciudadDatos;
                            tiempo.innerHTML=stringDatos;
                            situar.innerHTML='';
                        },
                    error:function(){
                        $("h3").html("¡Tenemos problemas! No puedo obtener JSON"); 
                        $("h4").remove();
                        $("p").remove();
                        }
                });
    }

}

var miMapa = new Mapa();

