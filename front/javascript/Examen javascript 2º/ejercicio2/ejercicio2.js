var numcuenta = document.getElementById("numCuenta");
var numcuentaB = false;
var seisCaracteres = document.getElementById("seisCaracteres");
var seisCaracteresB = false;
var relleno = document.getElementById("relleno");
var rellenoB = false;

// function validar(tipo, element, elEvento) {

//     var inputElement = document.getElementById(tipo).value.length;
//     var evento = elEvento || window.event;
//     var codigoCaracter = evento.charCode || evento.keyCode;
//     var permitidos;
//     var comprobante;
//     switch (tipo) {
//         case 'relleno':
//             permitidos = numeros;
//             if (inputElement == 20) {
//                 comprobante = true;
//             }
//             break;
//         case 'numCuenta':
//             permitidos = caracteres;
//             if (inputElement == 6) {
//                 comprobante = true;
//             }
//             break;
//         case 'seisCaracteres':
//             break;
//     }
//     activarRelleno();
//     // return ((permitidos.indexOf(caracter) != -1) && comprobante) ||;
// }

function permite(elEvento, permitidos) {
    // Variables que definen los caracteres permitidos.
    var numeros = "0123456789";
    var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";

    // Seleccionar los caracteres a partir del parámetro de la función.
    var inputElement = document.getElementById(permitidos).value.length;
    var comprobante = false;


    switch (permitidos) {
        case 'numCuenta':
            permitidos = numeros;
            if (inputElement <= 20) {
                comprobante = true;
            }
            if (inputElement + 1 != 20) {
                alert('no se ha rellenado de la manera correcta');
            }else{
                numcuentaB=true;
            }
            break;
        case 'seisCaracteres':
            permitidos = caracteres;
            if (inputElement <= 6) {
            }
            if (inputElement + 1 != 6) {
                alert('no se ha rellenado de la manera correcta');
            }else{
                seisCaracteresB=true;
            }
            comprobante = true;
            break;
    }


    // Obtener la tecla pulsada.
    var evento = elEvento || window.event;
    var codigoCaracter = evento.charCode || evento.keyCode;
    var caracter = String.fromCharCode(codigoCaracter);

    // Comprobar si la tecla pulsada es alguna de las teclas especiales.

    // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
    // o si es una tecla especial.
    activarRelleno();
    return (permitidos.indexOf(caracter) != -1) && comprobante;

}
function activarRelleno() {
    if (numcuentaB && seisCaracteresB) {
        relleno.removeAttribute('disabled');
    } else {
        relleno.setAttribute('disabled', 'true');
    }
}
function enviar() {
    return numcuentaB && seisCaracteresB;
}