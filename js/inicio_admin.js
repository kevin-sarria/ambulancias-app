'use strict'

let fechas = document.querySelectorAll('.fecha_vencimiento');
let array_fechas = [];

for( let i = 0; i < fechas.length; i++) {
    array_fechas.push(fechas[i]);
}


console.log(array_fechas);

array_fechas.forEach(fecha => {

    

    if(fecha.innerHTML == '08/10/2022') {
        fecha.style.color = "red";
        console.log(fecha);
    }else {
        console.log('Noooooo');
    }
    
});




















