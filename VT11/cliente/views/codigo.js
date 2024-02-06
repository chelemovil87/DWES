function pintaTabla(recibido){
	salida = "<table>";
	for (var i = 0; i < recibido.length; i++) {
		salida += "<tr>\n";
		salida += "<td>" + recibido[i]["id"] + "</td>\n";
		salida += "<td>" + recibido[i]["nombre"] + "</td>\n";
		salida += "<td>" + recibido[i]["numero"] + "</td>\n";
		salida += "<td>" + recibido[i]["tipo"] + "</td>\n";
		salida += "</tr>\n";
	}
	salida += "</table>";
	tablaConTodos.innerHTML = salida;
}



function obtieneTodos() {

	let xhr = new XMLHttpRequest();
	let recibido = "";

	xhr.open("GET", "http://localhost/DWES/VT11/APIREST/webService/controller/pokemon.php?op=GetAll", true); // Hacemos la petición por POST
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.onreadystatechange = function() {	
		if (this.readyState == 4 && this.status == 200) {
			recibido = JSON.parse(xhr.responseText);
			pintaTabla(recibido);
		} else {
			console.log("Cargando obtieneTodos");
		}
	}
	xhr.send();
}


function pintaPokemon(donde){
	
	let xhr = new XMLHttpRequest();
	let recibido = "";

	xhr.open("GET", "http://localhost/DWES/VT11/APIREST/webService/controller/pokemon.php?op=GetAll", true); // Hacemos la petición por POST
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.onreadystatechange = function() {	
		if (this.readyState == 4 && this.status == 200) {
			recibido = JSON.parse(xhr.responseText);
			salida = "<option value='" + recibido[0]["id"] + "' selected>" + recibido[0]["nombre"] + "</option>";
			for (var i = 1; i < recibido.length; i++) {
				salida += "<option value='" + recibido[i]["id"] + "'>" + recibido[i]["nombre"] + "</option>";
			}
			donde.innerHTML = salida;
		} else {
			console.log("Cargando pintaProductos");
		}
	}

	xhr.send();
}



function pintaListaUno(recibido){
	salida = "<ul>";
	for (var i = 0; i < recibido.length; i++) {
		salida += "<li>" + recibido[i]["id"] + "</li>\n";
		salida += "<li>" + recibido[i]["nombre"] + "</li>\n";
		salida += "<li>" + recibido[i]["numero"] + "</li>\n";
		salida += "<li>" + recibido[i]["tipo"] + "</li>\n";
	}
	salida += "</ul>";
	listaConUno.innerHTML = salida;
}


function obtieneUno(identificador) {

	let xhr = new XMLHttpRequest();
	let recibido = "";

	xhr.open("POST", "http://localhost/DWES/VT11/APIREST/webService/controller/pokemon.php?op=GetID", true); // Hacemos la petición por POST
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.onreadystatechange = function() {	
		if (this.readyState == 4 && this.status == 200) {
			recibido = JSON.parse(xhr.responseText);
			pintaListaUno(recibido);
		} else {
			console.log("Cargando Uno");
		}
	}
	xhr.send('{"id" : ' + identificador + '}');
}


function enviaInfo(valor1, valor2, valor3){
	let xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost/DWES/VT11/APIREST/webService/controller/pokemon.php?op=Insert", true); // Hacemos la petición por POST
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.onreadystatechange = function() {	
		if (this.readyState == 4 && this.status == 200) {
			alert("Insertado");
		} else {
			console.log("Cargando EnviaUno");
		}
	}
	xhr.send('{"nombre" : "' + valor1 + '", "numero" : ' + valor2 + ', "tipo" : "' + valor3 + '"}');
}


function borraUno(identificador) {

	let xhr = new XMLHttpRequest();

	xhr.open("POST", "http://localhost/DWES/VT11/APIREST/webService/controller/pokemon.php?op=Delete", true); // Hacemos la petición por POST
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	xhr.onreadystatechange = function() {	
		if (this.readyState == 4 && this.status == 200) {
			alert("Borrado");
		} else {
			console.log("Cargando borraUno");
		}
	}
	xhr.send('{"id" : ' + identificador + '}');
}


dameTodos.addEventListener("click", function(){
										obtieneTodos();
									}, true);

window.addEventListener("load", function(){
									pintaPokemon(listaPokemon);
									pintaPokemon(listaPokemonABorrar);
								}, true);

dameUno.addEventListener("click", function(){
									obtieneUno(listaPokemon.value);
								}, true);

formulario.addEventListener("submit", function(){
										enviaInfo(nombre.value, numero.value, tipo.value);
									}, true);

borrar.addEventListener("click", function(){
									borraUno(listaPokemonABorrar.value);
								}, true);