'use strict'

// Variables
let fechas = document.querySelectorAll('.fecha_vencimiento');
let array_fechas = [];



for( let i = 0; i < fechas.length; i++) {
    array_fechas.push(fechas[i].textContent);
}

//console.log(array_fechas[1]);

for( let i = 0; i < array_fechas.length; i++) {

    let new_fecha = moment(array_fechas[i], 'YYYY-DD-MM').subtract(45, 'days');



    //console.log(new_fecha);
}

 let hoy = moment().subtract(7, 'days')._d;

console.log(hoy);



















