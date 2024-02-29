var datos = [];
var numDatos = 0;
var operador = null;
var resultado = 0;
var numeros = "0123456789";
var pantalla = document.getElementById('pantalla');
// var teclaAlmazenada;
async function pulsar(tecla) {
    // teclaAlmazenada = tecla;
    // var elementoTecla = document.getElementById(String(tecla));
    // elementoTecla.style.background = "#0101ff";
    if (isNaN(tecla)) {
        accionCaracter(tecla);
    } else {
        accionNumero(tecla);
    }
}

function accionNumero(tecla) {
    if (datos.length == 0 || (datos.length != 0 && operador != null)) {
        datos.push(String(tecla));
        pantalla.innerHTML = datos[datos.length - 1];
    } else {
        contenido = datos[datos.length - 1];
        datos[datos.length - 1] = contenido + String(tecla);
        pantalla.innerHTML = datos[datos.length - 1];
    }
}

function accionCaracter(tecla) {
    switch (tecla) {
        case '/':
            operador = "/";
            numDatos++;
            pantalla.innerHTML = 0;
            break;
        case 'X':
            operador = "X";
            numDatos++;
            pantalla.innerHTML = 0;
            break;
        case 'C':
            datos = [];
            numDatos = 0;
            operador = "";
            pantalla.innerHTML = 0;
            break;
        case '-':
            operador = "-";
            numDatos++;
            pantalla.innerHTML = 0;
            break;
        case '+':
            operador = "+";
            numDatos++;
            pantalla.innerHTML = 0;
            break;
        case '=':
            calculo();
            datos = [];
            break;
    }
}

function calculo() {
    if (datos.length >= 2 && operador != null) {
        switch (operador) {
            case '/':
                resultado = parseInt(datos[0]) / parseInt(datos[1]);
                break;
            case 'X':
                resultado = parseInt(datos[0]) * parseInt(datos[1]);
                break;
            case '-':
                resultado = parseInt(datos[0]) - parseInt(datos[1]);
                break;
            case '+':
                resultado = parseInt(datos[0]) + parseInt(datos[1]);
                break;
        }
        pantalla.innerHTML = resultado;
    }
}

function sleep(ms) {
	return new Promise(resolve => setTimeout(resolve, ms));
}
// document.addEventListener(onmouseout, function(){

// });