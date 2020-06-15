$(document).ready(function(){
	var canvas = $("canvas")[0];
	var ctx = canvas.getContext("2d");
	var w = 350;
	var h = 350;
	
	var cw = 10;
	var d;
	var punto;
	
	var serpiente; 
	
	function iniciar()
	{
		d = "der";
		crear_serpiente();
		crear_punto(); 
        
        var loop = setInterval(pintar, 55);
	}
	iniciar();
	
	function crear_serpiente()
	{
		var length = 6; 
		serpiente = [];
		for(var i = length-1; i>=0; i--)
		{
			serpiente.push({x: i, y:0});
		}
	}
	
	function crear_punto()
	{
		punto = {
			x: Math.round(Math.random()*(w-cw)/cw), 
			y: Math.round(Math.random()*(h-cw)/cw), 
		};
	}

	function pintar()
	{
		ctx.fillStyle = "white";
		ctx.fillRect(0, 0, w, h);
		

		var nx = serpiente[0].x;
		var ny = serpiente[0].y;

		if(d == "der") nx++;
		else if(d == "izq") nx--;
		else if(d == "ar") ny--;
		else if(d == "ab") ny++;

		if(nx == punto.x && ny == punto.y)
		{
			var cola = {x: nx, y: ny};
			crear_punto();
		}
		else
		{
			var cola = serpiente.pop();
			cola.x = nx; cola.y = ny;
		}

		
		serpiente.unshift(cola); 
		
		for(var i = 0; i < serpiente.length; i++)
		{
			var c = serpiente[i];
			pintarSerpiente(c.x, c.y);
		}
		

		pintarComida(punto.x, punto.y);
	}
	
	function pintarSerpiente(x, y)
	{
		ctx.fillStyle = "black";
		ctx.fillRect(x*cw, y*cw, cw, cw);
		ctx.strokeStyle = "white";
		ctx.strokeRect(x*cw, y*cw, cw, cw);
	}
	
    function pintarComida(x, y)
	{
		ctx.fillStyle = "#ab2a3e";
		ctx.fillRect(x*cw, y*cw, cw, cw);
		ctx.strokeStyle = "black";
		ctx.strokeRect(x*cw, y*cw, cw, cw);
	}
    
	$(document).keydown(function(e){
		var key = e.which;
		if(key == "65" && d != "der") d = "izq";
		else if(key == "87" && d != "ab") d = "ar";
		else if(key == "68" && d != "izq") d = "der";
		else if(key == "83" && d != "ar") d = "ab";
	})
})