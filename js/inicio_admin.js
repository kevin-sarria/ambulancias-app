'use strict'
let fechas = document.querySelectorAll('.fecha_vencimiento');
let fechas_lotes = document.querySelectorAll('.fecha_lote');
let array_fechas = [];
let array_fechas_lotes = [];
for( let i = 0; i < fechas.length; i++) {
    array_fechas.push(fechas[i]);
    array_fechas_lotes.push(fechas_lotes[i]);
}
for( let i = 0; i < array_fechas.length; i++) {
    let nuevo_lote = array_fechas_lotes[i].innerHTML.split('/', 3);
    let nueva_fecha_v = array_fechas[i].innerHTML.split('/', 3);
    // if() {
    //     array_fechas.forEach(fecha => {
    //         fecha.style.color = "red";
    //     });
    // }
    
     
}
























